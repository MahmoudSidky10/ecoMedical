<?php

Route::group(['prefix' => 'user'], function () {
    Route::post('profile', 'User\Auth\ProfileController@index');
    Route::post('logout', 'User\Auth\LoginController@Logout');
    Route::post('update-profile', 'User\Auth\ProfileController@update');


    // Cart apis
    Route::post('cart', 'User\Cart\IndexController@index');
    Route::post('add-cart', 'User\Cart\IndexController@store');
    Route::post('remove-cart', 'User\Cart\IndexController@destroy');
    Route::post('clear-cart', 'User\Cart\IndexController@clear');

    // Wishlist apis
    Route::post('wishlist', 'User\WishList\IndexController@index');
    Route::post('add-wishlist', 'User\WishList\IndexController@store');
    Route::post('remove-wishlist', 'User\WishList\IndexController@destroy');

    // Compare apis
    Route::post('comparelist', 'User\CompareList\IndexController@index');
    Route::post('add-comparelist', 'User\CompareList\IndexController@store');
    Route::post('remove-comparelist', 'User\CompareList\IndexController@destroy');

    // Rating apis
    Route::post('ratelist', 'User\RateList\IndexController@index');
    Route::post('add-ratelist', 'User\RateList\IndexController@store');
    Route::post('remove-ratelist', 'User\RateList\IndexController@destroy');


    // Address apis
    Route::post('addresses', 'User\Address\IndexController@index');
    Route::post('add-address', 'User\Address\IndexController@store');
    Route::post('remove-address', 'User\Address\IndexController@destroy');
    Route::post('update-address', 'User\Address\IndexController@update');
    Route::post('details-address', 'User\Address\IndexController@details');

    // Orders Api
    Route::post('orders', 'User\Order\IndexController@index');
    Route::post('add-order', 'User\Order\IndexController@store');
    Route::post('order-details', 'User\Order\IndexController@show');

    // Coupon Api
    Route::post('coupon-details', 'Content\ProductController@couponDetails');
});

// Fail Api
Route::fallback(function (Request $request) {
    $response['message'] = "Page Not Found.If error persists,contact info@wings.com";
    $response['statusCode'] = 404;
    $statusCode = 404;
    return \Response::json($response, $statusCode);
});