<?php

namespace App\Http\Controllers;

use App\Models\Answer_Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answer_option = Answer_Option::with(['exercise'])->get();
        return response()->json($answer_option, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        $answer_option = Answer_Option::with(['exercise'])->find($id);
        return response()->json($answer_option, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $answer_option = Answer_Option::find($id);
            if (empty($answer_option)) throw new \Exception('Answer_Option not found', 404);

            $answer_option->update($request->all());

            DB::commit();
            return response()->json($answer_option, 200);
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
            $answer_option = Answer_Option::find($id);
            if (empty($answer_option)) {
                return response()->json(['message' => 'Answer_Option não encontrado'], 404);
            }

            $answer_option->delete();

            DB::commit();
            return response()->json($answer_option, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
