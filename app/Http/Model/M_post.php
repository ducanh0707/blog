<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class M_post extends Model
{
    protected $table = "post";
    
    public function F_cat(){ 
      return $this->belongstoMany('App\Http\Model\M_cat','post_cat','post_id','cat_id');
    }
    public function F_tag(){ 
		  return $this->belongstoMany('App\Http\Model\M_tag','post_tag','post_id','tag_id');
    }
    public function F_gift_code(){ 
      return $this->hasOne('App\Http\Model\M_gift_code','id','code_km');
    }
    public function F_user(){ 
        return $this->hasOne('App\Http\Model\User','id','user_id');
    }
    public function F_post_type(){ 
      return $this->hasOne('App\Http\Model\M_post_type','id','post_type_id');
    }
    public function F_slide(){ 
      return $this->hasMany('App\Http\Model\M_slide_img','post_id','id')->orderby('orderby','asc');
    }
    public function F_slide_2(){ 
      return $this->hasMany('App\Http\Model\M_slide_img','post_id_2','id')->orderby('orderby','asc');
    }
    public function F_file(){ 
      return $this->hasMany('App\Http\Model\M_file','post_id','id');
    }
    public function F_comment(){ 
      return $this->hasMany('App\Http\Model\M_comment','post_id','id');
    }
    public function F_code_km(){ 
      return $this->hasOne('App\Http\Model\M_gift_code','id','code_km');
    }
}