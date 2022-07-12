<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_popup extends Model
{
    protected $table = "popup";
    public function F_form(){ 
		return $this->hasOne('App\Http\Model\M_form','id','form_id')->orderby('id','asc') ->select('full_name','email','tel','care','request','id');
	}
}