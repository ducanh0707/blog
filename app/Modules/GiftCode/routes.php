<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'gift_code','namespace'=>'App\Modules\GiftCode\Controllers'], function(){
        Route::get('', 'GiftCodeController@index');
        // them 
        Route::post('new', 'GiftCodeController@post_gift_code_new');
        // sua gift_code
        Route::post('edit/{gift_code_id}', 'GiftCodeController@post_gift_code_edit');
        //status
        Route::get('status/{gift_code_id}', 'GiftCodeController@get_change_status');
        //xoa gift_code
        Route::get('del/{gift_code_id}', 'GiftCodeController@get_gift_code_del');

        // child 
        Route::get('list/{gift_code_id}', 'GiftCodeController@get_gift_code_list');
        Route::post('list/{gift_code_id}/new', 'GiftCodeController@get_gift_code_list_new');
        Route::get('list/{gift_code_id}/del/{id_child}', 'GiftCodeController@get_gift_code_list_del');
    });
});