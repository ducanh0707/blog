<?php
namespace App\Modules\Theme\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_sidebar;
use App\Http\Model\M_theme_row;
use App\Http\Model\M_cat;
use App\Http\Model\M_form;
use App\Http\Model\M_theme;
use App\Http\Model\M_menu_type;
use Auth;
use DB;

class SidebarController extends Controller{

    public function sidebar(Request $request,$sidebar_id){
   
        $theme =  M_theme::where('type','home')->first();
        $row_first = M_theme_row::first(); 
        $sidebar_list = M_sidebar::orderby('orderby','asc')->get();
        $sidebar_first = M_sidebar::orderby('orderby','asc')->first();
        if($sidebar_first != ''){
            $sidebar_first = $sidebar_first->id;
        }else{
            $sidebar_first = 0;
        }
        $sidebar = M_sidebar::find($sidebar_id); 
        $form_list = M_form::where('status','on')->get();
        $menu_list = M_menu_type::get();
        $cat_list = M_cat::get();


        return view('Theme::theme_sidebar',['cat_list'=>$cat_list,'menu_list'=>$menu_list,'form_list'=>$form_list,'sidebar'=>$sidebar,'sidebar_first_id'=>$sidebar_first,'sidebar_id'=>$sidebar_id,'row_first_id'=>$row_first->id,'sidebar_list'=>$sidebar_list,'title'=>'Cấu hình cơ bản website','theme'=>$theme]);
    }

    public function get_theme_sidebar_new(Request $request,$sidebar_type){
        if($sidebar_type == 'img'){
            $sidebar_name = 'Hình ảnh';
        }elseif($sidebar_type == 'content'){
            $sidebar_name = 'Nội dung';
        }elseif($sidebar_type == 'video_youtube'){
            $sidebar_name = 'video';
        }elseif($sidebar_type == 'menu'){
            $sidebar_name = 'Menu';
        }elseif($sidebar_type == 'form'){
            $sidebar_name = 'Form đăng ký';
        }elseif($sidebar_type == 'tin_tuc'){
            $sidebar_name = 'Danh mục';
        }else{
            $sidebar_name = '';
        }
        $max = M_sidebar::count();
        $sidebar = new M_sidebar;
        $sidebar -> name = $sidebar_name;
        $sidebar -> type = $sidebar_type;
        $sidebar -> orderby = $max;
        $sidebar -> status = 'on';
        $sidebar -> save();
                
        return redirect('admin/theme/sidebar/'.$sidebar->id)->with('alert','Bạn đã thêm thành công');
    }

    public function post_theme_sidebar_edit(Request $request,$sidebar_id){

        if($request -> del_img.'_image_sidebar' == 'del_img'){
            $theme = M_theme_row::find($id);
            if($theme -> avatar){
               while(file_exists('source/theme/'.$theme->img)){
                  unlink('source/theme/'.$theme->img);
               }
            }
            M_sidebar::where('id',$sidebar_id)-> update(['img'=> '']);
        }else{
            if($request -> hasFile('img')){
               $img_file = $request -> file('img');
                $exten_img = $img_file -> getClientOriginalExtension();
                
               $img = $img_file -> getClientOriginalName();
                if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                  return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
                  }
               
                $i=1;
                while(file_exists('source/theme/'.$img)){
                    if($i == 1){$img = str_replace('.','-'.$i++.'.',$img); }else{$a =$i-1;$img = str_replace($a.'.',$i++.'.',$img); }
                }
           
                $img_file->move('source/theme/',$img);
                M_sidebar::where('id',$sidebar_id)-> update(['img'=>$img]);
            }
        }

        M_sidebar::where('id',$sidebar_id)->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'des' => $request->des,
            'des_en' => $request->des_en,
            'status' => $request->status,
            'cat_id' => $request->cat_id,
            'menu_id' => $request->menu_id,
            'form_id' => $request->form_id,
            'video_youtube' => $request->video_youtube,
            'content' => $request->content,
            'link' => $request->link,
            'count_post' => $request->count_post,

        ]);          
        return redirect('admin/theme/sidebar/'.$sidebar_id)->with('alert','Bạn đã thêm thành công');
    }

    public function post_theme_sidebar_order(Request $request){
        $order = explode('&',$request -> data);
        foreach($order as $order_ex){
        $order_id[] = explode('[]=',$order_ex);
        $i = 1;
        foreach($order_id as $order_in){
            $row = M_sidebar::where('id',$order_in[1])->update(['orderby'=>$i]);
            $i++;
        }
        }
    }
    public function get_theme_sidebar_del($sidebar_id){
        M_sidebar::where('id',$sidebar_id)->delete();
        $sidebar_first = M_sidebar::orderby('orderby','asc')->first(); 

        return redirect('admin/theme/sidebar/'.$sidebar_first->id)->with('alert','Bạn đã xóa thành công');
   }

}