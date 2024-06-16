<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Contracts\IRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studant = Student::with(['school'])->get();
        return response()->json($studant, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IRequest $request)
    {
        DB::beginTransaction();

        try {
            $request['password'] = Hash::make($request->password);
            $studant = Student::create($request->all());

            DB::commit();
            return response()->json($studant, 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $studant)
    {
        $studant->load(['school']);
        return response()->json($studant, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IRequest $request, Student $student)
    {
        DB::beginTransaction();

        try {
            $student->update($request->all());

            DB::commit();
            return response()->json($student, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        DB::beginTransaction();

        try {
            $student->delete();

            DB::commit();
            return response()->json($student, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
