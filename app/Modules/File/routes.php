<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'file','namespace'=>'App\Modules\File\Controllers'], function(){

        Route::get('', 'FileController@index');
        // them 
        Route::post('new', 'FileController@file_new');
        Route::get('del/{id}', 'FileController@file_del');
        Route::post('edit/{id}', 'FileController@file_edit');
    });
});