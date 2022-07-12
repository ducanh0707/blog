<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'popup','namespace'=>'App\Modules\Popup\Controllers'], function(){
        Route::get('', 'PopupController@index');
        // them 
        Route::post('new', 'PopupController@post_popup_new');
        // sua popup
        Route::post('edit/{popup_id}', 'PopupController@post_popup_edit');
        //status
        Route::get('status/{popup_id}', 'PopupController@get_change_status');
        //xoa popup
        Route::get('del/{popup_id}', 'PopupController@get_popup_del');
    });
});