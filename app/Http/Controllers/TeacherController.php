<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Contracts\IRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::with(['school'])->get();
        return response()->json($teacher, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IRequest $request)
    {
        DB::beginTransaction();

        try {
            $request['password'] = Hash::make($request->password);
            $teacher = Teacher::create($request->all());

            DB::commit();
            return response()->json($teacher, 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teacher->load(['school']);
        return response()->json($teacher, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IRequest $request, Teacher $teacher)
    {
        DB::beginTransaction();

        try {
            $teacher->update($request->all());

            DB::commit();
            return response()->json($teacher, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        DB::beginTransaction();

        try {
            $teacher->delete();

            DB::commit();
            return response()->json($teacher, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
