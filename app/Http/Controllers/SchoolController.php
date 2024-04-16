<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    public function index() {
        $schools = School::all();
        return response()->json($schools, 200);
    }

    public function store(SchoolRequest $request)
    {
        DB::beginTransaction();

        try {
            $school = School::create($request->all());

            DB::commit();
            return response()->json($school, 201);
        } catch (\Throwable $error) {
            DB::rollback();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
