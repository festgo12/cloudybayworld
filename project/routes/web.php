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
Route::get('/darkmode/{mode}', [App\Http\Controllers\HomeController::class, 'darkmode'])->name('darkmode');




Route::group(['middleware'=>'auth'],function(){
    
    //------------ User SECTION ------------
    Route::get('/profile/{username}', [App\Http\Controllers\UserProfileController::class, 'profile'])->name('profile');
    Route::get('/editProfile', [App\Http\Controllers\UserProfileController::class, 'editProfile'])->name('editProfile');


    //------------ Feeds SECTION ------------
    Route::get('/feeds', [App\Http\Controllers\FeedsController::class, 'getFeeds'])->name('feeds');


    
    //------------ Shop SECTION ------------
    Route::get('/createShop', [App\Http\Controllers\ShopController::class, 'createShop'])->name('createShop');
    Route::get('/markets', [App\Http\Controllers\ShopController::class, 'markets'])->name('markets');
    Route::get('/market/p/{shop}', [App\Http\Controllers\Product\CatalogController::class, 'marketProduct'])->name('market.product');
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




 

 Route::prefix('chat')->group(function() {


    
    /*
    * This is the main app route [Chat Messenger]
    */
    // Route::get('/', 'App\Http\Controllers\MessageController@index')->name(config('chat.routes.prefix'));
    Route::get('/', 'App\Http\Controllers\MessageController@index')->name('chat');
    
    /**
     *  Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', 'App\Http\Controllers\MessageController@idFetchData');
    
    /**
     * Send message route
     */
    Route::post('/sendMessage', 'App\Http\Controllers\MessageController@send')->name('send.message');
    
    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', 'App\Http\Controllers\MessageController@fetch')->name('fetch.messages');
    
    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', 'App\Http\Controllers\MessageController@download')->name(config('chat.attachments.download_route_name'));
    // Route::get('/download/{fileName}', 'App\Http\Controllers\MessageController@download')->name('attachments.download');
    
    /**
     * Authintication for pusher private channels
     */
    Route::post('/auth', 'App\Http\Controllers\MessageController@pusherAuth')->name('pusher.auth');
    // Route::get('/auth', 'App\Http\Controllers\MessageController@pusherAuth')->name('pusher.auth');
    
    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', 'App\Http\Controllers\MessageController@seen')->name('messages.seen');
    
    /**
     * Get contacts
     */
    Route::post('/getContacts', 'App\Http\Controllers\MessageController@getContacts')->name('contacts.get');
    // Route::get('/getContacts', 'App\Http\Controllers\MessageController@getContacts')->name('contacts.get');
    
    /**
     * Update contact item data
     */
    Route::post('/updateContacts', 'App\Http\Controllers\MessageController@updateContactItem')->name('contacts.update');
    
    
    /**
     * Star in favorite list
     */
    Route::post('/star', 'App\Http\Controllers\MessageController@favorite')->name('star');
    
    /**
     * get favorites list
     */
    Route::post('/favorites', 'App\Http\Controllers\MessageController@getFavorites')->name('favorites');
    
    /**
     * Search in messenger
     */
    Route::post('/search', 'App\Http\Controllers\MessageController@search')->name('search');
    // Route::get('/search', 'App\Http\Controllers\MessageController@search')->name('search');
    
    /**
     * Get shared photos
     */
    Route::post('/shared', 'App\Http\Controllers\MessageController@sharedPhotos')->name('shared');
    // Route::get('/shared', 'App\Http\Controllers\MessageController@sharedPhotos')->name('shared');
    
    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', 'App\Http\Controllers\MessageController@deleteConversation')->name('conversation.delete');
    Route::post('/deleteMessage', 'App\Http\Controllers\MessageController@deleteMessage')->name('message.delete');
    
    /**
     * Delete Conversation
     */
    Route::post('/updateSettings', 'App\Http\Controllers\MessageController@updateSettings')->name('avatar.update');
    
    /**
     * Set active status
     */
    Route::post('/setActiveStatus', 'App\Http\Controllers\MessageController@setActiveStatus')->name('activeStatus.set');
    
    
    
    
    
    
    /*
    * [Group] view by id
    */
    Route::get('/group/{id}', 'App\Http\Controllers\MessageController@index')->name('group');
    
    /*
    * user view by id.
    * Note : If you added routes after the [User] which is the below one,
    * it will considered as user id.
    *
    * e.g. - The commented routes below :
    */
    // Route::get('/route', function(){ return 'Munaf'; }); // works as a route
    Route::get('/{id}', 'App\Http\Controllers\MessageController@index')->name('user');
    // Route::get('/route', function(){ return 'Munaf'; }); // works as a user id
    
    
    
    
    

 });  









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