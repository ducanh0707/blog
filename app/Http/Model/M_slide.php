<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_slide extends Model
{
    protected $table = "slide";
    public function F_slide_img(){ 
		  return $this->hasMany('App\Http\Model\M_slide_img','slide_id','id');
    }
}