<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home40Controller;
use App\Http\Controllers\Auth40Controller;
use App\Http\Controllers\Admin\User40Controller;
use App\Http\Controllers\User\Profile40Controller;
use App\Http\Controllers\Admin\Religion40Controller;

Route::get('/', [Home40Controller::class, 'index40'])->name('welcome40');

Route::group(['middleware' => ['guest']], function () { 
    Route::get('login40', [Auth40Controller::class, 'indexLogin40'])->name('login40');
    Route::get('register40',  [Auth40Controller::class, 'indexRegister40'])->name('register40');
    Route::post('login40', [Auth40Controller::class, 'storeLogin40'])->name('login40.store');
    Route::post('register40', [Auth40Controller::class, 'storeRegister40'])->name('register40.store');
});


Route::group(['middleware' => ['auth']], function () {
    Route::post('logout40',  [Auth40Controller::class, 'logout40'])->name('logout40');

    // Admin routes
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::get('users40', [User40Controller::class, 'index40'])->name('user40');
        Route::get('users40/{id}', [User40Controller::class, 'detail40'])->name('user40.detail');
        Route::post('users40/{id}/approve', [User40Controller::class, 'approve40'])->name('user40.approve');

        Route::get('religions40', [Religion40Controller::class, 'index40'])->name('religion40');
        Route::get('religions40/create', [Religion40Controller::class, 'create40'])->name('religion40.create');
        Route::post('religions40/store', [Religion40Controller::class, 'store40'])->name('religion40.store');
        Route::get('religions40/{id}/edit', [Religion40Controller::class, 'edit40'])->name('religion40.edit');
        Route::put('religions40/{id}/update', [Religion40Controller::class, 'update40'])->name('religion40.update');
        Route::delete('religions40/{id}', [Religion40Controller::class, 'delete40'])->name('religion40.delete');
    });

    
    // User routes
    Route::group(['middleware' => ['role:User']], function () {
        Route::get('profile40', [Profile40Controller::class, 'index40'])->name('profile40');

        Route::put('profile40/update', [Profile40Controller::class, 'update40'])->name('profile40.update');
        Route::put('profile40/password/update', [Profile40Controller::class, 'updatePassword40'])->name('profile40.password.update');
        Route::put('profile40/avatar/update', [Profile40Controller::class, 'updateAvatar40'])->name('profile40.avatar.update');
    });

});
