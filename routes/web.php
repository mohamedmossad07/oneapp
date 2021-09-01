<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// provider`s locations route
Route::domain('{user_name}.oneapp')->group(function ($user_name) {
     Route::get('/', [\App\Http\Controllers\Admin\ProviderController::class, 'getLocationsByUserName']);
});
