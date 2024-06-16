<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Contracts\IRequest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Test::with(['activitie', 'exercises'])->get();
        return response()->json($test, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IRequest $request)
    {
        DB::beginTransaction();

        try {
            $test = Test::create($request->all());

            DB::commit();
            return response()->json($test, 201);
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        $test->load(['activitie', 'exercises']);
        return response()->json($test, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IRequest $request, Test $test)
    {
        DB::beginTransaction();

        try {
            $test->update($request->all());

            DB::commit();
            return response()->json($test, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        DB::beginTransaction();

        try {
            $test->delete();

            DB::commit();
            return response()->json($test, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
