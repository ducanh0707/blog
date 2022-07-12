<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_user_type extends Model
{
    protected $table = "user_type";
    
    public function F_permission(){ 
		return $this->belongstoMany('App\Http\Model\M_permission','type_permission','type_id','permission_id');
	}
}
