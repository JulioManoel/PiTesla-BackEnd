<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SchoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return response()->json($schools, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
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
    public function show(string $id)
    {
        try {
            $school = School::find($id);
            if (empty($school)) {
                throw new \Exception('School not found', 404);
            }

            return response()->json($school, 200);
        } catch (\Throwable $error) {
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $school = School::find($id);
            if (empty($school)) throw new \Exception('School not found', 404);

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
    public function destroy(string $id)
    {
        try {
            $school = School::find($id);
            if (empty($school)) {
                throw new \Exception('School not found', 404);
            }

            $school->delete();
            return response()->json(['message' => 'School deleted'], 200);
        } catch (\Throwable $error) {
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}