<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'post/{post_type}','namespace'=>'App\Modules\Post\Controllers'], function(){

        Route::get('','PostController@index');
        Route::post('image_upload','PostController@image_upload');
        Route::post('image_upload_text_image','PostController@image_upload_text_image');
        
        Route::get('new', 'PostNewController@get_post_new');
        Route::get('import', 'PostNewController@get_post_import');
        Route::get('product_list', 'PostNewController@get_post_product');
        Route::post('import', 'PostNewController@post_post_import');
        Route::post('new', 'PostNewController@post_post_new');
        Route::post('slide_order', 'PostEditController@post_post_order');
        Route::get('edit/{post_id}', 'PostEditController@get_post_edit');
        Route::post('edit/{post_id}', 'PostEditController@post_post_edit');
        Route::get('del/{post_id}', 'PostEditController@get_post_del');
        Route::get('status/{post_id}', 'PostEditController@get_change_status');
        Route::get('search/{key}', 'PostController@search_post');
        Route::get('del_slide/{img_id}', 'PostEditController@get_del_slide_img');
        Route::get('del_file/{file_id}', 'PostEditController@get_del_file');
        Route::get('del_product_relate/{post_id}/{relate_id}', 'PostEditController@get_del_product_relate');
        Route::post('action', 'PostController@post_action');
        
    });
});