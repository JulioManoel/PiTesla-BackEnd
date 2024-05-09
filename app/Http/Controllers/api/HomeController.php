<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *      path="/api/home,
 *      summary="Home data",
 *      description="",
 *      tags={"Home"},
 *      @OA\Parameters(
 *          name="name",
 *          in="query",
 *          description="provide you name",
 *          required=true,
 *      ),
 *      @OA\response(
 *          response=200,
 *          description="OK",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *          )
 *       ),
 *  )
 */
class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        return response()->json([
            'name'=>$request->input('name'),
            'message' => 'Hello World',
        ]);
    }
}
