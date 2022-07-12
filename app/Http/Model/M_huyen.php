<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_huyen extends Model
{
    protected $table = "huyen";
    public function F_tinh(){ 
		return $this->hasOne('App\Http\Model\M_tinh','id','tinh_id');
	}
}
