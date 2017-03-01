<?php

Route::get('auth', 'Auth\LoginController@showLoginForm');
Route::post('auth', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('auth/forgot', 'Auth\ForgotController@index');
Route::post('auth/forgot', 'Auth\ForgotController@store');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'cms/elements'], function () {
        Route::get('pages', 'PageController@index');
        Route::get('pages/add', 'PageController@create');
        Route::post('pages', 'PageController@store');
        Route::get('pages/{id}', 'PageController@edit');
        Route::put('pages/{id}', 'PageController@update');
        Route::delete('pages/{id}', 'PageController@destroy');

        Route::get('post', 'PostController@index');
        Route::get('post/add', 'PostController@create');
        Route::post('post', 'PostController@store');
        Route::get('post/{id}', 'PostController@edit');
        Route::put('post/{id}', 'PostController@update');
        Route::delete('post/{id}', 'PostController@destroy');

        Route::get('category', 'CategoryController@index');
        Route::post('category', 'CategoryController@store');
        Route::get('category/{id}', 'CategoryController@edit');
        Route::put('category/{id}', 'CategoryController@update');
        Route::delete('category/{id}', 'CategoryController@destroy');
    });

    Route::group(['prefix' => 'user/groups'], function () {
        Route::get('member', 'UserController@index');
        Route::get('member/add', 'UserController@create');
        Route::post('member', 'UserController@store');
        Route::get('member/{id}', 'UserController@edit');
        Route::put('member/{id}', 'UserController@update');
        Route::delete('member/{id}', 'UserController@destroy');
    });

    Route::group(['prefix' => 'system/setting'], function () {
        Route::get('general', 'Settings\\GeneralController@index');
        Route::post('general', 'Settings\\GeneralController@store');
        Route::get('media', 'Settings\\MediaController@index');
        Route::post('media', 'Settings\\MediaController@store');
    });
});


