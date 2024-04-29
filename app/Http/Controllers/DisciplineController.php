<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
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
    public function show(string $id)
    {
        $disciplines = Discipline::with(['school'])->find($id);
        return response()->json($disciplines, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $disciplines = Discipline::find($id);
            if (empty($disciplines)) throw new \Exception('Discipline not found', 404);

            $disciplines->update($request->all());

            DB::commit();
            return response()->json($disciplines, 200);
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
            $disciplines = Discipline::find($id);
            if (empty($disciplines)) {
                return response()->json(['message' => 'Discipline não encontrado'], 404);
            }

            $disciplines->delete();

            DB::commit();
            return response()->json($disciplines, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
