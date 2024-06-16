<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Contracts\IRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::with(['students', 'teachers', 'disciplines'])->get();
        return response()->json($schools, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IRequest $request)
    {
        DB::beginTransaction();

        try {
            $school = School::create($request->all());

            DB::commit();
            return response()->json($school, 201);
        } catch (\Throwable $error) {
            DB::rollBack();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        $school->load(['students', 'teachers', 'disciplines']);
        return response()->json($school, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IRequest $request, School $school)
    {
        DB::beginTransaction();

        try {
            $school->update($request->all());

            DB::commit();
            return response()->json($school, 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        DB::beginTransaction();

        try {
            $school->delete();

            DB::commit();
            return response()->json($school, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
