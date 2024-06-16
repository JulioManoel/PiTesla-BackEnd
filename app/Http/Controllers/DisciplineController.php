<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IRequest;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disciplines = Discipline::with(['school'])->get();
        return response()->json($disciplines, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IRequest $request)
    {
        DB::beginTransaction();

        try {
            $disciplines = Discipline::create($request->all());

            DB::commit();
            return response()->json($disciplines, 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Discipline $discipline)
    {
        $discipline->load(['school']);
        return response()->json($discipline, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IRequest $request, Discipline $discipline)
    {
        DB::beginTransaction();

        try {
            $discipline->update($request->all());

            DB::commit();
            return response()->json($discipline, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discipline $discipline)
    {
        DB::beginTransaction();

        try {
            $discipline->delete();

            DB::commit();
            return response()->json($discipline, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
