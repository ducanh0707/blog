<?php
namespace App\Modules\Theme\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_sidebar;
use App\Http\Model\M_theme_row;
use App\Http\Model\M_cat;
use App\Http\Model\M_form;
use App\Http\Model\M_menu;
use App\Http\Model\M_theme;
use App\Http\Model\M_menu_type;
use App\Http\Model\M_slide;
use App\Http\Model\M_tab;
use Illuminate\Support\Facades\Storage;

use Auth;
use DB;

class ThemeController extends Controller{

    public function row(Request $request,$row_id){
        $theme =  M_theme::where('type','home')->first();
        $row_list = M_theme_row::orderby('orderby','asc')->get();
        $row = M_theme_row::find($row_id);
        $sidebar_first = M_sidebar::orderby('orderby','asc')->first(); 
        if($sidebar_first != ''){
            $sidebar_first = $sidebar_first->id;
      }else{
            $sidebar_first = 0;
      }
        $slide_list = M_slide::where('status','on')->get();
        $cat_list = M_cat::get();
        $menu_list = M_menu_type::get();
        $form_list = M_form::where('status','on')->get();
        $tab_list = M_tab::where('status','on')->get();
        $cat_list = M_cat::where('status','on')->get();

        $row_first = M_theme_row::orderby('orderby','asc')->first();
        if($row_first == null){
         $row_first_id = 0;
        }else{
         $row_first_id = $row_first->id;
        }

      return view('Theme::theme_row',['row_first_id'=>$row_first_id,'sidebar_first_id'=>$sidebar_first,'cat_list'=>$cat_list,'tab_list'=>$tab_list,'row'=>$row,'row_id'=>$row_id,'form_list'=>$form_list,'menu_list'=>$menu_list,'cat_list'=>$cat_list,'slide_list'=>$slide_list,'row_list'=>$row_list,'title'=>'Cấu hình cơ bản website','theme'=>$theme]);
    }

    public function post_theme_row_new(Request $request){
        $this -> validate($request, [ 'name' => 'required', ], [ 'name.required' => 'Bạn chưa nhập tên row', ]);
   
         $max = M_theme_row::count();
         $theme_row = new M_theme_row;
         $theme_row -> name = $request -> name;
         $theme_row -> orderby = (int)$max + 1;
         $theme_row -> width = $request -> width;
         $theme_row -> status = 'on';
         $theme_row -> type = $request -> type;
         $theme_row -> positon = $request -> positon;
         $theme_row -> posion = $request -> posion;
         $theme_row -> style = $request -> style;
         $theme_row -> title = $request -> title;
         $theme_row -> title_2 = $request -> title_2;
         if($request -> feild != ''){
            $theme_row -> feild = json_encode($request -> feild);
         }else{
            $theme_row -> feild = null;
         }
         $theme_row -> save();
        return redirect('admin/theme/row/'.$theme_row->id) -> with('alert','Thêm thành công');
     }
  
     // sua row 
     public function post_theme_row_edit(Request $request,$row_id){
        $this -> validate($request, [ 'name' => 'required', ], [ 'name.required' => 'Bạn chưa nhập tên row', ]);
        if($request -> del_img == 'del_img'){
            $theme = M_theme_row::find($row_id);
            if($theme ->img){
               while(file_exists('source/theme/'.$theme->img)){
                  unlink('source/theme/'.$theme->img);
               }
            }
            M_theme_row::where('id',$row_id) -> update(['img'=> '']);
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
                M_theme_row::where('id',$row_id) -> update(['img'=>$img]);
            }
        }

