<?php

use Illuminate\Http\Request;

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

Route::get('/test', function (Request $request) {
    $arr = ["status" => 200, "data" => ["message" => "test message"]];
    return response()->json($arr);
});

Route::get('/test2', function (Request $request) {
    $arr = ["status" => 200, "data" => ["message" => "test message2"]];
    return response()->json($arr);
});

Route::get('/testmail', function (Request $request) {
    $to_name = 'Mahmoud Fathy';
    $to_email = 'mahmoud.fathy0100@gmail.com';
    $data = array('name'=>"test", "body" => "Test mail");
        
    \Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
                ->subject('Artisans Web Testing Mail');
        $message->from('mfmha011@gmail.com','Artisans Web');
    });
    
    return "success";
});

//users


Route::any('users/sendsms', 'AuthController@sendSms');

Route::group(['namespace' => 'Api'], function() {
            

    Route::post('login', 'UserApiController@authenticate');
    Route::post('activate', 'UserApiController@activationCode');
    Route::get('client', 'UserApiController@getAuthenticatedUser');

    Route::group(['middleware' => 'UserAuth'], function() {

            Route::any('checkout', 'OrderApiController@checkout');
            Route::get('orders', 'OrderApiController@orders');
            Route::get('order/{id}', 'OrderApiController@singleOrder');
            Route::post('checkcart', 'CartController@checkCart');

            Route::get('userInfo', 'UserApiController@getUserInfo');
            Route::post('editProfile', 'UserApiController@editProfile');
            Route::get('addresses', 'UserApiController@addresses');
            Route::get('checkaddress', 'UserApiController@checkBranch');
            Route::post('addAddress', 'UserApiController@addAdress');
            Route::post('editAddress/{id}', 'UserApiController@editAddress');
            Route::get('deleteAddress/{id}', 'UserApiController@deleteAddress');
            Route::post('addFavouriteAdress', 'UserApiController@addFavouriteAdress');
            Route::get('FavouriteAdress', 'UserApiController@FavouriteAdress');
            Route::get('notifictions/{id}', 'UserApiController@notifictions');
            
            //Route::post('contact', 'ContactApiController@contact');
            
            

    });
    
    

    //Home Page
    Route::any('/cities/branches', 'HomeController@getCititesWithBranches');
    Route::any('/city/{id}/branches', 'HomeController@getCityBranches');
    Route::any('/categories/sub_categories', 'HomeController@getCategoriesWithSubcategories');
    Route::any('/category/{id}/sub_categories', 'HomeController@getCategorySubcategories');
    Route::any('/newproducts', 'HomeController@getNewProducts');
    Route::any('/offersslider', 'HomeController@getOffersSlider');
    Route::any('/ouroffers', 'HomeController@getOurOffers');

    // Product
    Route::any('/allproducts', 'ProductsController@getAllProducts');
    Route::any('/searchproducts', 'ProductsController@searchProducts');
    Route::any('/filterproducts', 'ProductsController@filter');
    Route::post('/comment', 'ProductsController@comment');
    Route::any('/productdetails', 'ProductsController@getProductDetails');
    Route::any('/relatedproducts', 'ProductsController@getRelatedProducts');

    Route::any('/products', 'HomeController@getLatestProducts');

    Route::any('/coupon/{code}', 'CouponController@getData');


    // Offers
    Route::any('/offers', 'OffersController@getAllOffers');
    Route::any('/offerdetails', 'OffersController@getOfferProducts');
    Route::any('/offersfilterbysingleormulti', 'OffersController@filterOffersBySingleOrMulti');
    
    
    Route::any('/about', 'BranchSettingsApiController@about');
    Route::get('contact', 'BranchSettingsApiController@contact');
    Route::get('privacy', 'BranchSettingsApiController@privacy');
    
    
    

});
