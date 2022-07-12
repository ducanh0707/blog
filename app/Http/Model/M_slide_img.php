<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_slide_img extends Model
{
    protected $table = "slide_img";
    public function F_slide(){ 
		  return $this->hasOne('App\Http\Model\M_slide','id','slide_id');
    }
   
}