<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_cat extends Model
{
    protected $table = "cat";
	public function F_child(){ 
		return $this->hasMany('App\Http\Model\M_cat','parent_id','id');
	}
	public function F_parent(){ 
		return $this->hasMany('App\Http\Model\M_cat','id','parent_id');
	} 
    public function F_post_type(){ 
		return $this->hasOne('App\Http\Model\M_post_type','id','post_type_id');
	}
	public function F_post(){ 
	return $this->belongstoMany('App\Http\Model\M_post','post_cat','cat_id','post_id')->orderby('orderby','desc');
	}
	public function F_relate(){ 
		return $this->hasMany('App\Http\Model\M_cat','parent_id','parent_id');
	}
}
