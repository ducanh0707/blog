<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
	
class M_theme_row extends Model
{
    protected $table = "theme_row";

	public function F_slide_img(){ 
		return $this->hasMany('App\Http\Model\M_slide_img','slide_id','slide_id')->orderby('orderby','asc')->where('status','on');
	}
	public function F_slide_img_2(){ 
		return $this->hasMany('App\Http\Model\M_slide_img','slide_id','slide_id_2')->orderby('orderby','asc')->where('status','on');
	}
	public function F_tab_item(){ 
		return $this->hasMany('App\Http\Model\M_tab_item','tab_id','tab_id')->orderby('orderby','asc');
	}

	public function F_menu(){ 
		return $this->hasMany('App\Http\Model\M_menu','menu_type_id','menu_id')->orderby('orderby','asc')->where('status','on');
	}
	public function F_menu_2(){ 
		return $this->hasMany('App\Http\Model\M_menu','menu_type_id','menu_id_2')->orderby('orderby','asc')->where('status','on');
	}
	public function F_form(){ 
		return $this->hasOne('App\Http\Model\M_form','id','form_id')->orderby('id','asc') ->select('full_name','email','tel','care','request','id','noti');
	}
	public function F_form_2(){ 
		return $this->hasOne('App\Http\Model\M_form','id','form_id_2')->orderby('id','asc') ->select('full_name','email','tel','care','request','id','noti');
	}
	
	public function F_cat_id(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_id');
	}
	public function F_cat_id_2(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_id_2');
	}
	public function F_cat_id_3(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_id_3');
	}
	public function F_cat_id_4(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_id_4');
	}
	public function F_cat_list_id(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_list_id');
	}
	public function F_cat_product_id(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_product_id');
	}
	public function F_cat_product_id_2(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_product_id_2');
	}
	public function F_cat_list_id_2(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_list_id_2');
	}
	public function F_cat_post_id(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_post_id');
	}
	public function F_cat_post_id_2(){ 
		return $this->hasOne('App\Http\Model\M_cat','id','cat_post_id_2');
	}
	public function F_cat_post_sub_id(){ 
		return $this->hasMany('App\Http\Model\M_cat','parent_id','cat_post_sub_id');
	}
	public function F_cat_post_sub_id_2(){ 
		return $this->hasMany('App\Http\Model\M_cat','parent_id','cat_post_sub_id_2');
	}
}
