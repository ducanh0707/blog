<?php
namespace App\Modules\Theme\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_sidebar;
use App\Http\Model\M_theme_row;
use App\Http\Model\M_theme;
use Auth;
use DB;

class StyleController extends Controller{
 
   public function style(Request $request){      
        $row_first = M_theme_row::orderby('orderby','asc')->first(); 
        $sidebar_first = M_sidebar::orderby('orderby','asc')->first(); 
        $sidebar_first =M_sidebar::orderby('orderby','asc')->first();
        if($sidebar_first != ''){
            $sidebar_first = $sidebar_first->id;
        }else{
            $sidebar_first = 0;
        } 
        $theme =  M_theme::where('type','home')->first();
        $row_list = M_theme_row::get();

      return view('Theme::theme_style',['sidebar_first_id'=>$sidebar_first,'row_first_id'=>$row_first->id,'row_list'=>$row_list,'title'=>'Cấu hình cơ bản website','theme'=>$theme]);
   }

   public function style_edit(Request $request){
        if($request -> del_img.'_img_bg' == 'del_img'){
         $theme = M_theme_row::find($id);
            if($theme -> img){
               while(file_exists('source/theme/'.$theme->img)){
                  unlink('source/theme/'.$theme->img);
               }
            }
            M_theme::where('type','home')-> update(['bg_img'=> '']);
        }else{
            if($request -> hasFile('bg_img')){
               $img_file = $request -> file('bg_img');
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
                M_theme::where('type','home') -> update(['bg_img'=>$img]);
            }
        }

         if($request -> del_img.'_img_bg_2' == 'del_img'){
            $theme = M_theme_row::find($id);
               if($theme -> bg_img_2){
                  while(file_exists('source/theme/'.$theme->bg_img_2)){
                     unlink('source/theme/'.$theme->bg_img_2);
                  }
               }
               M_theme::where('type','home')-> update(['bg_img_2'=> '']);
         }else{
               if($request -> hasFile('bg_img_2')){
                  $img_file = $request -> file('bg_img_2');
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
                  M_theme::where('type','home') -> update(['bg_img_2'=>$img]);
               }
         }

        M_theme::where('type','home')->update([
           'bg_color'=> $request->bg_color,
           'bg_color_1'=> $request->bg_color_1,
           'bg_color_2'=> $request->bg_color_2,
           'bg_color_3'=> $request->bg_color_3,
           'title_color'=> $request->title_color,
           'title_color_1'=> $request->title_color_1,
           'title_color_2'=> $request->title_color_2,
           'title_color_3'=> $request->title_color_3,
           'button_color'=> $request->button_color,
           'button_color_1'=> $request->button_color_1,
           'button_color_2'=> $request->button_color_2,
           'button_color_3'=> $request->button_color_3,
           'border_color'=> $request->border_color,
           'border_color_1'=> $request->border_color_1,
           'border_color_2'=> $request->border_color_2,
           'border_color_3'=> $request->border_color_3,
           'h1'=> $request->h1,
           'h2'=> $request->h2,
           'h3'=> $request->h3,
           'h4'=> $request->h4,
           'h5'=> $request->h5,
           'h6'=> $request->h6,
           'text_font'=> $request->text_font,
           'button_font'=> $request->button_font,
           'des_font'=> $request->des_font,
           'text_family'=> $request->text_family,
           'title_family'=> $request->title_family,
        ]);
        return redirect()->back()->with('alert','Lưu thành công');
    }
    
}