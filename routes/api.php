<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// ------------- Open Routes -------------

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/register', 'Auth\RegisterController@register')->name('register')->middleware('web');
Route::post('/reset', 'Auth\CustomResetPassword@reset')->name('reset')->middleware('web');
Route::post('/password/confirm', 'Auth\CustomResetPassword@resetPasswordWithToken')->name('confirm');

Route::get('/product/get', 'ProductController@index')->name('product.get');
Route::get('/product/show/{slug}', 'ProductController@show')->name('product.show');
Route::get('/product-category/get', 'ProductCategoryController@index')->name('product-category.get');
Route::get('/product-attributes/get', 'ProductAttributeController@index')->name('product-attribute.get');
Route::get('/pages/get', 'PageController@index')->name('pages.get');
Route::get('/page/{slug}', 'PageController@show')->name('pages.show');
Route::get('/posts/get', 'BlogController@index')->name('posts.get');
Route::get('/posts/{slug}', 'BlogController@show')->name('posts.show');

// Auth Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function (Request $request) {return $request->user();});
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/checkout', function(){})->name('checkout');
    Route::post('/checkout', function(){})->name('checkout');
    Route::get('/orders', function(){})->name('orders');
    Route::get('/orders/:id', function(){})->name('orders.get');
    Route::get('/addresses', function(){})->name('addresses');
});

// ------------- Admin Routes -------------
Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/admin', function(){return response(200);})->name('admin');

    Route::get('/admin/settings', 'SettingController@get')->name('admin.settings');
    Route::post('/admin/settings/update', 'SettingController@update')->name('admin.settings.update');

    Route::get('/admin/affiliate', 'AffiliateController@get')->name('admin.settings');
    Route::post('/admin/affiliate/update', 'AffiliateController@update')->name('admin.settings.update');

    Route::get('/admin/helpdesk', 'HelpdeskController@get')->name('admin.settings');
    Route::get('/admin/helpdesk/:id', 'HelpdeskController@edit')->name('admin.settings');
    Route::post('/admin/helpdesk/update', 'HelpdeskController@update')->name('admin.settings.update');

    Route::post('/admin/pages/create', 'PageController@store')->name('pages.store');
    Route::post('/admin/pages/update', 'PageController@update')->name('pages.update');
    Route::post('/admin/pages/delete', 'PageController@destroy')->name('pages.delete');

    Route::get('/admin/users', 'UserController@index')->name('users.get');
    Route::post('/admin/users/create', 'UserController@store')->name('users.store');
    Route::post('/admin/users/update', 'UserController@update')->name('users.update');
    Route::post('/admin/users/delete', 'UserController@destroy')->name('users.delete');
});

// ------------- Shop Manager -------------
Route::group(['middleware' => ['auth', 'manager']], function(){

    Route::get('/manager', function(){return response(200);})->name('manager');
    Route::get('/admin/product', 'ProductController@get')->name('product.get');
    Route::get('/admin/product/edit', 'ProductController@edit')->name('product.edit');
    Route::post('/admin/product/store', 'ProductController@store')->name('product.store');
    Route::post('/admin/product/update', 'ProductController@update')->name('product.update');
    Route::post('/admin/product/delete', 'ProductController@delete')->name('product.delete');

    Route::get('/admin/product-category/edit', 'ProductCategoryController@edit')->name('product-category.edit');
    Route::post('/admin/product-category/store', 'ProductCategoryController@store')->name('product-category.store');
    Route::post('/admin/product-category/update', 'ProductCategoryController@update')->name('product-category.update');
    Route::post('/admin/product-category/delete', 'ProductCategoryController@destroy')->name('product-category.delete');

    Route::get('/admin/product-attributes', 'ProductAttributeController@get')->name('product-attributes.get');
    Route::get('/admin/product-attributes/edit', 'ProductAttributeController@edit')->name('product-attributes.edit');
    Route::post('/admin/product-attributes/store', 'ProductAttributeController@store')->name('product-attributes.store');
    Route::post('/admin/product-attributes/update', 'ProductAttributeController@update')->name('product-attributes.update');
    Route::post('/admin/product-attributes/delete', 'ProductAttributeController@destroy')->name('product-attributes.delete');
});

// ------------- Blogger -------------
Route::group(['middleware' => ['auth', 'blogger']], function(){

    Route::get('/blogger', function(){return response(200);})->name('blogger');
    Route::post('/admin/blog/store', 'ProductController@store')->name('blog.store');
    Route::post('/admin/blog/update', 'ProductController@update')->name('blog.update');
    Route::post('/admin/blog/delete', 'ProductController@delete')->name('blog.delete');

});

Route::get('/adminhome', function(Request $request){
    if($request->user()->role == 'admin' || $request->user()->role == 'manager' || $request->user()->role == 'blogger') 
    return response()->json(array('email' => md5(strtolower(trim($request->user()->email)))),200);
    return response()->json('Unauthorized Access',401);
})->middleware('auth');

Route::post('/quicknote/create', 'QuickNoteController@store')->middleware('auth');
Route::post('/quicknote/get', 'QuickNoteController@show')->middleware('auth');
Route::post('/quicknote/delete', 'QuickNoteController@destroy')->middleware('auth');

Route::get('/media/get/{folder?}', 'MediaController@index')->middleware('auth');
Route::post('/media/store', 'MediaController@store')->middleware('auth');
Route::post('/media/createFolder', 'MediaController@createFolder')->middleware('auth');
Route::post('/media/deleteFile', 'MediaController@deleteFile')->middleware('auth');
Route::post('/media/deleteFolder', 'MediaController@deleteFolder')->middleware('auth');