<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'popup_regis','namespace'=>'App\Modules\PopupRegis\Controllers'], function(){

        Route::get('', 'PopupRegisController@index');
        // them 
        Route::post('new', 'PopupRegisController@post_popup_regis_new');
        // sua PopupRegis
        Route::post('edit/{PopupRegis_id}', 'PopupRegisController@post_popup_regis_edit');
        //status
        Route::get('status/{PopupRegis_id}', 'PopupRegisController@get_change_status');
        //xoa PopupRegis
        Route::get('del/{PopupRegis_id}', 'PopupRegisController@get_popup_regis_del');
    });
});