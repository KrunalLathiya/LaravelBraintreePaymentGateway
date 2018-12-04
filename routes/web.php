<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/plans', 'PlanController@index')->name('plans.index');
    Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
    Route::get('/braintree/token', 'BraintreeTokenController@index')->name('token');
    Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');
});
