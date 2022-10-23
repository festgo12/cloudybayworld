<?php

use Illuminate\Mail\Markdown;
use App\Mail\newUserWelcomeMail;
use App\Notifications\UserCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Notifications\Messages\MailMessage;

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

Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('signup');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/email-welcome', function (){
   return new newUserWelcomeMail();
});
Route::get('/email-welcome2', function (){
  $data = App\Models\User::first();
  $data->pass = '1234';
  // dd($data);
  $mail = new App\Notifications\OrderUpdated($data);

   return $mail->toMail('')->render();
});



Route::group(['middleware'=>'auth'],function(){
  Route::get('/darkmode/{mode}', [App\Http\Controllers\HomeController::class, 'darkmode'])->name('darkmode');
  Route::get('/min_msg', [App\Http\Controllers\HomeController::class, 'min_msg'])->name('min_msg');
  Route::get('/noti', [App\Http\Controllers\HomeController::class, 'noti'])->name('noti');
  Route::get('/config', [App\Http\Controllers\HomeController::class, 'config'])->name('config');
  Route::get('/noti-markAll', [App\Http\Controllers\HomeController::class, 'markasread'])->name('markasread');
  Route::get('/become-a-seller', [App\Http\Controllers\HomeController::class, 'seller'])->name('seller');
    
    //------------ User SECTION ------------
    Route::get('/profile/{username}', [App\Http\Controllers\UserProfileController::class, 'profile'])->name('profile');
    Route::get('/editProfile', [App\Http\Controllers\UserProfileController::class, 'editProfile'])->name('editProfile');
    Route::get('/password', [App\Http\Controllers\UserProfileController::class, 'passwordreset'])->name('user.password');
    Route::post('/password/update', [App\Http\Controllers\UserProfileController::class, 'changepass'])->name('user.password.update');

    // Route::get('/password', 'App\Http\Controllers\Admin\DashboardController@passwordreset')->name('admin.password');
  // Route::post('/password/update', 'App\Http\Controllers\Admin\DashboardController@changepass')->name('admin.password.update');


    //------------ Feeds SECTION ------------
    Route::get('/feeds', [App\Http\Controllers\FeedsController::class, 'getFeeds'])->name('feeds');


    
    //------------ Shop SECTION ------------
    Route::get('/createShop', [App\Http\Controllers\ShopController::class, 'createShop'])->name('createShop');
    Route::get('/markets', [App\Http\Controllers\ShopController::class, 'markets'])->name('markets');
    Route::get('/markets-favorites', [App\Http\Controllers\ShopController::class, 'favorites'])->name('market.favorites');
    Route::get('/market/p/{shop}', [App\Http\Controllers\Product\CatalogController::class, 'marketProduct'])->name('market.product');
    Route::get('/market/{slug}', [App\Http\Controllers\ShopController::class, 'marketDetails'])->name('marketDetails');
    Route::get('/market/feeds/{slug}', [App\Http\Controllers\ShopController::class, 'marketfeeds']);    
    Route::post('/market/blog/create', [App\Http\Controllers\ShopController::class, 'createBlog'])->name('market-blog-create');
    
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


//------------ Wallet SECTION ------------
Route::get('/wallet', [App\Http\Controllers\WalletController::class , 'index'])->name('wallet');
Route::post('/fundWallet', [App\Http\Controllers\WalletController::class , 'fundWallet'])->name('fundWallet');

//------------ Search SECTION ------------
Route::get('/search', [App\Http\Controllers\SearchController::class , 'search'])->name('general-search');
 

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
    Route::get('/{id}', 'App\Http\Controllers\MessageController@index')->name('chat.user');
    // Route::get('/{username}/{fakeslug}', 'App\Http\Controllers\MessageController@index')->name('chat.user');
    // Route::get('/{username}/{fakeslug}', 'App\Http\Controllers\MessageController@index')->name('chat.username');

 });  









    Route::group(['middleware'=>'vendor'],function(){
    //------------ Vendor SECTION ------------
       
        // Route::get('/vendor', function(){
        //     dd('vendor routes');
        // });






    


    });
 
    

});





// Route::group(['middleware'=>'auth:admin'],function(){
    //------------ ADMIN SECTION ------------
   
    
// ************************************ ADMIN SECTION **********************************************

