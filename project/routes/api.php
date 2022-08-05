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
Route::get('/profileByUsername/{username}', [App\Http\Controllers\UserProfileController::class, 'apiGetProfileByUsername']);
Route::post('/editProfile/{userId}', [App\Http\Controllers\UserProfileController::class, 'apiEditProfile']);
Route::post('/updateAvatar/{userId}', [App\Http\Controllers\UserProfileController::class, 'updateAvatar']);
Route::post('/follow', [App\Http\Controllers\UserProfileController::class, 'follow']);
Route::get('/followers/{username}', [App\Http\Controllers\UserProfileController::class, 'followers']);
Route::get('/following/{username}', [App\Http\Controllers\UserProfileController::class, 'following']);
Route::get('/isFollowing/{userId}/{username}', [App\Http\Controllers\UserProfileController::class, 'isFollowing']);


//------------ Feeds SECTION ------------
Route::post('/feed/{ownerId}', [App\Http\Controllers\FeedsController::class, 'postFeed']);
Route::get('/feeds/{userId}', [App\Http\Controllers\FeedsController::class, 'apiGetFeeds']);
Route::get('/profile-feeds/{username}', [App\Http\Controllers\FeedsController::class, 'apiGetProfileFeeds']);
Route::get('/shop-feeds/{userId}/{slug}', [App\Http\Controllers\FeedsController::class, 'apiGetShopFeeds']);
Route::post('/feed-like', [App\Http\Controllers\FeedsController::class, 'likeFeed']);
Route::get('/comment/{feedId}', [App\Http\Controllers\CommentController::class, 'getComment']);
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'storeComment']);

//------------ Shop SECTION ------------
Route::get('/shopCategories', [App\Http\Controllers\ShopController::class, 'categories']);
Route::post('/createShop', [App\Http\Controllers\ShopController::class, 'store']);
Route::get('/getShops/{categoryHash}', [App\Http\Controllers\ShopController::class, 'getShops']);