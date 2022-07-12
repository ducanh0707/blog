<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_contact extends Model
{
    protected $table = "contact";
    
    public function F_val(){ 
      return $this->hasMany('App\Http\Model\M_form_value','contact_id','id');
    }
}
