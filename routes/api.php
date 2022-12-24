<?php

use App\Http\Controllers\Api\AdminApi40Controller;
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
// API User
Route::get('/', [UserApi40Controller::class, 'index']); // Index page
Route::post('/login40', [UserApi40Controller::class, 'login']); // Login to get bearer token
Route::post('/register40', [UserApi40Controller::class, 'store']); // create / register
Route::middleware(['auth:sanctum', 'roleapi:User'])->group(function () {
    Route::delete('/delete40', [UserApi40Controller::class, 'destroy']); // Delete all detail
    Route::post('/update_profile40', [UserApi40Controller::class, 'updateimage']); // Update user foto
    Route::get('/read40', [UserApi40Controller::class, 'show']); // Show user detail
    Route::put('/update_detail40', [UserApi40Controller::class, 'updatedetail']); // Update user detail
    Route::put('/update_password40', [UserApi40Controller::class, 'updatepassword']); // Update password
});

// API Admin
Route::get('/admin', [AdminApi40Controller::class, 'index']); // Index page
Route::post('/admin/login40', [AdminApi40Controller::class, 'login']); // Login to ge bearer token
Route::middleware(['auth:sanctum', 'roleapi:Admin'])->group(function () {
    Route::post('/admin/create40', [AdminApi40Controller::class, 'createAgama']); // Create Agama
    Route::put('/admin/update40', [AdminApi40Controller::class, 'updateAgama']); // Update Agama
    Route::delete('/admin/delete40', [AdminApi40Controller::class, 'deleteAgama']); // Delete Agama
    Route::get('/admin/read40', [AdminApi40Controller::class, 'readAgama']); // Show all user
    Route::get('/admin/detail-user40', [AdminApi40Controller::class, 'detailUser']); // Show all detail user
    Route::put('/admin/approve-user40', [AdminApi40Controller::class, 'activation']); // Update user status (Akktivasi)
});