Route::prefix('admin')->group(function() {

  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.submit');
  Route::get('/forgot', 'App\Http\Controllers\Admin\LoginController@showForgotForm')->name('admin.forgot');
  Route::post('/forgot', 'App\Http\Controllers\Admin\LoginController@forgot')->name('admin.forgot.submit');
  Route::get('/change-password/{token}', 'App\Http\Controllers\Admin\LoginController@showChangePassForm')->name('admin.change.token');
  Route::post('/change-password', 'App\Http\Controllers\Admin\LoginController@changepass')->name('admin.change.password');
  Route::get('/logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('admin.logout');

  //------------ ADMIN LOGIN SECTION ENDS ------------

  //------------ ADMIN NOTIFICATION SECTION ------------

  // Notification Count
  Route::get('/all/notf/count','App\Http\Controllers\Admin\NotificationController@all_notf_count')->name('all-notf-count');
  // Notification Count Ends

  // User Notification
  Route::get('/user/notf/show', 'App\Http\Controllers\Admin\NotificationController@user_notf_show')->name('user-notf-show');
  Route::get('/user/notf/clear','App\Http\Controllers\Admin\NotificationController@user_notf_clear')->name('user-notf-clear');
  // User Notification Ends

  // Order Notification
  Route::get('/order/notf/show', 'App\Http\Controllers\Admin\NotificationController@order_notf_show')->name('order-notf-show');
  Route::get('/order/notf/clear','App\Http\Controllers\Admin\NotificationController@order_notf_clear')->name('order-notf-clear');
  // Order Notification Ends

  // Product Notification
  Route::get('/product/notf/show', 'App\Http\Controllers\Admin\NotificationController@product_notf_show')->name('product-notf-show');
  Route::get('/product/notf/clear','App\Http\Controllers\Admin\NotificationController@product_notf_clear')->name('product-notf-clear');
  // Product Notification Ends

  // Product Notification
  Route::get('/conv/notf/show', 'App\Http\Controllers\Admin\NotificationController@conv_notf_show')->name('conv-notf-show');
  Route::get('/conv/notf/clear','App\Http\Controllers\Admin\NotificationController@conv_notf_clear')->name('conv-notf-clear');
  // Product Notification Ends

  //------------ ADMIN NOTIFICATION SECTION ENDS ------------

  //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
  Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
  Route::get('/profile', 'App\Http\Controllers\Admin\DashboardController@profile')->name('admin.profile');
  Route::post('/profile/update', 'App\Http\Controllers\Admin\DashboardController@profileupdate')->name('admin.profile.update');
  Route::get('/password', 'App\Http\Controllers\Admin\DashboardController@passwordreset')->name('admin.password');
  Route::post('/password/update', 'App\Http\Controllers\Admin\DashboardController@changepass')->name('admin.password.update');
  //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------


  //------------ ADMIN ORDER SECTION ------------

  Route::group(['middleware'=>'permissions:orders'],function(){

  Route::get('/orders/datatables/{slug}', 'App\Http\Controllers\Admin\OrderController@datatables')->name('admin-order-datatables'); //JSON REQUEST
  Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('admin-order-index');
  Route::get('/order/edit/{id}', 'App\Http\Controllers\Admin\OrderController@edit')->name('admin-order-edit');
  Route::post('/order/update/{id}', 'App\Http\Controllers\Admin\OrderController@update')->name('admin-order-update');
  Route::get('/orders/pending', 'App\Http\Controllers\Admin\OrderController@pending')->name('admin-order-pending');
  Route::get('/orders/processing', 'App\Http\Controllers\Admin\OrderController@processing')->name('admin-order-processing');
  Route::get('/orders/completed', 'App\Http\Controllers\Admin\OrderController@completed')->name('admin-order-completed');
  Route::get('/orders/declined', 'App\Http\Controllers\Admin\OrderController@declined')->name('admin-order-declined');
  Route::get('/order/{id}/show', 'App\Http\Controllers\Admin\OrderController@show')->name('admin-order-show');
  Route::get('/order/{id}/invoice', 'App\Http\Controllers\Admin\OrderController@invoice')->name('admin-order-invoice');
  Route::get('/order/{id}/print', 'App\Http\Controllers\Admin\OrderController@printpage')->name('admin-order-print');
  Route::get('/order/{id1}/status/{status}', 'App\Http\Controllers\Admin\OrderController@status')->name('admin-order-status');
  Route::post('/order/email/', 'App\Http\Controllers\Admin\OrderController@emailsub')->name('admin-order-emailsub');
  Route::post('/order/{id}/license', 'App\Http\Controllers\Admin\OrderController@license')->name('admin-order-license');

  // Order Tracking

  Route::get('/order/{id}/track', 'App\Http\Controllers\Admin\OrderTrackController@index')->name('admin-order-track');
  Route::get('/order/{id}/trackload', 'App\Http\Controllers\Admin\OrderTrackController@load')->name('admin-order-track-load');
  Route::post('/order/track/store', 'App\Http\Controllers\Admin\OrderTrackController@store')->name('admin-order-track-store');
  Route::get('/order/track/add', 'App\Http\Controllers\Admin\OrderTrackController@add')->name('admin-order-track-add');
  Route::get('/order/track/edit/{id}', 'App\Http\Controllers\Admin\OrderTrackController@edit')->name('admin-order-track-edit');
  Route::post('/order/track/update/{id}', 'App\Http\Controllers\Admin\OrderTrackController@update')->name('admin-order-track-update');
  Route::get('/order/track/delete/{id}', 'App\Http\Controllers\Admin\OrderTrackController@delete')->name('admin-order-track-delete');

  // Order Tracking Ends

  });

  //------------ ADMIN ORDER SECTION ENDS------------


  //------------ ADMIN PRODUCT SECTION ------------

  Route::group(['middleware'=>'permissions:products'],function(){

  Route::get('/products/datatables', 'App\Http\Controllers\Admin\ProductController@datatables')->name('admin-prod-datatables'); //JSON REQUEST
  Route::get('/products', 'App\Http\Controllers\Admin\ProductController@index')->name('admin-prod-index');

  Route::post('/products/upload/update/{id}', 'App\Http\Controllers\Admin\ProductController@uploadUpdate')->name('admin-prod-upload-update');

  Route::get('/products/deactive/datatables', 'App\Http\Controllers\Admin\ProductController@deactivedatatables')->name('admin-prod-deactive-datatables'); //JSON REQUEST
  Route::get('/products/deactive', 'App\Http\Controllers\Admin\ProductController@deactive')->name('admin-prod-deactive');


  Route::get('/products/catalogs/datatables', 'App\Http\Controllers\Admin\ProductController@catalogdatatables')->name('admin-prod-catalog-datatables'); //JSON REQUEST
  Route::get('/products/catalogs/', 'App\Http\Controllers\Admin\ProductController@catalogs')->name('admin-prod-catalog-index');

  // CREATE SECTION
  Route::get('/products/types', 'App\Http\Controllers\Admin\ProductController@types')->name('admin-prod-types');
  Route::get('/products/physical/create', 'App\Http\Controllers\Admin\ProductController@createPhysical')->name('admin-prod-physical-create');
  Route::get('/products/digital/create', 'App\Http\Controllers\Admin\ProductController@createDigital')->name('admin-prod-digital-create');
  Route::get('/products/license/create', 'App\Http\Controllers\Admin\ProductController@createLicense')->name('admin-prod-license-create');
  Route::post('/products/store', 'App\Http\Controllers\Admin\ProductController@store')->name('admin-prod-store');
  Route::get('/getattributes', 'App\Http\Controllers\Admin\ProductController@getAttributes')->name('admin-prod-getattributes');
  // CREATE SECTION

    // EDIT SECTION
  Route::get('/products/edit/{id}', 'App\Http\Controllers\Admin\ProductController@edit')->name('admin-prod-edit');
  Route::post('/products/edit/{id}', 'App\Http\Controllers\Admin\ProductController@update')->name('admin-prod-update');
  // EDIT SECTION ENDS



  // DELETE SECTION
  Route::get('/products/delete/{id}', 'App\Http\Controllers\Admin\ProductController@destroy')->name('admin-prod-delete');
  // DELETE SECTION ENDS


  Route::get('/products/catalog/{id1}/{id2}', 'App\Http\Controllers\Admin\ProductController@catalog')->name('admin-prod-catalog');
  //------------ ADMIN PRODUCT SECTION ENDS------------

  });




  //------------ ADMIN USER SECTION ------------

  Route::group(['middleware'=>'permissions:customers'],function(){

  Route::get('/users/datatables', 'App\Http\Controllers\Admin\UserController@datatables')->name('admin-user-datatables'); //JSON REQUEST
  Route::get('/users', 'App\Http\Controllers\Admin\UserController@index')->name('admin-user-index');
  Route::get('/users/edit/{id}', 'App\Http\Controllers\Admin\UserController@edit')->name('admin-user-edit');
  Route::post('/users/edit/{id}', 'App\Http\Controllers\Admin\UserController@update')->name('admin-user-update');
  Route::get('/users/delete/{id}', 'App\Http\Controllers\Admin\UserController@destroy')->name('admin-user-delete');
  Route::get('/user/{id}/show', 'App\Http\Controllers\Admin\UserController@show')->name('admin-user-show');
  Route::get('/users/ban/{id1}/{id2}', 'App\Http\Controllers\Admin\UserController@ban')->name('admin-user-ban');
  Route::get('/user/default/image', 'App\Http\Controllers\Admin\UserController@image')->name('admin-user-image');




  });

  //------------ ADMIN USER SECTION ENDS ------------

  //------------ ADMIN VENDOR SECTION ------------

  Route::group(['middleware'=>'permissions:vendors'],function(){

  Route::get('/vendors/datatables', 'App\Http\Controllers\Admin\VendorController@datatables')->name('admin-vendor-datatables');
  Route::get('/vendors', 'App\Http\Controllers\Admin\VendorController@index')->name('admin-vendor-index');

  Route::get('/vendors/{id}/show', 'App\Http\Controllers\Admin\VendorController@show')->name('admin-vendor-show');
  Route::get('/vendors/secret/login/{id}', 'App\Http\Controllers\Admin\VendorController@secret')->name('admin-vendor-secret');
  Route::get('/vendor/edit/{id}', 'App\Http\Controllers\Admin\VendorController@edit')->name('admin-vendor-edit');
  Route::get('/vendor/create', 'App\Http\Controllers\Admin\VendorController@create')->name('admin-vendor-create');
  Route::post('/vendor/create', 'App\Http\Controllers\Admin\VendorController@store')->name('admin-vendor-create');
  Route::post('/vendor/edit/{id}', 'App\Http\Controllers\Admin\VendorController@update')->name('admin-vendor-update');

  Route::get('/vendors', 'App\Http\Controllers\Admin\VendorController@index')->name('admin-vendor-index');
  Route::get('/vendor/color', 'App\Http\Controllers\Admin\VendorController@color')->name('admin-vendor-color');
  Route::get('/vendors/status/{id1}/{id2}', 'App\Http\Controllers\Admin\VendorController@status')->name('admin-vendor-st');
  Route::get('/vendors/delete/{id}', 'App\Http\Controllers\Admin\VendorController@destroy')->name('admin-vendor-delete');

  
  Route::get('/vendors/withdraws/datatables', 'App\Http\Controllers\Admin\VendorController@withdrawdatatables')->name('admin-vendor-withdraw-datatables'); //JSON REQUEST
  Route::get('/vendors/withdraws', 'App\Http\Controllers\Admin\VendorController@withdraws')->name('admin-vendor-withdraw-index');
  Route::get('/vendors/withdraw/{id}/show', 'App\Http\Controllers\Admin\VendorController@withdrawdetails')->name('admin-vendor-withdraw-show');
  Route::get('/vendors/withdraws/accept/{id}', 'App\Http\Controllers\Admin\VendorController@accept')->name('admin-vendor-withdraw-accept');
  Route::get('/vendors/withdraws/reject/{id}', 'App\Http\Controllers\Admin\VendorController@reject')->name('admin-vendor-withdraw-reject');

  // shop Category

  Route::get('/shopcategory/datatables', 'App\Http\Controllers\Admin\ShopCategoryController@datatables')->name('admin-shopcat-datatables'); //JSON REQUEST
  Route::get('/shopcategory', 'App\Http\Controllers\Admin\ShopCategoryController@index')->name('admin-shopcat-index');
  Route::get('/shopcategory/create', 'App\Http\Controllers\Admin\ShopCategoryController@create')->name('admin-shopcat-create');
  Route::post('/shopcategory/create', 'App\Http\Controllers\Admin\ShopCategoryController@store')->name('admin-shopcat-store');
  Route::get('/shopcategory/edit/{id}', 'App\Http\Controllers\Admin\ShopCategoryController@edit')->name('admin-shopcat-edit');
  Route::post('/shopcategory/edit/{id}', 'App\Http\Controllers\Admin\ShopCategoryController@update')->name('admin-shopcat-update');
  Route::get('/shopcategory/delete/{id}', 'App\Http\Controllers\Admin\ShopCategoryController@destroy')->name('admin-shopcat-delete');
  // Route::get('/shopcategory/status/{id1}/{id2}', 'App\Http\Controllers\Admin\ShopCategoryController@status')->name('admin-cat-status');
 






  });




  //------------ ADMIN VENDOR SECTION ENDS ------------




  //------------ ADMIN CATEGORY SECTION ------------

  Route::group(['middleware'=>'permissions:categories'],function(){

  Route::get('/category/datatables', 'App\Http\Controllers\Admin\CategoryController@datatables')->name('admin-cat-datatables'); //JSON REQUEST
  Route::get('/category', 'App\Http\Controllers\Admin\CategoryController@index')->name('admin-cat-index');
  Route::get('/category/create', 'App\Http\Controllers\Admin\CategoryController@create')->name('admin-cat-create');
  Route::post('/category/create', 'App\Http\Controllers\Admin\CategoryController@store')->name('admin-cat-store');
  Route::get('/category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit')->name('admin-cat-edit');
  Route::post('/category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@update')->name('admin-cat-update');
  Route::get('/category/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy')->name('admin-cat-delete');
  Route::get('/category/status/{id1}/{id2}', 'App\Http\Controllers\Admin\CategoryController@status')->name('admin-cat-status');


  //------------ ADMIN ATTRIBUTE SECTION ------------

  Route::get('/attribute/datatables', 'App\Http\Controllers\Admin\AttributeController@datatables')->name('admin-attr-datatables'); //JSON REQUEST
  Route::get('/attribute', 'App\Http\Controllers\Admin\AttributeController@index')->name('admin-attr-index');
  Route::get('/attribute/{catid}/attrCreateForCategory', 'App\Http\Controllers\Admin\AttributeController@attrCreateForCategory')->name('admin-attr-createForCategory');
  Route::get('/attribute/{subcatid}/attrCreateForSubcategory', 'App\Http\Controllers\Admin\AttributeController@attrCreateForSubcategory')->name('admin-attr-createForSubcategory');
  Route::get('/attribute/{childcatid}/attrCreateForChildcategory', 'App\Http\Controllers\Admin\AttributeController@attrCreateForChildcategory')->name('admin-attr-createForChildcategory');
  Route::post('/attribute/store', 'App\Http\Controllers\Admin\AttributeController@store')->name('admin-attr-store');
  Route::get('/attribute/{id}/manage', 'App\Http\Controllers\Admin\AttributeController@manage')->name('admin-attr-manage');
  Route::get('/attribute/{attrid}/edit', 'App\Http\Controllers\Admin\AttributeController@edit')->name('admin-attr-edit');
  Route::post('/attribute/edit/{id}', 'App\Http\Controllers\Admin\AttributeController@update')->name('admin-attr-update');
  Route::get('/attribute/{id}/options', 'App\Http\Controllers\Admin\AttributeController@options')->name('admin-attr-options');
  Route::get('/attribute/delete/{id}', 'App\Http\Controllers\Admin\AttributeController@destroy')->name('admin-attr-delete');


  // SUBCATEGORY SECTION ------------

  Route::get('/subcategory/datatables', 'App\Http\Controllers\Admin\SubCategoryController@datatables')->name('admin-subcat-datatables'); //JSON REQUEST
  Route::get('/subcategory', 'App\Http\Controllers\Admin\SubCategoryController@index')->name('admin-subcat-index');
  Route::get('/subcategory/create', 'App\Http\Controllers\Admin\SubCategoryController@create')->name('admin-subcat-create');
  Route::post('/subcategory/create', 'App\Http\Controllers\Admin\SubCategoryController@store')->name('admin-subcat-store');
  Route::get('/subcategory/edit/{id}', 'App\Http\Controllers\Admin\SubCategoryController@edit')->name('admin-subcat-edit');
  Route::post('/subcategory/edit/{id}', 'App\Http\Controllers\Admin\SubCategoryController@update')->name('admin-subcat-update');
  Route::get('/subcategory/delete/{id}', 'App\Http\Controllers\Admin\SubCategoryController@destroy')->name('admin-subcat-delete');
  Route::get('/subcategory/status/{id1}/{id2}', 'App\Http\Controllers\Admin\SubCategoryController@status')->name('admin-subcat-status');
  Route::get('/load/subcategories/{id}/', 'App\Http\Controllers\Admin\SubCategoryController@load')->name('admin-subcat-load'); //JSON REQUEST

  // SUBCATEGORY SECTION ENDS------------

  // CHILDCATEGORY SECTION ------------

  Route::get('/childcategory/datatables', 'App\Http\Controllers\Admin\ChildCategoryController@datatables')->name('admin-childcat-datatables'); //JSON REQUEST
  Route::get('/childcategory', 'App\Http\Controllers\Admin\ChildCategoryController@index')->name('admin-childcat-index');
  Route::get('/childcategory/create', 'App\Http\Controllers\Admin\ChildCategoryController@create')->name('admin-childcat-create');
  Route::post('/childcategory/create', 'App\Http\Controllers\Admin\ChildCategoryController@store')->name('admin-childcat-store');
  Route::get('/childcategory/edit/{id}', 'App\Http\Controllers\Admin\ChildCategoryController@edit')->name('admin-childcat-edit');
  Route::post('/childcategory/edit/{id}', 'App\Http\Controllers\Admin\ChildCategoryController@update')->name('admin-childcat-update');
  Route::get('/childcategory/delete/{id}', 'App\Http\Controllers\Admin\ChildCategoryController@destroy')->name('admin-childcat-delete');
  Route::get('/childcategory/status/{id1}/{id2}', 'App\Http\Controllers\Admin\ChildCategoryController@status')->name('admin-childcat-status');
  Route::get('/load/childcategories/{id}/', 'App\Http\Controllers\Admin\ChildCategoryController@load')->name('admin-childcat-load'); //JSON REQUEST

  // CHILDCATEGORY SECTION ENDS------------

  });

  //------------ ADMIN CATEGORY SECTION ENDS------------


  //------------ ADMIN CSV IMPORT SECTION ------------

  Route::group(['middleware'=>'permissions:bulk_product_upload'],function(){

    Route::get('/products/import', 'App\Http\Controllers\Admin\ProductController@import')->name('admin-prod-import');
    Route::post('/products/import-submit', 'App\Http\Controllers\Admin\ProductController@importSubmit')->name('admin-prod-importsubmit');

    });

  //------------ ADMIN CSV IMPORT SECTION ENDS ------------

  //------------ ADMIN PRODUCT DISCUSSION SECTION ------------

    Route::group(['middleware'=>'permissions:product_discussion'],function(){

    // RATING SECTION ENDS------------

    Route::get('/ratings/datatables', 'App\Http\Controllers\Admin\RatingController@datatables')->name('admin-rating-datatables'); //JSON REQUEST
    Route::get('/ratings', 'App\Http\Controllers\Admin\RatingController@index')->name('admin-rating-index');
    Route::get('/ratings/delete/{id}', 'App\Http\Controllers\Admin\RatingController@destroy')->name('admin-rating-delete');
    Route::get('/ratings/show/{id}', 'App\Http\Controllers\Admin\RatingController@show')->name('admin-rating-show');
    Route::post('/ratings/create', 'App\Http\Controllers\Admin\RatingController@create')->name('admin-rating-create');

    // RATING SECTION ENDS------------

   

    });

 //------------ ADMIN PRODUCT DISCUSSION SECTION ENDS ------------


  //------------ ADMIN COUPON SECTION ------------

  Route::group(['middleware'=>'permissions:set_coupons'],function(){

  Route::get('/coupon/datatables', 'App\Http\Controllers\Admin\CouponController@datatables')->name('admin-coupon-datatables'); //JSON REQUEST
  Route::get('/coupon', 'App\Http\Controllers\Admin\CouponController@index')->name('admin-coupon-index');
  Route::get('/coupon/create', 'App\Http\Controllers\Admin\CouponController@create')->name('admin-coupon-create');
  Route::post('/coupon/create', 'App\Http\Controllers\Admin\CouponController@store')->name('admin-coupon-store');
  Route::get('/coupon/edit/{id}', 'App\Http\Controllers\Admin\CouponController@edit')->name('admin-coupon-edit');
  Route::post('/coupon/edit/{id}', 'App\Http\Controllers\Admin\CouponController@update')->name('admin-coupon-update');
  Route::get('/coupon/delete/{id}', 'App\Http\Controllers\Admin\CouponController@destroy')->name('admin-coupon-delete');
  Route::get('/coupon/status/{id1}/{id2}', 'App\Http\Controllers\Admin\CouponController@status')->name('admin-coupon-status');

  });

  //------------ ADMIN COUPON SECTION ENDS------------

  //------------ ADMIN BLOG SECTION ------------

  Route::group(['middleware'=>'permissions:blog'],function(){

  Route::get('/blog/datatables', 'App\Http\Controllers\Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
  Route::get('/blog', 'App\Http\Controllers\Admin\BlogController@index')->name('admin-blog-index');
  Route::get('/blog/create', 'App\Http\Controllers\Admin\BlogController@create')->name('admin-blog-create');
  Route::post('/blog/create', 'App\Http\Controllers\Admin\BlogController@store')->name('admin-blog-store');
  Route::get('/blog/edit/{id}', 'App\Http\Controllers\Admin\BlogController@edit')->name('admin-blog-edit');
  Route::post('/blog/edit/{id}', 'App\Http\Controllers\Admin\BlogController@update')->name('admin-blog-update');
  Route::get('/blog/delete/{id}', 'App\Http\Controllers\Admin\BlogController@destroy')->name('admin-blog-delete');

  Route::get('/blog/category/datatables', 'App\Http\Controllers\Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
  Route::get('/blog/category', 'App\Http\Controllers\Admin\BlogCategoryController@index')->name('admin-cblog-index');
  Route::get('/blog/category/create', 'App\Http\Controllers\Admin\BlogCategoryController@create')->name('admin-cblog-create');
  Route::post('/blog/category/create', 'App\Http\Controllers\Admin\BlogCategoryController@store')->name('admin-cblog-store');
  Route::get('/blog/category/edit/{id}', 'App\Http\Controllers\Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
  Route::post('/blog/category/edit/{id}', 'App\Http\Controllers\Admin\BlogCategoryController@update')->name('admin-cblog-update');
  Route::get('/blog/category/delete/{id}', 'App\Http\Controllers\Admin\BlogCategoryController@destroy')->name('admin-cblog-delete');

  });

  //------------ ADMIN BLOG SECTION ENDS ------------


  //------------ ADMIN USER MESSAGE SECTION ------------

  // Route::group(['middleware'=>'permissions:messages'],function(){

  // Route::get('/messages/datatables/{type}', 'App\Http\Controllers\Admin\MessageController@datatables')->name('admin-message-datatables');
  // Route::get('/tickets', 'App\Http\Controllers\Admin\MessageController@index')->name('admin-message-index');
  // Route::get('/disputes', 'App\Http\Controllers\Admin\MessageController@disputes')->name('admin-message-dispute');
  // Route::get('/message/{id}', 'App\Http\Controllers\Admin\MessageController@message')->name('admin-message-show');
  // Route::get('/message/load/{id}', 'App\Http\Controllers\Admin\MessageController@messageshow')->name('admin-message-load');
  // Route::post('/message/post', 'App\Http\Controllers\Admin\MessageController@postmessage')->name('admin-message-store');
  // Route::get('/message/{id}/delete', 'App\Http\Controllers\Admin\MessageController@messagedelete')->name('admin-message-delete');
  // Route::post('/user/send/message', 'App\Http\Controllers\Admin\MessageController@usercontact')->name('admin-send-message');

  // });

  //------------ ADMIN USER MESSAGE SECTION ENDS ------------

  //------------ ADMIN GENERAL SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:general_settings'],function(){

  Route::get('/general-settings/logo', 'App\Http\Controllers\Admin\GeneralSettingController@logo')->name('admin-gs-logo');
  Route::get('/general-settings/favicon', 'App\Http\Controllers\Admin\GeneralSettingController@fav')->name('admin-gs-fav');
  Route::get('/general-settings/loader', 'App\Http\Controllers\Admin\GeneralSettingController@load')->name('admin-gs-load');
  Route::get('/general-settings/contents', 'App\Http\Controllers\Admin\GeneralSettingController@contents')->name('admin-gs-contents');
  Route::get('/general-settings/footer', 'App\Http\Controllers\Admin\GeneralSettingController@footer')->name('admin-gs-footer');
  Route::get('/general-settings/error-banner', 'App\Http\Controllers\Admin\GeneralSettingController@errorbanner')->name('admin-gs-error-banner');
  Route::get('/general-settings/popup', 'App\Http\Controllers\Admin\GeneralSettingController@popup')->name('admin-gs-popup');
  Route::get('/general-settings/maintenance', 'App\Http\Controllers\Admin\GeneralSettingController@maintain')->name('admin-gs-maintenance');
  //------------ ADMIN PICKUP LOACTION ------------

  Route::get('/pickup/datatables', 'App\Http\Controllers\Admin\PickupController@datatables')->name('admin-pick-datatables'); //JSON REQUEST
  Route::get('/pickup', 'App\Http\Controllers\Admin\PickupController@index')->name('admin-pick-index');
  Route::get('/pickup/create', 'App\Http\Controllers\Admin\PickupController@create')->name('admin-pick-create');
  Route::post('/pickup/create', 'App\Http\Controllers\Admin\PickupController@store')->name('admin-pick-store');
  Route::get('/pickup/edit/{id}', 'App\Http\Controllers\Admin\PickupController@edit')->name('admin-pick-edit');
  Route::post('/pickup/edit/{id}', 'App\Http\Controllers\Admin\PickupController@update')->name('admin-pick-update');
  Route::get('/pickup/delete/{id}', 'App\Http\Controllers\Admin\PickupController@destroy')->name('admin-pick-delete');

  //------------ ADMIN PICKUP LOACTION ENDS ------------

  //------------ ADMIN SHIPPING ------------

  Route::get('/shipping/datatables', 'App\Http\Controllers\Admin\ShippingController@datatables')->name('admin-shipping-datatables');
  Route::get('/shipping', 'App\Http\Controllers\Admin\ShippingController@index')->name('admin-shipping-index');
  Route::get('/shipping/create', 'App\Http\Controllers\Admin\ShippingController@create')->name('admin-shipping-create');
  Route::post('/shipping/create', 'App\Http\Controllers\Admin\ShippingController@store')->name('admin-shipping-store');
  Route::get('/shipping/edit/{id}', 'App\Http\Controllers\Admin\ShippingController@edit')->name('admin-shipping-edit');
  Route::post('/shipping/edit/{id}', 'App\Http\Controllers\Admin\ShippingController@update')->name('admin-shipping-update');
  Route::get('/shipping/delete/{id}', 'App\Http\Controllers\Admin\ShippingController@destroy')->name('admin-shipping-delete');

  //------------ ADMIN SHIPPING ENDS ------------

  });

  //------------ ADMIN GENERAL SETTINGS SECTION ENDS ------------


  //------------ ADMIN HOME PAGE SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:home_page_settings'],function(){

  //------------ ADMIN SLIDER SECTION ------------

  Route::get('/slider/datatables', 'App\Http\Controllers\Admin\SliderController@datatables')->name('admin-sl-datatables'); //JSON REQUEST
  Route::get('/slider', 'App\Http\Controllers\Admin\SliderController@index')->name('admin-sl-index');
  Route::get('/slider/create', 'App\Http\Controllers\Admin\SliderController@create')->name('admin-sl-create');
  Route::post('/slider/create', 'App\Http\Controllers\Admin\SliderController@store')->name('admin-sl-store');
  Route::get('/slider/edit/{id}', 'App\Http\Controllers\Admin\SliderController@edit')->name('admin-sl-edit');
  Route::post('/slider/edit/{id}', 'App\Http\Controllers\Admin\SliderController@update')->name('admin-sl-update');
  Route::get('/slider/delete/{id}', 'App\Http\Controllers\Admin\SliderController@destroy')->name('admin-sl-delete');

  //------------ ADMIN SLIDER SECTION ENDS ------------

 

  //------------ ADMIN BANNER SECTION ------------

  Route::get('/banner/datatables/{type}', 'App\Http\Controllers\Admin\BannerController@datatables')->name('admin-sb-datatables'); //JSON REQUEST
  Route::get('top/small/banner/', 'App\Http\Controllers\Admin\BannerController@index')->name('admin-sb-index');
  Route::get('large/banner/', 'App\Http\Controllers\Admin\BannerController@large')->name('admin-sb-large');
  Route::get('bottom/small/banner/', 'App\Http\Controllers\Admin\BannerController@bottom')->name('admin-sb-bottom');
  Route::get('top/small/banner/create', 'App\Http\Controllers\Admin\BannerController@create')->name('admin-sb-create');
  Route::get('large/banner/create', 'App\Http\Controllers\Admin\BannerController@largecreate')->name('admin-sb-create-large');
  Route::get('bottom/small/banner/create', 'App\Http\Controllers\Admin\BannerController@bottomcreate')->name('admin-sb-create-bottom');


  Route::post('/banner/create', 'App\Http\Controllers\Admin\BannerController@store')->name('admin-sb-store');
  Route::get('/banner/edit/{id}', 'App\Http\Controllers\Admin\BannerController@edit')->name('admin-sb-edit');
  Route::post('/banner/edit/{id}', 'App\Http\Controllers\Admin\BannerController@update')->name('admin-sb-update');
  Route::get('/banner/delete/{id}', 'App\Http\Controllers\Admin\BannerController@destroy')->name('admin-sb-delete');

  //------------ ADMIN BANNER SECTION ENDS ------------

 





  //------------ ADMIN PAGE SETTINGS SECTION ------------

  Route::get('/page-settings/customize', 'App\Http\Controllers\Admin\PageSettingController@customize')->name('admin-ps-customize');
  Route::get('/page-settings/big-save', 'App\Http\Controllers\Admin\PageSettingController@big_save')->name('admin-ps-big-save');
  Route::get('/page-settings/best-seller', 'App\Http\Controllers\Admin\PageSettingController@best_seller')->name('admin-ps-best-seller');


  });





  //------------ ADMIN EMAIL SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:emails_settings'],function(){

  Route::get('/email-templates/datatables', 'App\Http\Controllers\Admin\EmailController@datatables')->name('admin-mail-datatables');
  Route::get('/email-templates', 'App\Http\Controllers\Admin\EmailController@index')->name('admin-mail-index');
  Route::get('/email-templates/{id}', 'App\Http\Controllers\Admin\EmailController@edit')->name('admin-mail-edit');
  Route::post('/email-templates/{id}', 'App\Http\Controllers\Admin\EmailController@update')->name('admin-mail-update');
  Route::get('/email-config', 'App\Http\Controllers\Admin\EmailController@config')->name('admin-mail-config');
  Route::get('/groupemail', 'App\Http\Controllers\Admin\EmailController@groupemail')->name('admin-group-show');
  Route::post('/groupemailpost', 'App\Http\Controllers\Admin\EmailController@groupemailpost')->name('admin-group-submit');
  Route::get('/issmtp/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');

});

  //------------ ADMIN EMAIL SETTINGS SECTION ENDS ------------



  //------------ ADMIN PAYMENT SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:payment_settings'],function(){

