<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_tinh extends Model
{
    protected $table = "tinh";
	public function F_huyen(){ 
		return $this->hasMany('App\Http\Model\M_huyen','tinh_id','id');
	}

}
