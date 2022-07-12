<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_theme extends Model
{
    protected $table = "theme";
    public function F_user(){ 
        return $this->hasOne('App\Http\Model\User','id','user_id');
    }
    public function F_parent(){ 
        return $this->hasOne('App\Http\Model\M_theme','theme_id','parent_id');
    }
    public function F_meta(){ 
        return $this->hasMany('App\Http\Model\M_theme_meta','theme_id','id');
    }
    public function F_popup(){ 
        return $this->hasOne('App\Http\Model\M_popup','id','popup');
    }
    public function F_widget(){ 
        return $this->hasMany('App\Http\Model\M_theme_widget','theme_id','id');
    }
 
}