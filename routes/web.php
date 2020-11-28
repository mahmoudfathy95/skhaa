<?php

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

/*

// Link public to storage

Route::get('/storagelink', function(){
    //dd(55);
    \Artisan::call('storage:link');
});

*/

//Route::get('proq', ['uses' => 'ProductsController@proq']);



Route::get('login', ['uses' => 'MainLoginController@showLoginPage'])->name('login');
Route::get('dologin', ['as' => 'do.login', 'uses' => 'MainLoginController@doLogin']);
Route::get('backend/logout', ['as' => 'do.logout', 'uses' => 'MainLoginController@doLogout']);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/backend', function () {
        return view('dashboard');
    });

    // any route here will only be accessible for logged in users
    
    
    // Start Users Module

    Route::get('backend/users', ['as' => 'show.users', 'uses' => 'usersController@show']);
    Route::post('getusers', ['as' => 'get.users', 'uses' => 'usersController@index']);
    
    Route::get('users/edit/{id}', ['as' => 'edit.users', 'uses' => 'usersController@edit']);
    Route::get('users/editAdmin', ['as' => 'edit.usersAdmin', 'uses' => 'usersController@editAdmin']);
    Route::get('users/editUser', ['as' => 'edit.usersUser', 'uses' => 'usersController@editUser']);
     Route::get('users/showUser', ['as' => 'show.usersUser', 'uses' => 'usersController@showUser']);
    Route::post('users/updateAdmin', ['as' => 'update.usersAdmin', 'uses' => 'usersController@updateAdmin']);
    Route::post('users/updateUser', ['as' => 'update.usersUser', 'uses' => 'usersController@updateUser']);
    
    Route::post('users/update', ['as' => 'update.users', 'uses' => 'usersController@update']);
    Route::get('users/create', ['as' => 'create.users', 'uses' => 'usersController@create']);
    Route::post('users/store', ['as' => 'store.users', 'uses' => 'usersController@store']);
    Route::get('users/delete/{id}', ['as' => 'delete.users', 'uses' => 'usersController@delete']);
    
    // End Users Module
    

    // Start Product Module

    Route::get('backend/products', ['as' => 'show.products', 'uses' => 'ProductsController@show']);
    Route::post('getproducts', ['as' => 'get.products', 'uses' => 'ProductsController@index']);
    Route::get('products/edit/{id}', ['as' => 'edit.product', 'uses' => 'ProductsController@edit']);
    Route::get('products/delete/{id}', ['as' => 'delete.product', 'uses' => 'ProductsController@delete']);
    Route::post('products/update', ['as' => 'update.product', 'uses' => 'ProductsController@update']);
    Route::get('products/create', ['as' => 'create.product', 'uses' => 'ProductsController@create']);
    Route::post('products/store', ['as' => 'store.product', 'uses' => 'ProductsController@store']);

    // End Product Module

    // Start Category Module

    Route::get('backend/categories', ['as' => 'show.categories', 'uses' => 'CategoriesController@show']);
    Route::post('getcategories', ['as' => 'get.categories', 'uses' => 'CategoriesController@index']);
    Route::get('categories/edit/{id}', ['as' => 'edit.category', 'uses' => 'CategoriesController@edit']);
    Route::get('categories/delete/{id}', ['as' => 'delete.category', 'uses' => 'CategoriesController@delete']);
    Route::post('categories/update', ['as' => 'update.category', 'uses' => 'CategoriesController@update']);
    Route::get('categories/create', ['as' => 'create.category', 'uses' => 'CategoriesController@create']);
    Route::post('categories/store', ['as' => 'store.category', 'uses' => 'CategoriesController@store']);

    // Start Category Module

    // Start Sub Category Module

    Route::get('backend/subcategories', ['as' => 'show.subcategories', 'uses' => 'SubCategoriesController@show']);
    Route::post('getsubcategories', ['as' => 'get.subcategories', 'uses' => 'SubCategoriesController@index']);
    Route::get('subcategories/edit/{id}', ['as' => 'edit.subcategory', 'uses' => 'SubCategoriesController@edit']);
    Route::get('subcategories/delete/{id}', ['as' => 'delete.subcategory', 'uses' => 'SubCategoriesController@delete']);
    Route::post('subcategories/update', ['as' => 'update.subcategory', 'uses' => 'SubCategoriesController@update']);
    Route::get('subcategories/create', ['as' => 'create.subcategory', 'uses' => 'SubCategoriesController@create']);
    Route::post('subcategories/store', ['as' => 'store.subcategory', 'uses' => 'SubCategoriesController@store']);

    // Start Sub Category Module

    // Start Cities Module

    Route::get('backend/cities', ['as' => 'show.cities', 'uses' => 'CitiesController@show']);
    Route::post('getcities', ['as' => 'get.cities', 'uses' => 'CitiesController@index']);
    Route::get('cities/edit/{id}', ['as' => 'edit.city', 'uses' => 'CitiesController@edit']);
    Route::get('cities/delete/{id}', ['as' => 'delete.city', 'uses' => 'CitiesController@delete']);
    Route::post('cities/update', ['as' => 'update.city', 'uses' => 'CitiesController@update']);
    Route::get('cities/create', ['as' => 'create.city', 'uses' => 'CitiesController@create']);
    Route::post('cities/store', ['as' => 'store.city', 'uses' => 'CitiesController@store']);

    // Start Cities Module

    // Start Branches Module

    Route::get('backend/branches', ['as' => 'show.branches', 'uses' => 'BranchesController@show']);
    Route::post('getbranches', ['as' => 'get.branches', 'uses' => 'BranchesController@index']);
    Route::get('branches/edit/{id}', ['as' => 'edit.branch', 'uses' => 'BranchesController@edit']);
    Route::get('branches/delete/{id}', ['as' => 'delete.branch', 'uses' => 'BranchesController@delete']);
    Route::post('branches/update', ['as' => 'update.branch', 'uses' => 'BranchesController@update']);
    Route::get('branches/create', ['as' => 'create.branch', 'uses' => 'BranchesController@create']);
    Route::post('branches/store', ['as' => 'store.branch', 'uses' => 'BranchesController@store']);

    // Start Branches Module

    // Start Offers Module

    Route::get('backend/offers', ['as' => 'show.offers', 'uses' => 'OffersController@show']);
    Route::post('getoffers', ['as' => 'get.offers', 'uses' => 'OffersController@index']);
    Route::get('offers/edit/{id}', ['as' => 'edit.offer', 'uses' => 'OffersController@edit']);
    Route::get('offers/delete/{id}', ['as' => 'delete.offer', 'uses' => 'OffersController@delete']);
    Route::get('getBranchProducts', ['as' => 'branchProducts.offer', 'uses' => 'OffersController@BranchProducts']);
    Route::post('offers/update', ['as' => 'update.offer', 'uses' => 'OffersController@update']);
    Route::get('offers/create', ['as' => 'create.offer', 'uses' => 'OffersController@create']);
    Route::post('offers/store', ['as' => 'store.offer', 'uses' => 'OffersController@store']);


    // End Offers Module

    // Start MyOffers Module

    Route::get('backend/myoffers', ['as' => 'show.myoffers', 'uses' => 'myoffersController@show']);
    Route::post('getmyoffers', ['as' => 'get.myoffers', 'uses' => 'myoffersController@index']);
    Route::get('myoffers/edit/{id}', ['as' => 'edit.myoffers', 'uses' => 'myoffersController@edit']);
    Route::get('myoffers/delete/{id}', ['as' => 'delete.myoffers', 'uses' => 'myoffersController@delete']);
    Route::post('myoffers/update', ['as' => 'update.myoffers', 'uses' => 'myoffersController@update']);
    Route::get('myoffers/create', ['as' => 'create.myoffers', 'uses' => 'myoffersController@create']);
    Route::post('myoffers/store', ['as' => 'store.myoffers', 'uses' => 'myoffersController@store']);

    // End MyOffers Module

    // Start Our Offers Module

    Route::get('backend/ouroffers', ['as' => 'show.ouroffers', 'uses' => 'OurOffersController@show']);
    Route::post('getouroffers', ['as' => 'get.ouroffers', 'uses' => 'OurOffersController@index']);
    Route::get('ouroffers/edit/{id}', ['as' => 'edit.ouroffers', 'uses' => 'OurOffersController@edit']);
    Route::get('ouroffers/delete/{id}', ['as' => 'delete.ouroffers', 'uses' => 'OurOffersController@delete']);
    Route::get('getBranchProducts', ['as' => 'branchProducts.ouroffers', 'uses' => 'OurOffersController@BranchProducts']);
    Route::post('ouroffers/update', ['as' => 'update.ouroffers', 'uses' => 'OurOffersController@update']);
    Route::get('ouroffers/create', ['as' => 'create.ouroffers', 'uses' => 'OurOffersController@create']);
    Route::post('ouroffers/store', ['as' => 'store.ouroffers', 'uses' => 'OurOffersController@store']);


    // End Our Offers Module

    // Start Offers Slider Module

    Route::get('offersslider/edit/{id}', ['as' => 'edit.offersslider', 'uses' => 'OffersSliderController@edit']);

    Route::get('backend/offersslider', ['as' => 'show.offersslider', 'uses' => 'OffersSliderController@show']);
    Route::post('getoffersslider', ['as' => 'get.offersslider', 'uses' => 'OffersSliderController@index']);
    Route::get('offersslider/edit', ['as' => 'edit.offersslider', 'uses' => 'OffersSliderController@edit']);
    Route::get('offersslider/delete/{id}', ['as' => 'delete.offersslider', 'uses' => 'OffersSliderController@delete']);
    Route::post('offersslider/update', ['as' => 'update.offersslider', 'uses' => 'OffersSliderController@update']);
    Route::get('offersslider/create', ['as' => 'create.offersslider', 'uses' => 'OffersSliderController@create']);
    Route::post('offersslider/store', ['as' => 'store.offersslider', 'uses' => 'OffersSliderController@store']);

    // End Offers Slider Module

    // Start New Products Module

    Route::get('backend/newproducts', ['as' => 'show.newproducts', 'uses' => 'NewProductsController@show']);
    Route::post('getnewproducts', ['as' => 'get.newproducts', 'uses' => 'NewProductsController@index']);
    Route::get('newproducts/edit', ['as' => 'edit.newproducts', 'uses' => 'NewProductsController@edit']);
    Route::get('newproducts/delete/{id}', ['as' => 'delete.newproducts', 'uses' => 'NewProductsController@delete']);
    Route::post('newproducts/update', ['as' => 'update.newproducts', 'uses' => 'NewProductsController@update']);
    Route::get('newproducts/create', ['as' => 'create.newproducts', 'uses' => 'NewProductsController@create']);
    Route::post('newproducts/store', ['as' => 'store.newproducts', 'uses' => 'NewProductsController@store']);

    // End New Products Module

    // Start Units Module

    Route::get('backend/units', ['as' => 'show.units', 'uses' => 'UnitsController@show']);
    Route::post('getunits', ['as' => 'get.units', 'uses' => 'UnitsController@index']);
    Route::get('units/edit/{id}', ['as' => 'edit.units', 'uses' => 'UnitsController@edit']);
    Route::get('units/delete/{id}', ['as' => 'delete.units', 'uses' => 'UnitsController@delete']);
    Route::post('units/update', ['as' => 'update.units', 'uses' => 'UnitsController@update']);
    Route::get('units/create', ['as' => 'create.units', 'uses' => 'UnitsController@create']);
    Route::post('units/store', ['as' => 'store.units', 'uses' => 'UnitsController@store']);

    // End Units Module

    // Start Coupons Module

    Route::get('backend/coupons', ['as' => 'show.coupons', 'uses' => 'CouponsController@show']);
    Route::post('getcoupons', ['as' => 'get.coupons', 'uses' => 'CouponsController@index']);
    Route::get('coupons/edit/{id}', ['as' => 'edit.coupons', 'uses' => 'CouponsController@edit']);
    Route::get('coupons/delete/{id}', ['as' => 'delete.coupons', 'uses' => 'CouponsController@delete']);
    Route::post('coupons/update', ['as' => 'update.coupons', 'uses' => 'CouponsController@update']);
    Route::get('coupons/create', ['as' => 'create.coupons', 'uses' => 'CouponsController@create']);
    Route::post('coupons/store', ['as' => 'store.coupons', 'uses' => 'CouponsController@store']);

    // End Coupons Module

    // Start Coupons Module

    Route::get('backend/orders', ['as' => 'show.orders', 'uses' => 'OrderController@show']);
    Route::post('getorders', ['as' => 'get.orders', 'uses' => 'OrderController@index']);
    Route::get('orders/edit/{id}', ['as' => 'edit.orders', 'uses' => 'OrderController@edit']);
    Route::get('orders/delete/{id}', ['as' => 'delete.orders', 'uses' => 'OrderController@delete']);
    Route::post('orders/update', ['as' => 'update.orders', 'uses' => 'OrderController@updateOrderStatus']);
    Route::get('orders/create', ['as' => 'create.orders', 'uses' => 'OrderController@create']);
    Route::post('orders/store', ['as' => 'store.orders', 'uses' => 'OrderController@store']);

    // End Coupons Module

    // Start Clients Module

    Route::get('backend/clients', ['as' => 'show.clients', 'uses' => 'clientsController@show']);
    Route::post('getclients', ['as' => 'get.clients', 'uses' => 'clientsController@index']);
    Route::get('clients/show/{id}', ['as' => 'show.clients', 'uses' => 'clientsController@clientDetails']);
    
    // End Clients Module


    // Start Comments Module

    Route::get('backend/comments', ['as' => 'show.comments', 'uses' => 'CommentsController@show']);
    Route::post('getcomments', ['as' => 'get.comments', 'uses' => 'CommentsController@index']);
    Route::get('comments/edit/{id}', ['as' => 'edit.comments', 'uses' => 'CommentsController@edit']);
    Route::post('comments/update', ['as' => 'update.comments', 'uses' => 'CommentsController@update']);
    Route::get('comments/create', ['as' => 'create.comments', 'uses' => 'CommentsController@create']);
    Route::post('comments/store', ['as' => 'store.comments', 'uses' => 'CommentsController@store']);
    Route::get('comments/delete/{id}', ['as' => 'delete.comments', 'uses' => 'CommentsController@delete']);

    // End Comments Module
    
    
    // About & Privacy Module
    
    
        Route::get('backend/about', ['as' => 'edit.about', 'uses' => 'BranchSettingsController@aboutEdit']);
        Route::post('about/update', ['as' => 'update.about', 'uses' => 'BranchSettingsController@aboutUpdate']);
        
        Route::get('backend/privacy', ['as' => 'edit.privacy', 'uses' => 'BranchSettingsController@privacyEdit']);
        Route::post('privacy/update', ['as' => 'update.privacy', 'uses' => 'BranchSettingsController@privacyUpdate']);
        
        Route::get('backend/contacts', ['as' => 'show.comments', 'uses' => 'ContactController@show']);
        Route::post('getcontacts', ['as' => 'get.contacts', 'uses' => 'ContactController@index']);
        Route::get('contact/edit/{id}', ['as' => 'edit.contact', 'uses' => 'BranchSettingsController@contactEdit']);
        Route::post('contact/update', ['as' => 'update.contact', 'uses' => 'BranchSettingsController@contactUpdate']);
        Route::get('contact/create', ['as' => 'create.contact', 'uses' => 'BranchSettingsController@createContact']);
        Route::post('contact/store', ['as' => 'store.contact', 'uses' => 'BranchSettingsController@contactStore']);
        Route::get('contact/delete/{id}', ['as' => 'delete.contact', 'uses' => 'ContactController@delete']);
    
    
    // End About & Privacy Module


});






Route::post('/ajax_upload/action', 'ProductsController@upload_main')->name('ajaxupload.action');
//Route::post('/ajax_upload/action', 'Helpers\AjaxController@upload_main')->name('ajaxupload.action');


Route::get('getimages', ['as' => 'images.product', 'uses' => 'ProductsController@images']);

Route::post('products/uploadmultipleimages', ['as' => 'uploadmultipleimages.product', 'uses' => 'ProductsController@uploadmultipleimages']);

Route::post('offersslider/uploadmultipleimages', ['as' => 'uploadmultipleimages.offersslider', 'uses' => 'OffersSliderController@uploadmultipleimages']);






