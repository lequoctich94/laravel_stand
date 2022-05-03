<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Login;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [Login::class,"login"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json([
        'status_code' => 200,
        'token_type' => 'Bearer',
        'user' => $request->user()
    ]);
});
