<?php


Route::get('/dash', 'Dashboard\IndexController@index');
Route::get('/settings', 'Dashboard\IndexController@settings');
Route::any('/updateSettings', 'Dashboard\IndexController@updateSettings');
Route::get('/logout', 'Dashboard\IndexController@logout');
Route::resource('/ProductProperties', 'ProductProperty\IndexController')->names("admin.ProductProperties");
Route::resource('/products', 'Product\IndexController');
Route::resource('/products.images', 'Product\ImageController');
Route::resource('/products.options', 'Product\OptionController');
Route::resource('/products.views', 'Product\ViewController');
Route::resource('/countries', 'Content\CountryController');
Route::resource('/governorates', 'Governorate\IndexController');
Route::resource('/clients', 'Client\IndexController')->names("admin.clients");
Route::resource('/clients.address', 'Client\AddressController')->names("admin.clients.address");
Route::resource('/brands', 'Content\BrandController')->names("admin.brands");
Route::resource('/categories', 'Content\CategoryController')->names("admin.categories");
Route::resource('/categories.subCategories', 'Content\SubCategoryController')->names("admin.subCategories");
Route::resource('/socialMedia', 'Content\SocialMediaController')->names("admin.socialMedia");
Route::resource('/sliders', 'Content\SliderController')->names("admin.sliders");
Route::resource('/permissions', 'Content\PermissionsController')->names("admin.permissions");
Route::resource('/permission-categories', 'Content\PermissionCategoriesController')->names("admin.permission-categories")->except('show');
Route::resource('/roles', 'Content\RolesController')->names("admin.roles");
Route::resource('/templates', 'Project\TemplateController')->names("admin.templates");
Route::get('/templates-sort', 'Project\TemplateController@sort');
Route::post('/get-selected-check', 'Content\RolesController@getSelectedCheck');
Route::resource('/orders', 'Order\IndexController')->names("admin.orders");
Route::get('/orders/{id}/products', 'Order\IndexController@products')->name("admin.orders.products");
Route::resource('/home-sections', 'Content\HomeSectionsController')->names("admin.home-sections");
Route::resource('/designs', 'Content\DesignController')->names("admin.designs");
Route::resource('/coupons', 'Content\CouponController')->names("admin.coupons");

// Ajax Controller
Route::post('/getCategories', 'AjaxController@getCategories');
Route::post('/getDesigns', 'AjaxController@getDesigns');




