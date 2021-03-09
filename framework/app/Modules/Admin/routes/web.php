<?php

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'AdminAuth'], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/profile','AdminController@adminProfile');
    Route::get('/editProfile/{id}', 'AdminController@editView');
    Route::post('/update/{id}','AdminController@updateProfile');
    Route::get('/changePassword','AdminController@changePasswordView');
    Route::post('/changepassword/{id}','AdminController@changePasswordStore'); 
    Route::resource('/categories','CategoryController');
    Route::resource('/stores','StoreController');
    Route::resource('/coupons','CouponController');
    Route::get('/subscribers','SubscriberController@listing');
    Route::get('/getStoreSuggestion/{store}','CouponController@getStoreSuggestion');
    Route::post('/delete-subscriber','SubscriberController@deleteSubscriber');
 });    




