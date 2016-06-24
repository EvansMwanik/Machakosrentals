<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //Authentication routes
Route::get('auth/login','Auth\AuthController@getLogin');
Route::get('Auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');

//Registration routes
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@PostRegister');
Route::controllers(['password'=>'Auth\passwordController']);

//navigation routes
Route::get('/', 'StoreController@view');
Route::get('rentals/', 'StoreController@index');
Route::get('rentals/view/{id}','StoreController@show');
Route::get('rentals/view','StoreController@show');
Route::get('store/search','StoreController@search');
Route::get('store/contact','StoreController@contact');
Route::get('store/about','StoreController@about');
Route::post('store/email','StoreController@email');
Route::get('estates/{id}','EstatesController@show');

//Estate Routes
Route::get('Admin/estates','EstatesController@index');
Route::get('estates/{id}/view','EstatesController@show');
Route::get('Admin/estates/create','EstatesController@create');
Route::post('Admin/estates/store','EstatesController@store');
Route::delete('Admin/estates/{id}/delete','EstatesController@destroy');
Route::get('Admin/estates/edit/{id}','EstatesController@edit');
Route::put('Admin/estates/update','EstatesController@update');

//Rentaltypes Routes
Route::get('Admin/rentaltypes','RentaltypesController@index');
Route::get('Admin/rentaltypes/create','RentaltypesController@create');
Route::post('Admin/rentaltypes/store','RentaltypesController@store');
Route::delete('Admin/rentaltypes/{id}/delete','RentaltypesController@destroy');
Route::get('Admin/rentaltypes/edit/{id}','RentaltypesController@edit');
Route::put('Admin/rentaltypes/update','RentaltypesController@update');
Route::get('rentaltypes/view/{id}','RentaltypesController@view');

//Rentals Routes
Route::get('Admin/rentals','RentalsController@index');
Route::get('Admin/rentals/users','RentalsController@user');
Route::get('Admin/rentals/create','RentalsController@create');
Route::post('Admin/rentals/store','RentalsController@store');
Route::delete('Admin/rentals/delete/{id}','RentalsController@destroy');
Route::get('Admin/rentals/edit/{id}','RentalsController@edit');
Route::put('Admin/rentals/update','RentalsController@update');
Route::put('Admin/rentals/availability/{id}','RentalsController@availability');
});
