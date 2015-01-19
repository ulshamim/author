<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', array('uses' => 'StoreController@home'));

Route::get('users/login', array('uses' => 'LoginController@getIndex'));
Route::get('logout', 'LoginController@getLogout');
Route::controller('store', 'StoreController');
Route::group(array('prefix' => 'admin', 'before' => 'auth.sentry'), function() {
    Route::controller('pages', 'PageController');
});
Route::controller('users', 'UserController');
Route::controller('login', 'LoginController');
Route::resource('payment', 'PaypalPaymentController');