// Payment Informations

  Route::get('/payment-informations', 'App\Http\Controllers\Admin\GeneralSettingController@paymentsinfo')->name('admin-gs-payments');

  Route::get('/general-settings/guest/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@guest')->name('admin-gs-guest');
  Route::get('/general-settings/paypal/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@paypal')->name('admin-gs-paypal');
  Route::get('/general-settings/instamojo/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@instamojo')->name('admin-gs-instamojo');
  Route::get('/general-settings/paystack/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@paystack')->name('admin-gs-paystack');
  Route::get('/general-settings/stripe/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@stripe')->name('admin-gs-stripe');
  Route::get('/general-settings/cod/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@cod')->name('admin-gs-cod');
  Route::get('/general-settings/paytm/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@paytm')->name('admin-gs-paytm');
  Route::get('/general-settings/molly/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@molly')->name('admin-gs-molly');
  Route::get('/general-settings/razor/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@razor')->name('admin-gs-razor');
// Payment Gateways

  Route::get('/paymentgateway/datatables', 'App\Http\Controllers\Admin\PaymentGatewayController@datatables')->name('admin-payment-datatables'); //JSON REQUEST
  Route::get('/paymentgateway', 'App\Http\Controllers\Admin\PaymentGatewayController@index')->name('admin-payment-index');
  Route::get('/paymentgateway/create', 'App\Http\Controllers\Admin\PaymentGatewayController@create')->name('admin-payment-create');
  Route::post('/paymentgateway/create', 'App\Http\Controllers\Admin\PaymentGatewayController@store')->name('admin-payment-store');
  Route::get('/paymentgateway/edit/{id}', 'App\Http\Controllers\Admin\PaymentGatewayController@edit')->name('admin-payment-edit');
  Route::post('/paymentgateway/update/{id}', 'App\Http\Controllers\Admin\PaymentGatewayController@update')->name('admin-payment-update');
  Route::get('/paymentgateway/delete/{id}', 'App\Http\Controllers\Admin\PaymentGatewayController@destroy')->name('admin-payment-delete');
  Route::get('/paymentgateway/status/{id1}/{id2}', 'App\Http\Controllers\Admin\PaymentGatewayController@status')->name('admin-payment-status');

