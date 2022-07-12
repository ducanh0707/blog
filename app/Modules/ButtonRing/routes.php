<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'button_ring','namespace'=>'App\Modules\ButtonRing\Controllers'], function(){

        Route::get('', 'ButtonRingController@index');
        // sua
        Route::post('', 'ButtonRingController@post_button_ring_edit');
        // them
        Route::post('new', 'ButtonRingController@post_button_ring_new');
        //status
        Route::get('status/{button_ring_id}', 'ButtonRingController@get_change_status');
        //xoa 
        Route::get('del/{button_ring_id}', 'ButtonRingController@get_button_ring_del');
    });
});