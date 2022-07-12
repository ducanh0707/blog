<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('robots.txt', function(){
    return response(view('V_fontend/robots'))->header('Content-Type', 'text/plain');
});
Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap.xml/articles', 'SitemapController@articles');

Route::get('',function(){ Session::put(['lang' => 'vi']); return redirect('vi');});

Route::get('form/search','Controller@get_search');

Route::get('changeLanguage/{lang}/{url}','Controller@changeLanguage');

Route::group(['prefix' => 'en',  'middleware' => 'locale:en'], function() {
    Route::get('', 'Controller@get_home');
    Route::get('lien-he', 'Controller@get_Contact');
    Route::post('lien-he', 'Controller@post_Contact');
    Route::get('{url_post}.html','Controller@get_post');
    Route::get('{url_cat}','Controller@get_cat');

});

Route::group(['prefix' => 'vi',  'middleware' => 'locale:vi'], function() {
    Route::get('', 'Controller@get_home');
    Route::get('lien-he', 'Controller@get_Contact');
    Route::post('lien-he', 'Controller@post_Contact');
    Route::get('{url_post}.html','Controller@get_post');
    Route::get('{url_cat}','Controller@get_cat');

});


Route::get('admin/login',['as'=>'postlogin','uses'=>'Auth\LoginController@get_login']);
Route::post('admin/login',['as'=>'postlogin','uses'=>'Auth\LoginController@post_login']);
//log out
Route::get('admin/logout', 'Auth\LoginController@getlogout');



