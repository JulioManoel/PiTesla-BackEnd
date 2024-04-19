<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Test::with(['Test'])->get();
        return response()->json($test, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestRequest $request)
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
    public function show(string $id)
    {
        $newDepartamento = Test::with(['Test'])->find($id);
        return response()->json($newDepartamento, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $Test = Test::find($id);
            if (empty($departament)) throw new \Exception('Test not found', 404);

            $Test->update($request->all());

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
        $Test = Test::find($id);
        if (empty($Test)) {
            return response()->json(['message' => 'Test não encontrado'], 404);
        }

        $Test->delete();
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }
}