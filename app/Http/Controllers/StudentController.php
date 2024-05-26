<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Hash;

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
    public function store(StudentRequest $request)
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
    public function show(string $id)
    {
        try {
            $studant = Student::with(['school'])->find($id);
            if (empty($studant)) {
                throw new \Exception('Studant not found', 404);
            }

            return response()->json($studant, 200);
        } catch (\Throwable $error) {
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $student = Student::find($id);
            if (empty($student)) throw new \Exception('Student not found', 404);

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
    public function destroy(string $id)
    {
        DB::beginTransaction();

        try {
            $student = Student::find($id);
            if (empty($student)) {
                return response()->json(['message' => 'Student não encontrado'], 404);
            }

            $student->delete();

            DB::commit();
            return response()->json($student, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
