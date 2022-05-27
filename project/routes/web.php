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
    return view('landing');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/login2', function () {
    return view('auth.login2');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






  //------------ User SECTION ------------



  //------------ Shop Vendor SECTION ------------
  //------------ Products SECTION ------------
  //------------ ADMIN SECTION ------------
