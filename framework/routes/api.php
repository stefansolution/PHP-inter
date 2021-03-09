<?php

use Illuminate\Http\Request;

Route::group([

    'middleware' => 'api'  
    // 'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logouttest');
    Route::get('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::post('registration', 'AuthController@registration');
    
    Route::post('password/create', 'PasswordResetController@create');
    Route::get('password/find/{token}', 'PasswordResetController@find');
    Route::post('password/reset', 'PasswordResetController@reset');   

    Route::get('updateCouponLastUsed/{id}', 'HomeController@updateCouponLastUsed');
    Route::post('/searchStore','HomeController@searchStore');
    Route::post('subscribe', 'HomeController@subscribe')->name('name');
    Route::post('couponLikeCounter/{id}', 'HomeController@couponLikeCounter');
});

Route::get('getAllStores','API\StoreCouponController@getAllStores');   
Route::post('addCoupons','API\StoreCouponController@addCoupons');



 