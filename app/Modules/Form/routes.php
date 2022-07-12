<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'form','namespace'=>'App\Modules\Form\Controllers'], function(){
        //form list
        Route::get('{form_id}', 'FormController@index');
        //contact	
        Route::get('{form_id}/contact', 'ContactController@get_contact_list');
        Route::get('{form_id}/contact/status/{id}', 'ContactController@get_contact_status');
        Route::get('{form_id}/contact/del/{id}', 'ContactController@get_contact_del');

        //them form
            Route::post('new', 'FormController@post_form_new');
            // sua
            Route::post('{form_id}/edit', 'FormController@post_form_edit');
            //status
            Route::get('{form_id}/status', 'FormController@get_form_status');
            //xoa
            Route::get('{form_id}/del', 'FormController@get_del');
            // xoa feild
            Route::get('{form_id}/del/{feild}', 'FormController@get_del_feild');
        // feild
            Route::post('{form_id}/new_feild', 'FormController@post_form_new_feild');
            Route::post('{form_id}/edit_option', 'FormController@post_form_edit_option');
    });
});