// Currency Settings


  // MULTIPLE CURRENCY

  Route::get('/general-settings/currency/{status}', 'App\Http\Controllers\Admin\GeneralSettingController@currency')->name('admin-gs-iscurrency');
  Route::get('/currency/datatables', 'App\Http\Controllers\Admin\CurrencyController@datatables')->name('admin-currency-datatables'); //JSON REQUEST
  Route::get('/currency', 'App\Http\Controllers\Admin\CurrencyController@index')->name('admin-currency-index');
  Route::get('/currency/create', 'App\Http\Controllers\Admin\CurrencyController@create')->name('admin-currency-create');
  Route::post('/currency/create', 'App\Http\Controllers\Admin\CurrencyController@store')->name('admin-currency-store');
  Route::get('/currency/edit/{id}', 'App\Http\Controllers\Admin\CurrencyController@edit')->name('admin-currency-edit');
  Route::post('/currency/update/{id}', 'App\Http\Controllers\Admin\CurrencyController@update')->name('admin-currency-update');
  Route::get('/currency/delete/{id}', 'App\Http\Controllers\Admin\CurrencyController@destroy')->name('admin-currency-delete');
  Route::get('/currency/status/{id1}/{id2}', 'App\Http\Controllers\Admin\CurrencyController@status')->name('admin-currency-status');

});

  //------------ ADMIN PAYMENT SETTINGS SECTION ENDS------------




  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  Route::group(['middleware'=>'permissions:seo_tools'],function(){

  Route::get('/seotools/analytics', 'App\Http\Controllers\Admin\SeoToolController@analytics')->name('admin-seotool-analytics');
  Route::post('/seotools/analytics/update', 'App\Http\Controllers\Admin\SeoToolController@analyticsupdate')->name('admin-seotool-analytics-update');
  Route::get('/seotools/keywords', 'App\Http\Controllers\Admin\SeoToolController@keywords')->name('admin-seotool-keywords');
  Route::post('/seotools/keywords/update', 'App\Http\Controllers\Admin\SeoToolController@keywordsupdate')->name('admin-seotool-keywords-update');
  Route::get('/products/popular/{id}','App\Http\Controllers\Admin\SeoToolController@popular')->name('admin-prod-popular');

  });

  //------------ ADMIN SEOTOOL SETTINGS SECTION ------------

  //------------ ADMIN STAFF SECTION ------------

  Route::group(['middleware'=>'permissions:manage_staffs'],function(){

  Route::get('/staff/datatables', 'App\Http\Controllers\Admin\StaffController@datatables')->name('admin-staff-datatables');
  Route::get('/staff', 'App\Http\Controllers\Admin\StaffController@index')->name('admin-staff-index');
  Route::get('/staff/create', 'App\Http\Controllers\Admin\StaffController@create')->name('admin-staff-create');
  Route::post('/staff/create', 'App\Http\Controllers\Admin\StaffController@store')->name('admin-staff-store');
  Route::get('/staff/edit/{id}', 'App\Http\Controllers\Admin\StaffController@edit')->name('admin-staff-edit');
  Route::post('/staff/update/{id}', 'App\Http\Controllers\Admin\StaffController@update')->name('admin-staff-update');
  Route::get('/staff/show/{id}', 'App\Http\Controllers\Admin\StaffController@show')->name('admin-staff-show');
  Route::get('/staff/delete/{id}', 'App\Http\Controllers\Admin\StaffController@destroy')->name('admin-staff-delete');

  });

  //------------ ADMIN STAFF SECTION ENDS------------

  

