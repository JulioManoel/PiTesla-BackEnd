<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ExerciseRequest;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Exercise = Exercise::with(['Exercise'])->get();
        return response()->json($Exercise, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExerciseRequest $request)
    {
        DB::beginTransaction();

        try {
            $Exercise = Exercise::create($request->all());

            DB::commit();
            return response()->json($Exercise, 201);
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
        $newDepartamento = Exercise::with(['Exercise'])->find($id);
        return response()->json($newDepartamento, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExerciseRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $Exercise = Exercise::find($id);
            if (empty($departament)) throw new \Exception('Exercise not found', 404);

            $Exercise->update($request->all());

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
        $Exercise = Exercise::find($id);
        if (empty($Exercise)) {
            return response()->json(['message' => 'Exercise não encontrado'], 404);
        }

        $Exercise->delete();
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }
}