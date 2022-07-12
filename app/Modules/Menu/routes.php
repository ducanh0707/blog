<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'menu','namespace'=>'App\Modules\Menu\Controllers'], function(){
	
        Route::post('{type_id}/edit_ajax', 'MenuController@post_menu_ajax');
        //danh sach
        Route::get('{type_id}', 'MenuController@index');
        
    
    //vi tri menu
        //them
        Route::post('type/new', 'MenuTypeController@post_menu_type_new');
        // sua vi tri 
        Route::post('type/edit/{id}', 'MenuTypeController@post_menu_type_edit');
        //xoa
        Route::get('type/del/{id}', 'MenuTypeController@get_menu_type_del');
        //status
        Route::get('type/status/{id}', 'MenuTypeController@get_menu_type_status');

    //menu
        //them menu tuy chinh
        Route::post('type/{type_id}/new_custome', 'MenuController@post_menu_new_custome');
        //them menu cat
        Route::post('type/{type_id}/new_cat', 'MenuController@post_menu_new_cat');
        //them menu post
        Route::post('type/{type_id}/new_post', 'MenuController@post_menu_new_post');
        Route::post('type/{type_id}/new_page', 'MenuController@post_menu_new_page');

        //sua menu 
        Route::post('type/{type_id}/edit/{menu_id}', 'MenuController@post_menu_edit');
        //xoa
        Route::get('type/{type_id}/del/{menu_id}', 'MenuController@get_menu_del');
        // thay doi trang thai
        Route::get('{type_id}/status/{id}', 'MenuController@get_change_status');
    });
});