<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_menu extends Model
{
    protected $table = "menu";

	public function F_parent(){ 
		return $this->hasMany('App\Http\Model\M_menu','id','parent_id');
	}
	public function F_child(){ 
		return $this->hasMany('App\Http\Model\M_menu','parent_id','id');
	}
}