// ------------ GLOBAL ----------------------
  Route::post('/general-settings/update/all', 'App\Http\Controllers\Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');
  Route::post('/general-settings/update/payment', 'App\Http\Controllers\Admin\GeneralSettingController@generalupdatepayment')->name('admin-gs-update-payment');

  // STATUS SECTION
  Route::get('/products/status/{id1}/{id2}', 'App\Http\Controllers\Admin\ProductController@status')->name('admin-prod-status');
  // STATUS SECTION ENDS

  // FEATURE SECTION
  Route::get('/products/feature/{id}', 'App\Http\Controllers\Admin\ProductController@feature')->name('admin-prod-feature');
  Route::post('/products/feature/{id}', 'App\Http\Controllers\Admin\ProductController@featuresubmit')->name('admin-prod-feature');
  // FEATURE SECTION ENDS

  // GALLERY SECTION ------------

  Route::get('/gallery/show', 'App\Http\Controllers\Admin\GalleryController@show')->name('admin-gallery-show');
  Route::post('/gallery/store', 'App\Http\Controllers\Admin\GalleryController@store')->name('admin-gallery-store');
  Route::get('/gallery/delete', 'App\Http\Controllers\Admin\GalleryController@destroy')->name('admin-gallery-delete');

  // GALLERY SECTION ENDS------------

  Route::post('/page-settings/update/all', 'App\Http\Controllers\Admin\PageSettingController@update')->name('admin-ps-update');
  Route::post('/page-settings/update/home', 'App\Http\Controllers\Admin\PageSettingController@homeupdate')->name('admin-ps-homeupdate');

