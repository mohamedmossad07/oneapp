<?php

use Illuminate\Support\Facades\Route;

//this file for dashboard and admin routes (backend)

Route::group(['prefix' => 'auth'], function () {

//    show login form to admin or provider only
    Route::get('{user_level}/login', [\App\Http\Controllers\BackendLogin::class, 'view_login'])->where('user_level', 'provider|admin')->name('auth.login');
//    handel login data and check auth
    Route::post('{user_level}/login', [\App\Http\Controllers\BackendLogin::class, 'login'])->where('user_level', 'provider|admin')->name('admins.login');
});


//route for admin and provider dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
//    admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
        //        this admin home route
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'home'])->name('home');

//        this crud route for provider controlled by admins.
        Route::resource('providers', \App\Http\Controllers\Admin\ProviderController::class);
        //        this route for adding locations to provider.
        Route::post('providers/locations', [\App\Http\Controllers\Admin\ProviderController::class, 'locations'])->name('providers.locations');
    });
//    provider routes
    Route::group(['prefix' => 'provider', 'as' => 'provider.', 'middleware' => 'auth:provider'], function () {
//        this provider home route
        Route::get('/', [\App\Http\Controllers\Admin\ProviderController::class, 'home'])->name('home');
    });

});


