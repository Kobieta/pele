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

Route::post('/pele-send', [
    'uses' => 'ListingsController@sendListingToFriend',
    'as' => 'listings.send'
]);



/**
 * Account routes
 */

Route::get('/account', [
    'uses' => 'AccountsController@show',
    'as' => 'account.show'
]);

Route::post('/account/name', [
    'uses' => 'AccountsController@changeUsername',
    'as' => 'account.name'
]);

Route::get('/account/listings', [
    'uses' => 'AccountsController@listings',
    'as' => 'account.listings'
]);

Route::get('/account/listing/users/{id}', [
    'uses' => 'AccountsController@users',
    'as' => 'account.users'
]);


Route::get('/account/listing/reply/{user}/{id}', [
    'uses' => 'AccountsController@reply',
    'as' => 'account.reply'
]);


// 10:57 /{slug}/{id}

Route::get('/listings/{slug}/{id}', [
    'uses' => 'ListingsController@show',
    'as' => 'listings.show'
]);

// Facebook routes
Route::get('login-facebook', 'FacebookController@redirectToProvider')->name('login.facebook');
Route::get('login-facebook/redirect/callback', 'FacebookController@handleProviderCallback');

// Activation link

Route::get('/account/activation/{activation_code}', 'ActivationController@activateAccount');
Route::get('/account/activation/succes', 'ActivationController@succes');
Route::get('/account/activation/activation-failed', 'ActivationController@failed');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');



