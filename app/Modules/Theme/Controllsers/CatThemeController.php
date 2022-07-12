<?php
namespace App\Modules\Theme\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_theme;
use App\Http\Model\M_sidebar;
use App\Http\Model\M_theme_row;
use Auth;
use DB;

class CatThemeController extends Controller{

    public function index(Request $request){
  
        $theme_cat =  M_theme::where('type','cat')->first();
        $sidebar_first =M_sidebar::orderby('orderby','asc')->first();
        if($sidebar_first != ''){
            $sidebar_first = $sidebar_first->id;
        }else{
            $sidebar_first = 0;
        } 
        $row_first =M_theme_row::orderby('orderby','asc')->first(); 
       
        return view('Theme::theme_cat',['sidebar_first_id'=>$sidebar_first,'row_first_id'=>$row_first->id,'title'=>'Sửa giao diện danh mục','theme_cat'=>$theme_cat]);
    }

   
    public function post_theme_cat_edit(Request $request){
        if($request -> del_img == 'del_img'){
            $cat_img =  M_theme::where('type','cat')->first();
            if($cat_img -> cat_img){
               while(file_exists('source/theme/'.$cat_img ->cat_img)){
                  unlink('source/theme/'.$cat_img ->cat_img);
               }
            }
            M_theme::where('type','cat')->update(['cat_img' => '']);
         }else{
            if($request -> hasFile('img')){
               $img_file = $request -> file('img');
               $exten_img = $img_file -> getClientOriginalExtension();
               if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                    return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
               }
               $img = $img_file -> getClientOriginalName();
               
               $i=1;
               while(file_exists('source/theme/'.$img)){
                  if($i == 1){
                        $img = str_replace('.','-'.$i++.'.',$img);
                  }else{
                        $a =$i-1;
                        $img = str_replace($a.'.',$i++.'.',$img);
                  }
               }
               $img_file->move('source/theme',$img);
               M_theme::where('type','cat')->update(['cat_img' => $img]);
            }
        }

        M_theme::where('type','cat')->update([
            'style' => $request->style,
            'count_post' => $request->count_post,
            'order_post' => $request->order_post,
            'width'=> $request->width,
            'col_1'=> $request->col_1,
            'col_2'=> $request->col_2,
        ]);          
        return redirect('admin/theme/cat')->with('alert','Bạn đã thêm thành công');
    }

   

}