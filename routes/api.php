<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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


//* Group auth login,me,logout
Route::prefix('auth')->group(function () {

    Route::post('login', [AuthController::class, 'login']);

Route::get('me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);

});

//*Group middleware dari cook & create order
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/create-order', function() {
    return 'create-order';
})->middleware(['AbleCreateOrder']);

Route::post('/cook-order', function() {
    return 'cook-order';
})->middleware(['AbleCookOrder']);

Route::post('/create-user', [UserController::class, 'store'])->middleware(['AbleCreateUser']);

});

