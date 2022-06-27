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
    // Route::get('/profile', function(){
    //     dd('user routes');
    // });
    





    
    //------------ Shop SECTION ------------
    
    
    //------------ Products SECTION ------------

    Route::get('/category/{category?}/{subcategory?}/{childcategory?}', 'App\Http\Controllers\Product\CatalogController@category')->name('product.index');
    Route::get('/item/{slug}', 'App\Http\Controllers\Product\ProductController@product')->name('product.details');


      // CART SECTION
  Route::get('/carts/view','App\Http\Controllers\Product\CartController@cartview');
  Route::get('/carts/','App\Http\Controllers\Product\CartController@cart')->name('front.cart');
  Route::get('/addcart/{id}','App\Http\Controllers\Product\CartController@addcart')->name('product.cart.add');
  Route::get('/addtocart/{id}','App\Http\Controllers\Product\CartController@addtocart')->name('product.cart.quickadd');
//   Route::get('/addnumcart','App\Http\Controllers\Product\CartController@addnumcart');
//   Route::get('/addtonumcart','App\Http\Controllers\Product\CartController@addtonumcart');
//   Route::get('/addbyone','App\Http\Controllers\Product\CartController@addbyone');
//   Route::get('/reducebyone','App\Http\Controllers\Product\CartController@reducebyone');
  Route::get('/removecart/{id}','App\Http\Controllers\Product\CartController@removecart')->name('product.cart.remove');

  // CART SECTION ENDS

  // User Orders



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