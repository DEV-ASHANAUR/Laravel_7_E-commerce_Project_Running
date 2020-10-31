<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FontendController@home')->name('website.home');
Route::get('/shop', 'FontendController@shop')->name('website.shop');
//route::get('pagination/fetch_data', 'FontendController@fetch_data');
Route::get('filter', 'FontendController@filter')->name('website.filter');
Route::post('/autocomplete/fetch', 'FontendController@autocomplete')->name('website.autocomplete');
Route::post('/search', 'FontendController@search')->name('website.search');
Route::get('/details/{slug}', 'FontendController@details')->name('website.details');
Route::get('/cart', 'FontendController@cart')->name('website.cart');
Route::get('/checkout', 'FontendController@checkout')->name('website.checkout');

//cart system
Route::post('/add-to-cart', 'CartController@addcart')->name('cart.add');
Route::get('/show-cart', 'CartController@showcart')->name('cart.show');
Route::post('/update-cart', 'CartController@upcart')->name('cart.update');
Route::get('/remove-cart/{rowId}', 'CartController@removecart')->name('cart.remove');

//customer signup
Route::get('cus/login/page','Customer@login')->name('customer.login');
Route::get('cus/reg/page','Customer@reg')->name('customer.reg');
Route::post('cus/reg/store','Customer@regstore')->name('customer.registation');
Route::get('email/verify','Customer@emailverify')->name('email.verify');
Route::post('email/verify/check','Customer@verifyCheck')->name('email.check');
//customer dashboard
Route::group(['middleware' => ['auth','customer']], function () {
    Route::get('/customer/dashboard/','CustomerDashboard@index')->name('customer.dashboard');
});

//backend route

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    //manage user route
    Route::group(['prefix' => 'users'], function () {
        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::post('/delete', 'Backend\UserController@delete')->name('users.delete');
    });
    //manage customer route
    Route::group(['prefix' => 'customer'], function () {
        Route::get('/view/customer', 'Customer@view')->name('customer.view');
        Route::get('/draf/customer', 'Customer@draf')->name('customer.draf');
        Route::post('/delete', 'Customer@delete')->name('customer.delete');
    });
    // manage profile route
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/view', 'Backend\ProfileController@view')->name('profile.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profile.edit');
        Route::post('/update', 'Backend\ProfileController@update')->name('profile.update');
        Route::get('/pass/view', 'Backend\ProfileController@passview')->name('profile.pass.view');
        Route::post('/pass/change', 'Backend\ProfileController@passchange')->name('profile.pass.change');
    });
    //manage unit
    Route::group(['prefix' => 'units'], function () {
        Route::get('/view', 'Backend\UnitController@view')->name('units.view');
        Route::get('/add', 'Backend\UnitController@add')->name('units.add');
        Route::post('/store', 'Backend\UnitController@store')->name('units.store');
        Route::get('/edit/{id}', 'Backend\UnitController@edit')->name('units.edit');
        Route::post('/update/{id}', 'Backend\UnitController@update')->name('units.update');
        Route::get('/delete/{id}', 'Backend\UnitController@delete')->name('units.delete');
    });
    //categories routes
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/view', 'Backend\CategoriesController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoriesController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoriesController@store')->name('categories.store');
        Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoriesController@update')->name('categories.update');
        Route::post('/delete', 'Backend\CategoriesController@delete')->name('categories.delete');    
    });
    //brand routes
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/view', 'Backend\BrandController@view')->name('brand.view');
        Route::get('/add', 'Backend\BrandController@add')->name('brand.add');
        Route::post('/store', 'Backend\BrandController@store')->name('brand.store');
        Route::get('/edit/{id}', 'Backend\BrandController@edit')->name('brand.edit');
        Route::post('/update/{id}', 'Backend\BrandController@update')->name('brand.update');
        Route::post('/delete', 'Backend\BrandController@delete')->name('brand.delete');
    });
    //color routes
    Route::group(['prefix' => 'color'], function () {
        Route::get('/view', 'Backend\ColorController@view')->name('color.view');
        Route::get('/add', 'Backend\ColorController@add')->name('color.add');
        Route::post('/store', 'Backend\ColorController@store')->name('color.store');
        Route::get('/edit/{id}', 'Backend\ColorController@edit')->name('color.edit');
        Route::post('/update/{id}', 'Backend\ColorController@update')->name('color.update');
        Route::post('/delete', 'Backend\ColorController@delete')->name('color.delete');
    });
    //size routes
    Route::group(['prefix' => 'size'], function () {
        Route::get('/view', 'Backend\SizeController@view')->name('size.view');
        Route::get('/add', 'Backend\SizeController@add')->name('size.add');
        Route::post('/store', 'Backend\SizeController@store')->name('size.store');
        Route::get('/edit/{id}', 'Backend\SizeController@edit')->name('size.edit');
        Route::post('/update/{id}', 'Backend\SizeController@update')->name('size.update');
        Route::post('/delete', 'Backend\SizeController@delete')->name('size.delete');
    });
    //manufacture routes
    Route::group(['prefix' => 'manufacture'], function () {
        Route::get('/view', 'Backend\Manufactures@view')->name('manufacture.view');
        Route::get('/add', 'Backend\Manufactures@add')->name('manufacture.add');
        Route::post('/store', 'Backend\Manufactures@store')->name('manufacture.store');
        Route::get('/edit/{id}', 'Backend\Manufactures@edit')->name('manufacture.edit');
        Route::post('/update/{id}', 'Backend\Manufactures@update')->name('manufacture.update');
        Route::post('/delete', 'Backend\Manufactures@delete')->name('manufacture.delete');
    });
    //product route
    Route::group(['prefix' => 'product'], function () {
        Route::get('/post_view', 'Backend\ProductController@index')->name('product.view');
        Route::get('/create', 'Backend\ProductController@create')->name('product.create');
        Route::post('/store', 'Backend\ProductController@store')->name('product.store');
        Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('product.edit');
        Route::get('/show/{id}', 'Backend\ProductController@show')->name('product.show');
        Route::post('/update/{id}', 'Backend\ProductController@update')->name('product.update');
        Route::post('/delete', 'Backend\ProductController@destroy')->name('product.destroy');
    });
    

    
});




