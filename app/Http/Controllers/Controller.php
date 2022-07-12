<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Model\M_regis;
use App\Http\Model\M_theme;
use App\Http\Model\M_theme_row;
use App\Http\Model\M_sidebar;
use App\Http\Model\M_job;
use App\Http\Model\M_cat;
use App\Http\Model\M_post;
use App\Http\Model\M_post_cat;
use App\Http\Model\User;
use App\Http\Model\M_menu;
use App\Http\Model\M_menu_type;
use App\Http\Model\M_config;
use App\Http\Model\M_user_type;
use App\Http\Model\M_post_type;
use App\Http\Model\M_button_ring;
use App\Http\Model\M_popup;
use App\Http\Model\M_popup_regis;
use App\Http\Model\M_tinh;
use App\Http\Model\M_huyen;
use App\Http\Model\M_gift_code;
use App\Http\Model\M_comment;
use App\Http\Model\M_order;
use App\Http\Model\M_slide_img;
use DB;
use Auth;
use Session;
use Mail;
use Cache;

class Controller extends BaseController
{
   public $productcat;
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   	function __construct(){
         $row_head = M_theme_row::orderby('orderby','asc')->where('posion','head')->where('type','custome')->where('status','on')->get();
         $row_body = M_theme_row::orderby('orderby','asc')->where('posion','body')->where('type','custome')->where('status','on')->get();
         $row_footer = M_theme_row::orderby('orderby','asc')->where('posion','footer')->where('type','custome')->where('status','on')->get();
         $sidebar = M_sidebar::orderby('orderby','asc')->where('status','on')->get();
         view()->share('row_head',$row_head);
         view()->share('row_footer',$row_footer);
         view()->share('sidebar',$sidebar);
         view()->share('row_body',$row_body);
         $button_ring = M_button_ring::where('status','on')->get();
         view()->share('button_ring',$button_ring);
         $popup_regis = M_popup_regis::where('status','on')->get()->toArray();
         view()->share('popup_regis',$popup_regis);
         $popup = M_popup::find(1);
         view()->share('popup',$popup);
         // menu admin 
         $_post_type = M_post_type::get();
         view()->share('_post_type',$_post_type);
        
      }
      
      // ajax so luong san pham gio hang 
      public function count_product(){
         $product  =  Session::get('post_cart');
         if(isset($product)){
            if(count($product) > 0){
               echo count($product);
            }else{
               echo '0';
            }
         }else{
            echo '0';
         }
      }

    public function get_home(){
       


        $theme = M_theme::where('type','home')->first();
        $title = $theme -> title_seo;
        $des = $theme -> des_seo;
        $key = $theme -> key_seo;
        $index_meta = $theme -> index_meta;

        return view('V_fontend/home',['page_type'=>'home','theme'=>$theme,'index_meta'=>$index_meta,'title'=>$title,'key'=>$key,'des'=>$des]);
    }
    public function get_contact(){
         $row = M_theme_row::where('style','contact')->first();
        $theme = M_theme::where('type','home')->first();
        $title = 'Liên hệ';
        $des = 'Liên hệ với chúng tôi';
        $key = '';
        $index_meta = '';

        return view('V_fontend/contact',['row'=>$row,'page_type'=>'home','theme'=>$theme,'index_meta'=>$index_meta,'title'=>$title,'key'=>$key,'des'=>$des]);
    }

    public function get_search(Request $request){
      $theme = M_theme::where('type','home')->first();
      $post_type = M_post_type::where('url',$request->post_type)->first();
      $key_ar = explode(' ',$request->key);
      $post_list = M_post::where('post_type_id','san-pham');
      foreach($key_ar as $key_r){
          $post_list = M_post::orwhere('title','like', '%'.$key_r.'%');
      }
      $post_list = $post_list ->get();
      
      $title = trans('message.Search '.$request->key);
      
      $key = '';
      $des = '';
      
      $index_meta = '';

      return view('V_fontend/search',['key_search'=>$request->key,'page_type'=>'search','theme'=>$theme,'index_meta'=>$index_meta,'des'=>$des,'key'=>$key,'title'=>$title,'post_list'=>$post_list]);
  }


  public function post_Contact(Request $request){
      
      $order = new M_order;
      $order -> email =  $request -> email;
      $order -> name =  $request -> name;
      $order -> tel =  $request -> tel;
      $order -> content =  $request -> content;
      $order -> address = $request -> address;
      $order -> status =  'off';

      $order -> save();

      return redirect()->back()->with('alert',trans('messages.Liên hệ thành công'));

  }
 

    public function changeLanguage(Request $request,$lang,$url) {
      $request->session()->put(['lang' => $lang]);
        if($url != 'home'){
            return redirect($lang.'/'.$url);
        }else{
            return redirect($lang);
        }
    }



      public function get_cat(Request $request, $url){
         $theme_cat = M_theme::where('type','cat')->first();
         $theme = M_theme::where('type','home')->first();
         $cat = M_cat::where('url',$url)->first();
     
   
         $post_list = M_post::whereHas('f_cat', function($q_cat) use ($cat){$q_cat->where('cat_id', $cat ->id);})->where('post.status','on')->orderby('orderby','desc')->paginate($theme_cat->count_post);
         if($cat->title_seo == ''){
            $title = $cat->name;
         }else{
            $title = $cat->title_seo;
         }
         
         $key = $cat->key;
         if($cat->des_seo == ''){
            $des = $cat->des;
         }else{
            $des = $cat->des_seo;
         }
         $index_meta = $cat -> index_meta;
         return view('V_fontend/cat',['page_type'=>'cat','theme'=>$theme,'theme_cat'=>$theme_cat,'url'=>$url,'index_meta'=>$index_meta,'des'=>$des,'key'=>$key,'title'=>$title,'post_list'=>$post_list,'cat'=>$cat]);
      }



      public function get_post($url){
         $post = M_post::where('url',$url)->first();
         $theme_post = M_theme::where('type','post') ->first();
         $theme = M_theme::where('type','home')->first();
         $post_cat = M_post_cat::where('post_id',$post->id)->first();
         $cat = M_cat::find($post_cat->cat_id);
         $post->increment('view');
         $comment_list = M_comment::where('post_id',$post->id)->paginate(10);
         $slide_list = M_slide_img::where('post_id',$post->id)->orderby('orderby','asc')->get();
         $slide_list_2 = M_slide_img::where('post_id_2',$post->id)->orderby('orderby','asc')->get();
         if($cat != ''){
            $post_relate = M_post::whereHas('f_cat', function($q_cat) use ($cat){$q_cat->where('cat_id', $cat->id);})->where('post.status','on')->paginate(12);
         }else{
            $post_relate[] ='';
         }
         if($post->title_seo == ''){
            $title = $post->title;
         }else{
            $title = $post->title_seo;
         }
         if($post->des_seo == ''){
            $des = $post->title;
         }else{
            $des = $post->des_seo;
         }
         //key
         $key = $post->key_seo;
         $product  =  Session::get('post_cart');
         if(is_array($product)){
         $count_product = count($product);
         }else{
            $count_product = 0;
         }
         
         return view('V_fontend/'.$post->f_post_type->url,['slide_list_2'=>$slide_list_2,'count_product'=>$count_product,'page_type'=>'post','slide_list'=>$slide_list,'comment_list'=>$comment_list,'theme'=>$theme,'post_relate'=>$post_relate,'theme_post'=>$theme_post,'url'=>'','cat'=>'','index_meta'=>'','title'=>$title,'key'=>$key,'des'=>$des,'post' =>$post]);
         
      }

     
}
