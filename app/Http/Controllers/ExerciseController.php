<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercise = Exercise::with(['test', 'answersOptions'])->get();
        return response()->json($exercise, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $exercise = Exercise::create($request->all());

            DB::commit();
            return response()->json($exercise, 201);
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
            $exercise = Exercise::with(['test', 'answersOptions'])->find($id);
            if (empty($exercise)) {
                throw new \Exception('Exercise not found', 404);
            }

            return response()->json($exercise, 200);
        } catch (\Throwable $error) {
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $exercise = Exercise::find($id);
            if (empty($exercise)) throw new \Exception('Exercise not found', 404);

            $exercise->update($request->all());

            DB::commit();
            return response()->json($exercise, 200);
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
            $exercise = Exercise::find($id);
            if (empty($exercise)) {
                return response()->json(['message' => 'Exercise não encontrado'], 404);
            }

            $exercise->delete();

            DB::commit();
            return response()->json($exercise, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
