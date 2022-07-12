<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
    Route::group(['prefix'=>'crawl','namespace'=>'App\Modules\Crawl\Controllers'], function(){
        Route::get('', 'CrawlController@index');
        Route::post('new', 'CrawlController@new_post');
    });
});