// ------------ GLOBAL ENDS ----------------------

Route::group(['middleware'=>'permissions:super'],function(){



  Route::get('/cache/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->route('admin.dashboard')->with('cache','System Cache Has Been Removed.');
  })->name('admin-cache-clear');

 

  // ------------ ROLE SECTION ----------------------

  Route::get('/role/datatables', 'App\Http\Controllers\Admin\RoleController@datatables')->name('admin-role-datatables');
  Route::get('/role', 'App\Http\Controllers\Admin\RoleController@index')->name('admin-role-index');
  Route::get('/role/create', 'App\Http\Controllers\Admin\RoleController@create')->name('admin-role-create');
  Route::post('/role/create', 'App\Http\Controllers\Admin\RoleController@store')->name('admin-role-store');
  Route::get('/role/edit/{id}', 'App\Http\Controllers\Admin\RoleController@edit')->name('admin-role-edit');
  Route::post('/role/edit/{id}', 'App\Http\Controllers\Admin\RoleController@update')->name('admin-role-update');
  Route::get('/role/delete/{id}', 'App\Http\Controllers\Admin\RoleController@destroy')->name('admin-role-delete');

  // ------------ ROLE SECTION ENDS ----------------------


  });


});


// ************************************ ADMIN SECTION ENDS**********************************************

    
// ************************************ VENDOR SECTION **********************************************


