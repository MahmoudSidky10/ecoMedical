<?php



// Admin Routes
Route::get('/admin', 'Admin\Auth\LoginController@index');
Route::post('/admin-login', 'Admin\Auth\LoginController@login');
Route::post('/admin-logout', 'Admin\Auth\LoginOutController@index');

// Site Routes
Route::get('/', 'Site\Home\IndexController@index')->name("site.home");
Route::get('/search', 'Site\Home\IndexController@search')->name("site.search");
Route::get('/subscribe.store', 'Site\Home\IndexController@subscribeStore')->name("subscribe.store");
Route::get('/subscribe.thanks', 'Site\Home\IndexController@subscribeThanks')->name("subscribe.thanks");

// Login Route
Route::get('/need-login', 'Site\Auth\LoginController@needLogin')->name("site.need-login");
Route::get('/login', 'Site\Auth\LoginController@index')->name("login");
Route::post('/login', 'Site\Auth\LoginController@check')->name("site.login");
Route::get('/logout', 'Site\Auth\LoginController@logout')->name("logout");
// Register Route
Route::get('/register', 'Site\Auth\RegisterController@index')->name("site.register.view");
Route::post('/register', 'Site\Auth\RegisterController@store')->name("site.register");

// Products Route
Route::get('offer-products', 'Site\Product\IndexController@offerProducts')->name("site.offer-products");
Route::get('category-products/{id}/{slug?}', 'Site\Product\IndexController@categoryProducts')->name("site.category-products");
Route::get('/product-details/{slug}', 'Site\Product\IndexController@show')->name("site.product.details");

// Reset Any issue ..
Route::get('/reset-slug', 'ResetController@slug');

// Ajax func
Route::post('/getCities', 'Admin\AjaxController@getCities');
Route::post('/checkCouponCode', 'Admin\AjaxController@checkCouponCode');