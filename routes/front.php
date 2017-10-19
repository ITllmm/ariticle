<?php

    //Route::get('login','front\LoginController@index'); //notice '\LoginController'  not '/LoginController'

    Route::group(['prefix' => 'front','namespace' => 'front'],function(){

        Route::get('login','LoginController@index');

        Route::post('login','LoginController@login');

        Route::get('register','RegisterController@index');

        Route::post('register','RegisterController@register');

        Route::get('logout','LoginController@logout');

       Route::get('post',"PostController@index");

        // Route::post('person/set',function() {

        // });
    });

   // Route::get('/logout','front\LoginController@logout');