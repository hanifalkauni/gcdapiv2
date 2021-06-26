<?php

Route::get('/testing/{mytest}','TestController@index');

Route::group(['middleware' => 'apiKeyAuth'], function () {
    Route::post('/user/create', 'UserController@create');
    Route::post('/user/login', 'UserController@login');
    Route::group(['middleware' => 'userAuth'], function () {
        Route::get('/user/get', 'UserController@get');

        Route::get('/product/get', 'ProductController@get');
        Route::put('/product/update', 'ProductController@update');
        Route::delete('/product/delete', 'ProductController@delete');
        
        Route::get('/position/get','PositionController@get');
        Route::post('/position/create','PositionController@create');
        Route::put('/position/update','PositionController@update');
        Route::delete('/position/delete','PositionController@delete');

        Route::get('/worker/get','WorkerController@get');
        Route::post('/worker/create','WorkerController@create');
        Route::put('/worker/update','WorkerController@update');
        Route::delete('/worker/delete','WorkerController@delete');

        Route::get('/outlet/get','OutletController@get');
        Route::post('/outlet/create','OutletController@create');
        Route::put('/outlet/update','OutletController@update');
        Route::delete('/outlet/delete','OutletController@delete');
    });
});
