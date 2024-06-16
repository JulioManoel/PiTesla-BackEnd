<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IRequest;

class ActivitieController extends Controller
{
    public function index()
    {
        $activitie = Activitie::with(['course'])->get();
        return response()->json($activitie, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IRequest $request)
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
    public function show(Activitie $activitie)
    {
        $activitie->load(['course']);
        return response()->json($activitie, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IRequest $request, Activitie $activitie)
    {
        DB::beginTransaction();

        try {
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
    public function destroy(Activitie $activitie)
    {
        DB::beginTransaction();

        try {
            $activitie->delete();

            DB::commit();
            return response()->json($activitie, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
