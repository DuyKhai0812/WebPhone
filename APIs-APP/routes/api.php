<?php

use App\Http\Controllers\API\BackCameraController;
use App\Http\Controllers\API\BatteryControlller;
use App\Http\Controllers\API\ConnectionController;
use App\Http\Controllers\API\DetailsProController;
use App\Http\Controllers\API\DisplayController;
use App\Http\Controllers\API\FrontCameraController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\InfoPhoneController;
use App\Http\Controllers\API\OSController;
use App\Http\Controllers\API\ProducerController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\RamController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\UtilitiesControlller;
use App\Http\Controllers\LoginADController;
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

Route::post('Login',[LoginADController::class,'login']);
/**
 * authTK Kiểm tra token để cấp quyền
 */
Route::group(['middleware'=>['connect','authTK']],function(){
    //Route về api 
    Route::apiResource('tag',TagController::class);
    Route::apiResource('product',ProductsController::class);
    Route::apiResource('producer',ProducerController::class);
    Route::apiResource('type',TypeController::class);
    Route::apiResource('details',DetailsProController::class);
    Route::apiResource('bcamera',BackCameraController::class);
    Route::apiResource('battery',BatteryControlller::class);
    Route::apiResource('connection',ConnectionController::class);
    Route::apiResource('display',DisplayController::class);
    Route::apiResource('fcamera',FrontCameraController::class);
    Route::apiResource('os',OSController::class);
    Route::apiResource('ifphone',InfoPhoneController::class);
    Route::apiResource('ram',RamController::class);
    Route::apiResource('utilities',UtilitiesControlller::class);

    //-----------------------------------------------------------------
    Route::post('status',[ProductsController::class,'Status']);
    Route::post('active',[ProductsController::class,'Active']);
    Route::get('getTable',[ProductsController::class,'getTable']);
    Route::post('addID',[ProductsController::class,'addID']);
});
Route::apiResource('img',ImageController::class);