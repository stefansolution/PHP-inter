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

/*Route::get('/', function () {
	$assets_front=url('/framework/public/');
    return view('index',compact('assets_front'));
});*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/searchCouponDeal','HomeController@searchCouponDeal');
Route::get('/store/{slug}','HomeController@store');
Route::get('/category/{slug}','HomeController@category');
Route::get('/about','HomeController@about');
Route::get('/privacy','HomeController@privacy');
Route::get('/terms','HomeController@terms');
Route::get('/getRelatedStore/{slug}', 'HomeController@getRelatedStore');
Route::get('/getPopularRelatedStore/{slug}','HomeController@getPopularRelatedStore');
Route::get('/getExpiredCoupon/{slug}','HomeController@getExpiredCoupon');
Route::get('/getCategoryRelatedStore/{slug}','HomeController@getCategoryRelatedStore');
Route::get('/sendNewsletter','HomeController@sendNewsletter');
Route::get('/email-unsubscribe','HomeController@emailUnsubscribe');
Route::get('/sitemap.xml', 'SitemapController@sitemapStores');


Route::get('/admin', function () {
   return redirect('/login');
});


Route::get('/home', function () {
  return redirect()->route('dashboard');
});


Route::get('/clear-cache', function() {
     Artisan::call('cache:clear');
    return "clear cache";
});

Route::get('/clear-config', function() {
    Artisan::call('config:clear');
    return "config cache is cleared";
});

Route::get('/clear-view', function() {
    Artisan::call('view:clear');
    return "view cache is cleared";
}); 


//   Route::get('/dashboard', 'AdminController@dashboard')->middleware('AdminAuth');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

