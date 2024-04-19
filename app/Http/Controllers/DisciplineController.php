<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discipline = Discipline::with(['Discipline'])->get();
        return response()->json($discipline, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        DB::beginTransaction();

        try {
            $discipline = Discipline::create($request->all());

            DB::commit();
            return response()->json($discipline, 201);
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
        $newDepartamento = Discipline::with(['Discipline'])->find($id);
        return response()->json($newDepartamento, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $student = Discipline::find($id);
            if (empty($departament)) throw new \Exception('Discipline not found', 404);

            $student->update($request->all());

            DB::commit();
            return response()->json(['messege' => 'Successfully updated'], 200);
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
        $student = Discipline::find($id);
        if (empty($student)) {
            return response()->json(['message' => 'Discipline não encontrado'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }
}