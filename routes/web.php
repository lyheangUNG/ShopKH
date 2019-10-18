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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@index')->name('admin.home')->middleware('CheckUserRole');

Route::group(['middleware' => ['web','auth','CheckUserRole']], function () {
    Route::get('/admin/dashboard', function () {
		return view('dashboard');
	})->name('admin.dashboard');
	Route::get('admin/user/search', ['as' => 'user.search', 'uses' => 'UserController@search']);
	Route::resource('admin/user', 'UserController', ['except' => ['show']]);
	Route::get('admin/profile', ['as' => 'admin.profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'admin.profile.update', 'uses' => 'ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'admin.profile.password', 'uses' => 'ProfileController@password']);
	Route::post('admin/profile/upload', ['as' => 'admin.profile.upload', 'uses' => 'ProfileController@upload']);
	Route::get('admin/products/search',['as' => 'prouducts.search', 'uses' => 'ProductController@search']);
    Route::resource('admin/products', 'ProductController');
    Route::resource('admin/categories', 'CategoryController');
    Route::resource('admin/ads', 'AdsController');


});

Route::get('/', function(){
    return view('index');
	// return redirect('/');
})->name('normalUser');
Route::get('/', ['as' => 'user.homepage', 'uses' => 'UserHomePageController@index']);
Route::get('/men', ['as' => 'men.page', 'uses' => 'UserHomePageController@men']);
Route::get('/women', ['as' => 'women.page', 'uses' => 'UserHomePageController@women']);
Route::get('/show/{id}', ['as' => 'products.page', 'uses' => 'UserHomePageController@show']);
Route::post('/product-addtocart/{id}','UserHomePageController@addtocart')->name('product.addtocart');
Route::get('/cart','UserHomePageController@allcart')->name('allcart');
Route::get('/remove_cart/{index}','UserHomePageController@removecart')->name('product.removecart');
// Route::get('/', 'UserHomePageController@index')->name('user.home');

// Route::get('/users', 'UserHomeController@index')->name('home');