        if($request -> del_img_2 == 'del_img_2'){
            $theme = $connect -> table('theme_row') ->find($row_id);
            if($theme -> img_2){
               while(file_exists('source/theme/'.$theme->img_2)){
                  unlink('source/theme/'.$theme->img_2);
               }
            }
            M_theme_row::where('id',$row_id) -> update(['img_2'=> '']);
         }else{
            if($request -> hasFile('img_2')){
                  $img_file = $request -> file('img_2');
                  $exten_img = $img_file -> getClientOriginalExtension();
                  if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                  return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
                  }
                  $img_2 = $img_file -> getClientOriginalName();
               
                  $i=1;
                  while(file_exists('source/theme/'.$img_2)){
                     if($i == 1){$img_2 = str_replace('.','-'.$i++.'.',$img_2); }else{$a =$i-1;$img_2 = str_replace($a.'.',$i++.'.',$img_2); }
                  }
                  $img_file->move('source/theme/',$img_2);
                  M_theme_row::where('id',$row_id) -> update(['img_2'=>$img_2]);
            }else{
               
            }
         }

         if($request -> del_img_bg == 'del_img_bg'){
            $theme = $connect -> table('theme_row') ->find($row_id);
               if($theme -> img_bg){
                  while(file_exists('source/theme/'.$theme->img_bg)){
                     unlink('source/theme/'.$theme->img_bg);
                  }
               }
               M_theme_row::where('id',$row_id) -> update(['img_bg'=> '']);
         }else{
            if($request -> hasFile('img_bg')){
               $img_file = $request -> file('img_bg');
               $exten_img = $img_file -> getClientOriginalExtension();
               if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
               return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
               }
               $img_bg = $img_file -> getClientOriginalName();
               
               $i=1;
               while(file_exists('source/theme/'.$img_bg)){
                  if($i == 1){$img_bg = str_replace('.','-'.$i++.'.',$img_bg); }else{$a =$i-1;$img_bg = str_replace($a.'.',$i++.'.',$img_bg); }
               }
               $img_file->move('source/theme/',$img_bg);
               M_theme_row::where('id',$row_id) -> update(['img_bg'=>$img_bg]);
            }
      }

      $theme_row = M_theme_row::find($row_id);
      $theme_row -> name = $request -> name;
      $theme_row -> width = $request -> width;
      $theme_row -> effect = $request -> effect;
      $theme_row -> effect_2 = $request -> effect_2;
      $theme_row -> status = 'on' ;
      // $theme_row -> type = $request -> type;
      $theme_row -> positon = $request -> positon;
      $theme_row -> link_img = $request -> link_img;
      $theme_row -> style = $request -> style;
      $theme_row -> link_img_2 = $request -> link_img_2;
      $theme_row -> title = $request -> title;
      $theme_row -> title_2 = $request -> title_2;
      $theme_row -> des = $request -> des;
      $theme_row -> des_2 = $request -> des_2;
      $theme_row -> link = $request -> link;
      $theme_row -> height = $request -> height;
      $theme_row -> content = $request -> content;
      $theme_row -> content_2 = $request -> content_2;

      $theme_row -> content_en = $request -> content_en;
      $theme_row -> content_2_en = $request -> content_2_en;
      $theme_row -> des_en = $request -> des_en;
      $theme_row -> des_2_en = $request -> des_2_en;
      $theme_row -> title_en = $request -> title_en;
      $theme_row -> title_2_en = $request -> title_2_en;
  

      $theme_row -> slide_id = $request -> slide_id;
      $theme_row -> slide_id_2 = $request -> slide_id_2;
      $theme_row -> tab_id = $request -> tab_id;
      $theme_row -> tab_id_2 = $request -> tab_id_2;
      $theme_row -> form_id = $request -> form_id;
      $theme_row -> form_id_2 = $request -> form_id_2;
      $theme_row -> menu_id = $request -> menu_id;
      $theme_row -> menu_id_2 = $request -> menu_id_2;
      $theme_row -> video_youtube = $request -> video_youtube;
      $theme_row -> cat_id = $request -> cat_id;
      $theme_row -> cat_id_2 = $request -> cat_id_2;
      $theme_row -> cat_id_3 = $request -> cat_id_3;
      $theme_row -> cat_id_4 = $request -> cat_id_4;
      $theme_row -> col_1 = $request -> col_1;
      $theme_row -> col_2 = $request -> col_2;
      $theme_row -> col_3 = $request -> col_3;
      $theme_row -> col_4 = $request -> col_4;
      $theme_row -> posion = $request -> posion;
      $theme_row -> bg = $request -> bg;
      $theme_row -> display = $request -> display;
      $theme_row -> title_color = $request -> title_color;
      $theme_row -> map_code = $request -> map_code;
      $theme_row -> map_code_2 = $request -> map_code_2;
      $theme_row -> facebook_fanpage = $request -> facebook_fanpage;
      $theme_row -> cat_product_id = $request -> cat_product_id;
      $theme_row -> cat_product_id_2 = $request -> cat_product_id_2;
      $theme_row -> cat_list_id_2 = $request -> cat_list_id_2;
      $theme_row -> cat_list_id = $request -> cat_list_id;
      $theme_row -> cat_post_sub_id = $request -> cat_post_sub_id;
      $theme_row -> cat_post_sub_id_2 = $request -> cat_post_sub_id_2;
      $theme_row -> cat_post_id = $request -> cat_post_id;
      $theme_row -> cat_post_id_2 = $request -> cat_post_id_2;
      if($request -> feild != ''){
         $theme_row -> feild = json_encode($request -> feild);
      }else{
         $theme_row -> feild = null;
      }
      $theme_row -> icon_text = json_encode($request -> icon_text);

      $theme_row -> save();
  
        return redirect('admin/theme/row/'.$row_id) -> with('alert','Thêm thành công');
     }
  
     public function post_theme_row_order(Request $request){
        $order = explode('&',$request -> data);
        foreach($order as $order_ex){
           $order_id[] = explode('[]=',$order_ex);
           $i = 1;
           foreach($order_id as $order_in){
              $row = M_theme_row::where('id',$order_in[1])->update(['orderby'=>$i]);
              $i++;
           }
        }
     }
  
     public function get_theme_row_del(Request $request,$row_id){
        $row = M_theme_row::where('id',$row_id)->first();
        // xoa anh 
        if($row -> img  != '' or $row -> img != null){
            while(file_exists('source/theme/'.$row -> img)){
               unlink('source/theme/'.$row -> img) ;
            }
         }
        if($row -> img_2  != '' or $row -> img_2 != null){
            while(file_exists('source/theme/'.$row -> img_2)){
               unlink('source/theme/'.$row -> img_2) ;
            }
         }
         if($row -> img_bg  != '' or $row -> img_bg != null){
            while(file_exists('source/theme/'.$row -> img_bg)){
               unlink('source/theme/'.$row -> img_bg) ;
            }
         }

         M_theme_row::where('id',$row_id)->delete();
        $row_first = M_theme_row::orderby('orderby','asc')->first(); 
        return redirect('admin/theme/row/'.$row_first->id) -> with('alert','Bạn đã xóa thành công');
     }
  
  
     public function get_change_status($row_id){
        $row = M_theme_row::where('id', $row_id) -> first();
        if($row -> status == 'off'){
           M_theme_row::where('id', $row_id) -> update(['status' => 'on']);
           return redirect() ->back() -> with('alert','Bạn đã thay đổi thành công');
        }
        elseif ($row -> status == 'on'){
           M_theme_row::where('id', $row_id) -> update(['status' => 'off']);
           return redirect() ->back() -> with('alert','Bạn đã thay đổi thành công');
        }
      }//ket thuc doi status

}
