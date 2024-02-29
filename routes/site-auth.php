<?php


// Profile Route
Route::get('/profile', 'Auth\ProfileController@profile')->name("profile");
Route::get('/user/edit', 'Auth\ProfileController@editProfile')->name("user.editProfile");
Route::post('/user/edit/update', 'Auth\ProfileController@editProfileUpdate')->name("user.editProfile.update");
Route::get('/orders', 'Auth\ProfileController@orders')->name("user.orders");

Route::get('/user/address', 'Auth\ProfileController@address')->name("user.address");
Route::get('/user/address/create', 'Auth\ProfileController@addressCreate')->name("user.address.create");
Route::post('/user/address/store', 'Auth\ProfileController@addressStore')->name("user.address.store");
Route::get('/user/address/edit/{id}', 'Auth\ProfileController@addressEdit')->name("user.address.edit");
Route::post('/user/address/update/{id}', 'Auth\ProfileController@addressUpdate')->name("user.address.update");

Route::get('/wishlist', 'Auth\ProfileController@wishList')->name("user.wishList");
Route::post('/removeItemFromWishList', 'Auth\ProfileController@removeItemFromWishList');
Route::post('/storeItemIntoWishList', 'Auth\ProfileController@storeItemIntoWishList');

Route::get('/compare-list', 'Auth\ProfileController@compareList')->name("user.compareList");
Route::post('/removeItemFromCompareList', 'Auth\ProfileController@removeItemFromCompareList');
Route::post('/storeItemIntoCompareList', 'Auth\ProfileController@storeItemIntoCompareList');


// Cart
Route::get('/cart-products', 'User\CartController@index')->name("user.cart.products");
Route::post('/removeItemFromCartList', 'User\CartController@removeItemFromCartList')->name("user.cart.removeItemFromCartList");
Route::post('/storeItemIntoCart', 'User\CartController@storeItemIntoCart');
Route::post('/updateItemCountIntoCart', 'User\CartController@updateItemCountIntoCart');
Route::post('/plusItemCountIntoCart', 'User\CartController@plusItemCountIntoCart');
Route::post('/user-cart-products-store', 'User\CartController@store')->name("user.cart.products.store");
Route::get('/user-cart-products-invoice/{id}', 'User\CartController@invoice')->name("user.cart.products.invoice");




