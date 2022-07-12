<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'tab','namespace'=>'App\Modules\Tab\Controllers'], function(){

        Route::get('', 'TabController@index');
        Route::post('new', 'TabController@post_tab_new');
        Route::post('edit/{tab_id}', 'TabController@post_tab_edit');
        Route::get('status/{tab_id}', 'TabController@get_change_status');
        Route::get('del/{tab_id}', 'TabController@get_tab_del');

        Route::get('{tab_id}/item', 'TabItemController@get_tab_item_list');
        // them 
        Route::post('{tab_id}/item', 'TabItemController@post_tab_item_new');
        //order
        Route::post('{tab_id}/item/order', 'TabItemController@get_tab_item_order');
        // sua theme_tab
        Route::post('{tab_id}/item/edit/{id}', 'TabItemController@post_tab_item_edit');
        //status
        Route::get('{tab_id}/item/status/{id}', 'TabItemController@get_change_item_status');
        //xoa theme_tab
        Route::get('{tab_id}/item/del/{id}', 'TabItemController@get_tab_item_del');
    });
});