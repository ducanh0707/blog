<?php
namespace App\Modules\Theme\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_theme;
use App\Http\Model\M_sidebar;
use App\Http\Model\M_popup;
use App\Http\Model\M_button_ring;
use App\Http\Model\M_theme_row;
use Auth;
use DB;

class InfoController extends Controller{
 
   public function info(Request $request){     
        $row_first =M_theme_row::orderby('orderby','asc')->first(); 
        $sidebar_first =M_sidebar::orderby('orderby','asc')->first(); 
        $sidebar_first =M_sidebar::orderby('orderby','asc')->first();
        if($sidebar_first != ''){
            $sidebar_first = $sidebar_first->id;
        }else{
            $sidebar_first = 0;
        } 
        $theme = M_theme::where('type','home')->first();
        $row_list =M_theme_row::get();
        $popup = M_popup::get();
        $buton_ring =M_button_ring::get();

        return view('Theme::theme_info',['buton_ring'=>$buton_ring,'popup'=>$popup,'sidebar_first_id'=>$sidebar_first,'row_first_id'=>$row_first->id,'row_list'=>$row_list,'title'=>'Cấu hình cơ bản website','theme'=>$theme]);
   }

   public function info_edit(Request $request){
        if($request -> del_img == 'del_img'){
            $theme =M_theme::where('type','home')->first();
            if($theme -> favicon){
            while(file_exists('source/theme/'.$theme->favicon)){
               unlink('source/theme/'.$theme->favicon);
            }
         }
         M_theme::where('type','home')-> update(['favicon'=> '']);
        }else{
            if($request -> hasFile('img')){
                $img_file = $request -> file('img');
                $exten_img = $img_file -> getClientOriginalExtension();
                
                $img = $img_file -> getClientOriginalName();
                if($exten_img != 'webp' && $exten_img != 'ico' && $exten_img != 'ICO' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
                }
                
                $i=1;
                while(file_exists('source/theme/'.$img)){
                    if($i == 1){$img = str_replace('.','-'.$i++.'.',$img); }else{$a =$i-1;$img = str_replace($a.'.',$i++.'.',$img); }
                }
            
                $img_file->move('source/theme/',$img);
                M_theme::where('type','home')-> update(['favicon'=>$img]);
            }
        }

        if($request -> del_img_2 == 'del_img_2'){
            $theme =M_theme::where('type','home')->first();
            if($theme -> og_image){
            while(file_exists('source/theme/'.$theme->og_image)){
               unlink('source/theme/'.$theme->og_image);
            }
         }
         M_theme::where('type','home')-> update(['og_image'=> '']);
        }else{
            if($request -> hasFile('og_image')){
                $img_file = $request -> file('og_image');
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
                M_theme::where('type','home')-> update(['og_image'=>$img]);
            }
        }
    
        $button_ring = M_button_ring::get();
        foreach($button_ring as $br){
            M_button_ring::where('id',$br->id)->update(['status'=>'off']);
        }
        if(is_array($request->button_ring)){
            M_button_ring::wherein('id',$request->button_ring)->update(['status'=>'on']);
        }
       M_theme::where('type','home')->update([
           'title_seo'=> $request->title_seo,
           'des_seo'=> $request->des_seo,
           'key_seo'=> $request->key_seo,
           'index_meta'=> $request->index_meta,
           'head'=> $request->head,
           'popup'=> $request->popup,
           'popup_regis'=> $request->popup_regis,
           'contact'=> $request->contact,
           'contact_en'=> $request->contact_en,
           'title_seo_en'=> $request->title_seo_en,
           'des_seo_en'=> $request->des_seo_en,
           'key_seo_en'=> $request->key_seo_en,
       
        ]);
        return redirect()->back()->with('alert','Lưu thành công');
    }
}
