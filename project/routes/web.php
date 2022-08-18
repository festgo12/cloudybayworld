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
    Route::get('/createShop', [App\Http\Controllers\ShopController::class, 'createShop'])->name('createShop');
    Route::get('/markets', [App\Http\Controllers\ShopController::class, 'markets'])->name('markets');
    Route::get('/market/{slug}', [App\Http\Controllers\ShopController::class, 'marketDetails']);
    Route::get('/market/feeds/{slug}', [App\Http\Controllers\ShopController::class, 'marketfeeds']);    
    
    //------------ Products SECTION ------------

    Route::get('/category/{category?}/{subcategory?}/{childcategory?}', 'App\Http\Controllers\Product\CatalogController@category')->name('product.index');
    Route::get('/item/{slug}', 'App\Http\Controllers\Product\ProductController@product')->name('product.details');
    Route::post('/item/review','App\Http\Controllers\Product\CatalogController@reviewsubmit')->name('product.review.submit');
    Route::get('/item/view/review/{id}','App\Http\Controllers\Product\CatalogController@reviews')->name('product.reviews');


      // CART SECTION
  Route::get('/carts/view','App\Http\Controllers\Product\CartController@cartview');
  Route::get('/carts/','App\Http\Controllers\Product\CartController@cart')->name('product.cart');
  Route::get('/addcart/{id}','App\Http\Controllers\Product\CartController@addcart')->name('product.cart.add');
  Route::get('/addtocart/{id}','App\Http\Controllers\Product\CartController@addtocart')->name('product.cart.quickadd');
//   Route::get('/addnumcart','App\Http\Controllers\Product\CartController@addnumcart');
//   Route::get('/addtonumcart','App\Http\Controllers\Product\CartController@addtonumcart');
  Route::get('/addbyone','App\Http\Controllers\Product\CartController@addbyone');
  Route::get('/reducebyone','App\Http\Controllers\Product\CartController@reducebyone');
  Route::get('/removecart/{id}','App\Http\Controllers\Product\CartController@removecart')->name('product.cart.remove');

  // CART SECTION ENDS

  // User Wishlist
  Route::get('/wishlists','App\Http\Controllers\Product\WishlistController@wishlists')->name('product-wishlists');
  Route::get('/wishlist/add/{id}','App\Http\Controllers\Product\WishlistController@addwish')->name('product-wishlist-add');
  Route::get('/wishlist/remove/{id}','App\Http\Controllers\Product\WishlistController@removewish')->name('product-wishlist-remove');
  // User Wishlist Ends
  
  // User Orders
  Route::get('/orders','App\Http\Controllers\Product\OrderController@index')->name('order.history');



// User Orders Ends

 // CHECKOUT SECTION
    Route::get('/checkout/','App\Http\Controllers\Product\CheckoutController@checkout')->name('product.checkout');
    Route::get('/checkout/payment/return', 'App\Http\Controllers\Product\PaymentController@payreturn')->name('payment.return');
    Route::get('/checkout/payment/cancle', 'App\Http\Controllers\Product\PaymentController@paycancle')->name('payment.cancle');
    Route::post('/cashondelivery', 'App\Http\Controllers\Product\CheckoutController@cashondelivery')->name('cash.submit');
 // CHECKOUT SECTION ENDS












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