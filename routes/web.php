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

Route::get('/', [
    'uses' => 'ListingsController@index',
    'as' => 'listings.index'
]);

Route::get('/step-1', [
    'uses' => 'ListingsController@step1',
    'as' => 'listings.step1'
]);


Route::post('/step-2', [
    'uses' => 'ListingsController@step2',
    'as' => 'listings.step2'
]);

Route::post('/store', [
    'uses' => 'ListingsController@store',
    'as' => 'listings.store'
]);



Route::get('/account', [
    'uses' => 'AccountsController@show',
    'as' => 'account.show'
]);

Route::get('/account/users/{id}', [
    'uses' => 'AccountsController@users',
    'as' => 'account.users'
]);


Route::get('/account/reply/{user}/{id}', [
    'uses' => 'AccountsController@reply',
    'as' => 'account.reply'
]);

Route::get('/{slug}/{id}', [
    'uses' => 'ListingsController@show',
    'as' => 'listings.show'
]);

// Facebook routes
Route::get('login-facebook', 'FacebookController@redirectToProvider')->name('login.facebook');
Route::get('login-facebook/redirect/callback', 'FacebookController@handleProviderCallback');


Auth::routes();

Route::get('/home', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');



