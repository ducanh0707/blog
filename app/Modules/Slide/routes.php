<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'slide','namespace'=>'App\Modules\Slide\Controllers'], function(){

        Route::get('', 'SlideController@index');
        // them 
        Route::post('', 'SlideController@post_slide_new');
        // sua slide
        Route::post('edit/{slide_id}', 'SlideController@post_slide_edit');
        //status
        Route::get('status/{slide_id}', 'SlideController@get_change_status');
        //xoa slide
        Route::get('del/{slide_id}', 'SlideController@get_slide_del');

    //danh sach slide img
        Route::get('{slide_id}/img', 'SlideImageController@get_slide_img_list');
        // them 
        Route::post('{slide_id}/img', 'SlideImageController@post_slide_img_new');
        Route::post('{slide_id}/img_fast', 'SlideImageController@post_slide_img_new_fast');
        // sua slide
        Route::post('{slide_id}/img/edit/{id}', 'SlideImageController@post_slide_img_edit');
        //status
        Route::get('{slide_id}/img/status/{id}', 'SlideImageController@get_change_img_status');
        //xoa slide
        Route::get('{slide_id}/img/del/{id}', 'SlideImageController@get_slide_img_del');
    });
});