Route::prefix('vendor')->group(function() {


  Route::group(['middleware'=>'vendor'],function(){
  // Vendor Dashboard
  Route::get('/dashboard', 'App\Http\Controllers\Vendor\VendorController@index')->name('vendor-dashboard');





  //------------ ADMIN ORDER SECTION ------------
  Route::get('/orders', 'App\Http\Controllers\Vendor\OrderController@index')->name('vendor-order-index');
  Route::get('/order/{id}/show', 'App\Http\Controllers\Vendor\OrderController@show')->name('vendor-order-show');
  Route::get('/order/{id}/invoice', 'App\Http\Controllers\Vendor\OrderController@invoice')->name('vendor-order-invoice');
  Route::get('/order/{id}/print', 'App\Http\Controllers\Vendor\OrderController@printpage')->name('vendor-order-print');
  Route::get('/order/{id1}/status/{status}', 'App\Http\Controllers\Vendor\OrderController@status')->name('vendor-order-status');
  Route::post('/order/email/', 'App\Http\Controllers\Vendor\OrderController@emailsub')->name('vendor-order-emailsub');
  Route::post('/order/{slug}/license', 'App\Http\Controllers\Vendor\OrderController@license')->name('vendor-order-license');

  //------------ ADMIN CATEGORY SECTION ENDS------------


  //------------ VENDOR SUBCATEGORY SECTION ------------

  Route::get('/load/subcategories/{id}/', 'App\Http\Controllers\Vendor\VendorController@subcatload')->name('vendor-subcat-load'); //JSON REQUEST

  //------------ VENDOR SUBCATEGORY SECTION ENDS------------

  //------------ VENDOR CHILDCATEGORY SECTION ------------

  Route::get('/load/childcategories/{id}/', 'App\Http\Controllers\Vendor\VendorController@childcatload')->name('vendor-childcat-load'); //JSON REQUEST

  //------------ VENDOR CHILDCATEGORY SECTION ENDS------------

  //------------ VENDOR PRODUCT SECTION ------------

  Route::get('/products/datatables', 'App\Http\Controllers\Vendor\ProductController@datatables')->name('vendor-prod-datatables'); //JSON REQUEST
  Route::get('/products', 'App\Http\Controllers\Vendor\ProductController@index')->name('vendor-prod-index');

  Route::post('/products/upload/update/{id}', 'App\Http\Controllers\Vendor\ProductController@uploadUpdate')->name('vendor-prod-upload-update');

  // CREATE SECTION
  Route::get('/products/types', 'App\Http\Controllers\Vendor\ProductController@types')->name('vendor-prod-types');
  Route::get('/products/physical/create', 'App\Http\Controllers\Vendor\ProductController@createPhysical')->name('vendor-prod-physical-create');
  Route::get('/products/digital/create', 'App\Http\Controllers\Vendor\ProductController@createDigital')->name('vendor-prod-digital-create');
  Route::get('/products/license/create', 'App\Http\Controllers\Vendor\ProductController@createLicense')->name('vendor-prod-license-create');
  Route::post('/products/store', 'App\Http\Controllers\Vendor\ProductController@store')->name('vendor-prod-store');
  Route::get('/getattributes', 'App\Http\Controllers\Vendor\ProductController@getAttributes')->name('vendor-prod-getattributes');

  Route::get('/products/catalog/datatables', 'App\Http\Controllers\Vendor\ProductController@catalogdatatables')->name('admin-vendor-catalog-datatables');
  Route::get('/products/catalogs', 'App\Http\Controllers\Vendor\ProductController@catalogs')->name('admin-vendor-catalog-index');

  // CREATE SECTION

  // EDIT SECTION
  Route::get('/products/edit/{id}', 'App\Http\Controllers\Vendor\ProductController@edit')->name('vendor-prod-edit');
  Route::post('/products/edit/{id}', 'App\Http\Controllers\Vendor\ProductController@update')->name('vendor-prod-update');

  Route::get('/products/catalog/{id}', 'App\Http\Controllers\Vendor\ProductController@catalogedit')->name('vendor-prod-catalog-edit');
  Route::post('/products/catalog/{id}', 'App\Http\Controllers\Vendor\ProductController@catalogupdate')->name('vendor-prod-catalog-update');

  // EDIT SECTION ENDS

  // STATUS SECTION
  Route::get('/products/status/{id1}/{id2}', 'App\Http\Controllers\Vendor\ProductController@status')->name('vendor-prod-status');
  // STATUS SECTION ENDS

  // DELETE SECTION
  Route::get('/products/delete/{id}', 'App\Http\Controllers\Vendor\ProductController@destroy')->name('vendor-prod-delete');
  // DELETE SECTION ENDS

  //------------ VENDOR PRODUCT SECTION ENDS------------

  //------------ VENDOR GALLERY SECTION ------------

  Route::get('/gallery/show', 'App\Http\Controllers\Vendor\GalleryController@show')->name('vendor-gallery-show');
  Route::post('/gallery/store', 'App\Http\Controllers\Vendor\GalleryController@store')->name('vendor-gallery-store');
  Route::get('/gallery/delete', 'App\Http\Controllers\Vendor\GalleryController@destroy')->name('vendor-gallery-delete');

  //------------ VENDOR GALLERY SECTION ENDS------------

  //------------ ADMIN SHIPPING ------------

Route::get('/shipping/datatables', 'App\Http\Controllers\Vendor\ShippingController@datatables')->name('vendor-shipping-datatables');
Route::get('/shipping', 'App\Http\Controllers\Vendor\ShippingController@index')->name('vendor-shipping-index');
Route::get('/shipping/create', 'App\Http\Controllers\Vendor\ShippingController@create')->name('vendor-shipping-create');
Route::post('/shipping/create', 'App\Http\Controllers\Vendor\ShippingController@store')->name('vendor-shipping-store');
Route::get('/shipping/edit/{id}', 'App\Http\Controllers\Vendor\ShippingController@edit')->name('vendor-shipping-edit');
Route::post('/shipping/edit/{id}', 'App\Http\Controllers\Vendor\ShippingController@update')->name('vendor-shipping-update');
Route::get('/shipping/delete/{id}', 'App\Http\Controllers\Vendor\ShippingController@destroy')->name('vendor-shipping-delete');

  //------------ ADMIN SHIPPING ENDS ------------


  //------------ VENDOR NOTIFICATION SECTION ------------

  // Order Notification
  Route::get('/order/notf/show/{id}', 'App\Http\Controllers\Vendor\NotificationController@order_notf_show')->name('vendor-order-notf-show');
  Route::get('/order/notf/count/{id}','App\Http\Controllers\Vendor\NotificationController@order_notf_count')->name('vendor-order-notf-count');
  Route::get('/order/notf/clear/{id}','App\Http\Controllers\Vendor\NotificationController@order_notf_clear')->name('vendor-order-notf-clear');
  // Order Notification Ends

  // Product Notification Ends

  //------------ VENDOR NOTIFICATION SECTION ENDS ------------

  // Vendor Settings
  Route::get('/Settings', 'App\Http\Controllers\Vendor\VendorController@profile')->name('vendor-profile');
  Route::post('/Settings', 'App\Http\Controllers\Vendor\VendorController@profileupdate')->name('vendor-profile-update');
  // Vendor Settings Ends

  // Vendor Shipping Cost
  Route::get('/shipping-cost', 'App\Http\Controllers\Vendor\VendorController@ship')->name('vendor-shop-ship');


  Route::get('/withdraw/datatables', 'App\Http\Controllers\Vendor\WithdrawController@datatables')->name('vendor-wt-datatables');
  Route::get('/withdraw', 'App\Http\Controllers\Vendor\WithdrawController@index')->name('vendor-wt-index');
  Route::get('/withdraw/create', 'App\Http\Controllers\Vendor\WithdrawController@create')->name('vendor-wt-create');
  Route::post('/withdraw/create', 'App\Http\Controllers\Vendor\WithdrawController@store')->name('vendor-wt-store');

 

  });

});


// ************************************ VENDOR SECTION ENDS**********************************************
