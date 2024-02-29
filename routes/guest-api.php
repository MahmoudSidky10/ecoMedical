<?php

// Auth apis 
Route::post('/login', 'User\Auth\LoginController@index');
Route::post('/check-fcm', 'User\Auth\LoginController@checkFCM');
Route::post('/register', 'User\Auth\RegisterController@index');

// Public Apis
Route::post('countries', 'Content\CountryController@index');
Route::post('governorates', 'Content\GovernorateController@index');
Route::post('setting', 'Content\SettingController@index');

// Home apis
Route::post('sliders', 'Content\HomeController@sliders');
Route::post('brands', 'Content\HomeController@brands');
Route::post('new-products', 'Content\HomeController@newProducts');
Route::post('special-products', 'Content\HomeController@specialProducts');
Route::post('discount-products', 'Content\HomeController@discountProducts');
Route::post('popular-products', 'Content\HomeController@popularProducts');
Route::post('home-sections', 'Content\HomeController@HomeSortSections');

// Aside apis
Route::post('categories', 'Content\CategoryController@categories');
Route::post('main-categories', 'Content\CategoryController@index');
Route::post('sub-categories', 'Content\CategoryController@subCategories');

// Product Apis
Route::post('category-products', 'Content\ProductController@categoryProducts');
Route::post('search-products', 'Content\ProductController@searchProducts');
Route::post('product-details', 'Content\ProductController@details');


