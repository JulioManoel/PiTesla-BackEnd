<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IRequest;

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
    public function store(IRequest $request)
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
    public function show(Exercise $exercise)
    {
        $exercise->load(['test', 'answersOptions']);
        return response()->json($exercise, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IRequest $request, Exercise $exercise)
    {
        DB::beginTransaction();

        try {
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
    public function destroy(Exercise $exercise)
    {
        DB::beginTransaction();

        try {
            $exercise->delete();

            DB::commit();
            return response()->json($exercise, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
