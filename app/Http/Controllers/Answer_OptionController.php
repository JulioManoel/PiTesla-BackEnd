<?php

namespace App\Http\Controllers;

use App\Models\Answer_Option;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Answer_OptionRequest;

class Answer_OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answer_option = Answer_Option::with(['Answer_Option'])->get();
        return response()->json($answer_option, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Answer_OptionRequest $request)
    {
        DB::beginTransaction();

        try {
            $answer_option = Answer_Option::create($request->all());

            DB::commit();
            return response()->json($answer_option, 201);
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
        $newDepartamento = Answer_Option::with(['Answer_Option'])->find($id);
        return response()->json($newDepartamento, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Answer_OptionRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $Answer_Option = Answer_Option::find($id);
            if (empty($departament)) throw new \Exception('Answer_Option not found', 404);

            $Answer_Option->update($request->all());

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
        $Answer_Option = Answer_Option::find($id);
        if (empty($Answer_Option)) {
            return response()->json(['message' => 'Answer_Option não encontrado'], 404);
        }

        $Answer_Option->delete();
        return response()->json(['message' => 'Deletado com sucesso'], 200);
    }
}