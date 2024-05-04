<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::with(['discipline', 'teacher'])->get();
        return response()->json($course, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $course = Course::create($request->all());

            DB::commit();
            return response()->json($course, 201);
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
            $course = Course::find($id);
            if (empty($course)) {
                throw new \Exception('Course not found', 404);
            }

            return response()->json($course, 200);
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
            $course = Course::find($id);
            if (empty($course)) throw new \Exception('Course not found', 404);

            $course->update($request->all());

            DB::commit();
            return response()->json($course, 200);
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
            $course = Course::find($id);
            if (empty($course)) {
                return response()->json(['message' => 'Course not found'], 404);
            }

            $course->delete();

            DB::commit();
            return response()->json($course, 200);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
