<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApi40Controller;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/',[UserApi40Controller::class,'index']);
Route::post('/login40', [UserApi40Controller::class, 'login']);
Route::post('/register40', [UserApi40Controller::class, 'store']);
Route::middleware(['auth:sanctum','role:User'])->group(function () {
    Route::delete('/delete40', [UserApi40Controller::class, 'destroy']);
    Route::post('/update_profile40', [UserApi40Controller::class, 'updateimage']);
    Route::post('/read40', [UserApi40Controller::class, 'show']);
    Route::put('/update_detail40', [UserApi40Controller::class, 'updatedetail']);
    Route::put('/update_password40', [UserApi40Controller::class, 'updatepassword']);
});
