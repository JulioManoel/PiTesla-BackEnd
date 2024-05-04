<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activitie = Activitie::with(['course'])->get();
        return response()->json($activitie, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $activitie = Activitie::create($request->all());

            DB::commit();
            return response()->json($activitie, 201);
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
            $activitie = Activitie::with(['course'])->find($id);
            if (empty($activitie)) {
                throw new \Exception('Activitie not found', 404);
            }

            return response()->json($activitie, 200);
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
            $activitie = Activitie::find($id);
            if (empty($activitie)) throw new \Exception('Activitie not found', 404);

            $activitie->update($request->all());

            DB::commit();
            return response()->json($activitie, 200);
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
            $activitie = Activitie::find($id);
            if (empty($activitie)) {
                return response()->json(['message' => 'Activitie não encontrado'], 404);
            }

            $activitie->delete();

            DB::commit();
            return response()->json($activitie, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
