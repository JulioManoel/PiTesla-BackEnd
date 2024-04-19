<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ActivitieRequest;

class ActivitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activitie = Activitie::with(['Activitie'])->get();
        return response()->json($activitie, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActivitieRequest $request)
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
        $newDepartamento = Activitie::with(['Activitie'])->find($id);
        return response()->json($newDepartamento, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActivitieRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $Activitie = Activitie::find($id);
            if (empty($departament)) throw new \Exception('Activitie not found', 404);

            $Activitie->update($request->all());

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
        $Activitie = Activitie::find($id);
        if (empty($Activitie)) {
            return response()->json(['message' => 'Activitie não encontrado'], 404);
        }

        $Activitie->delete();
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }
}