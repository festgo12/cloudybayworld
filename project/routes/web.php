<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::group(['middleware'=>'auth'],function(){
    
    //------------ User SECTION ------------
    Route::get('/profile/{username}', [App\Http\Controllers\UserProfileController::class, 'profile'])->name('profile');
    Route::get('/editProfile', [App\Http\Controllers\UserProfileController::class, 'editProfile'])->name('editProfile');


    //------------ Feeds SECTION ------------
    Route::get('/feeds', [App\Http\Controllers\FeedsController::class, 'getFeeds'])->name('feeds');


    
    //------------ Shop SECTION ------------
    
    
    //------------ Products SECTION ------------
    




    Route::group(['middleware'=>'vendor'],function(){
    //------------ Vendor SECTION ------------
       
        // Route::get('/vendor', function(){
        //     dd('vendor routes');
        // });






    


    });
 
    

});





Route::group(['middleware'=>'auth:admin'],function(){
    //------------ ADMIN SECTION ------------
   
    
    

});