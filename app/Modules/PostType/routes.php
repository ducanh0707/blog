<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'post_type','namespace'=>'App\Modules\PostType\Controllers'], function(){
        Route::get('', 'PostTypeController@index');
        // them 
        Route::post('new', 'PostTypeController@post_post_type_new');
        // sua post_type
        Route::post('edit/{post_type_id}', 'PostTypeController@post_post_type_edit');
        //status
        Route::get('status/{post_type_id}', 'PostTypeController@get_change_status');
        //xoa post_type
        Route::get('del/{post_type_id}', 'PostTypeController@get_post_type_del');
    });
});