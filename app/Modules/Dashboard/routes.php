<?php

Route::group(['prefix'=>'admin','middleware' => ['web', 'checkAdminLogin']], function(){
       $namespace = 'App\Modules\Dashboard\Controllers';
   Route::group(
       ['module'=>'Dashboard', 'namespace' => $namespace,],
       function() {
           Route::get('dashboard','DashboardController@index');
       }
   );
});