<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::with(['school'])->get();
        return response()->json($teacher, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $request['password'] = Hash::make($request->password);
            $teacher = Teacher::create($request->all());

            DB::commit();
            return response()->json($teacher, 201);
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
        $teacher = Teacher::with(['school'])->find($id);
        return response()->json($teacher, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction();

        try {
            $teacher = Teacher::find($id);
            if (empty($teacher)) throw new \Exception('Teacher not found', 404);

            $teacher->update($request->all());

            DB::commit();
            return response()->json($teacher, 200);
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
            $teacher = Teacher::find($id);
            if (empty($teacher)) {
                return response()->json(['message' => 'Teacher não encontrado'], 404);
            }

            $teacher->delete();

            DB::commit();
            return response()->json($teacher, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
