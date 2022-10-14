<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\CustomerInfoController;
use App\Http\Controllers\API\DetailOrderController;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PartnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('customer',CustomerController::class);
Route::apiResource('group',GroupController::class);
Route::apiResource('info',CustomerInfoController::class);
Route::apiResource('partner',PartnerController::class);
Route::apiResource('order',OrderController::class);
Route::apiResource('detail',DetailOrderController::class);

Route::post('login',[CustomerController::class,'LoginCustomer']);
Route::post('statusOrder',[OrderController::class,'StatusOrder']);
