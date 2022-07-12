<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_sidebar extends Model
{
    protected $table = "sidebar";

    public function F_form(){ 
		return $this->hasOne('App\Http\Model\M_form','id','form_id')->orderby('id','asc') ->select('full_name','email','tel','care','request','id');
    }
    public function F_cat(){ 
      return $this->hasOne('App\Http\Model\M_cat','id','cat_id');
    }
    public function F_menu_type(){ 
      return $this->hasOne('App\Http\Model\M_menu_type','id','menu_id');
    }
}
