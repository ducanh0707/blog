<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_comment extends Model
{
    protected $table = "comment";
    public function F_post(){ 
        return $this->hasOne('App\Http\Model\M_post','id','post_id');
    }

}