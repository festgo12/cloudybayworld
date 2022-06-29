<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//------------ User SECTION ------------
Route::get('/profile/{userId}', [App\Http\Controllers\UserProfileController::class, 'apiGetProfile']);
Route::post('/editProfile/{userId}', [App\Http\Controllers\UserProfileController::class, 'apiEditProfile']);

//------------ Feeds SECTION ------------
Route::post('/feed/{userId}', [App\Http\Controllers\FeedsController::class, 'postFeed']);
Route::get('/feeds/{userId}', [App\Http\Controllers\FeedsController::class, 'apiGetFeeds']);
Route::get('/feed-like/{userId}/{feedId}', [App\Http\Controllers\FeedsController::class, 'likeFeed']);
