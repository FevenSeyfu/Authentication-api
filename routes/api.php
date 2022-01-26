<?php
use App\Http\Controllers\productController;
use App\Http\Controllers\AuthController;
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
//public route
Route::post('/register',[AuthController::class ,'register']);
Route::get('/products',[productController::class,'index']);
Route::get('/products/{id}',[productController::class,'show']);
Route::get('/products/search/{name}', [productController::class,'search']);

//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout',[AuthController::class ,'logout']);
    Route::post('/products',[productController::class ,'store']);
    Route::put('/products/{id}',[productController::class,'update']);
    Route::delete('/products/{id}',[productController::class,'destroy']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
