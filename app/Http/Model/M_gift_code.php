<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_gift_code extends Model
{
    protected $table = "gift_code";
	public function F_post(){ 
		return $this->hasMany('App\Http\Model\M_post','gift_code_id','id');
	}
}
