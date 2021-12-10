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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'admin'], function () {
    // 'prefix' => 'admin'
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::domain('{subdomain}.'.config('app.short_url'))->group(function () {
    Route::group(['middleware' => 'client'], function () {
      Route::get('/dashboard', [App\Http\Controllers\ProductsController::class, 'index']);
    });
});

