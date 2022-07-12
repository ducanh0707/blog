<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_tab extends Model
{
    protected $table = "tab";
    public function F_tab_item(){ 
		return $this->hasMany('App\Http\Model\M_tab_item','tab_id','id')->orderby('orderby','asc');
	}
}