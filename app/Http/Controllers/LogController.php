<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $log = Log::all();
        return response()->json($log, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $log = Log::create($request->all());

            DB::commit();
            return response()->json($log, 201);
        } catch (\Throwable $error) {
            DB::rollBack();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        return response()->json($log, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        DB::beginTransaction();

        try {
            $log->update($request->all());

            DB::commit();
            return response()->json($log, 200);
        } catch (\Throwable $error) {
            DB::rollBack();
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $log = Log::find($id);
            if (empty($log)) {
                throw new \Exception('Log not found', 404);
            }

            $log->delete();
            return response()->json(['message' => 'Log deleted'], 200);
        } catch (\Throwable $error) {
            return response()->json(['message' => $error->getMessage()], $error->getCode() ?? 500);
        }
    }
}
