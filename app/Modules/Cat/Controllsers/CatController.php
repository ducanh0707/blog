<?php namespace App\Modules\Cat\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_cat;
use Auth;
use DB;

class CatController extends Controller {

    public function index() {
        $this->authorize('cat_view');
        $cat = M_cat::orderby('created_at', 'desc')->get();

        return view('Cat::index', ['cat'=> $cat, 'title'=>'Danh mục']);
    }
// moi 
    public function post_cat_new_multi(Request $request) {
        $this->authorize('cat_edit');
        $this ->validate($request,[ 'name'=> 'required', ],[ 'name.required'=> 'Bạn chưa nhập danh mục']);
        $val_array =  array_filter(preg_split('/\r\n|[\r\n]/', $request -> name));
        foreach($val_array as $val){
            $cat = new M_cat;
            $cat -> name = $val;
            $cat -> url = change_title_to_url($val);
            $cat -> parent_id = $request -> parent_id;
            $cat -> status = 'on';
            $cat -> save();
        }
        return redirect()->back()->with('alert','Bạn đã thêm thành công');
    }
    public function post_cat_new(Request $request) {
        $this->authorize('cat_edit');
        $this ->validate($request,
            [ 'name'=> 'required',
            'url'=> 'required',
            ],
            [ 'name.required'=> 'Bạn chưa nhập danh mục',
            'url.required'=> 'Bạn chưa có URL',
            ]);

        if($request -> canon=='on') {
            $canon='on';
        }
        else {
            $canon='off';
        }

        $cat = new  M_cat;
        if($request -> hasFile('img')){
            $img_file = $request -> file('img');
            $exten_img = $img_file -> getClientOriginalExtension();
            if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
            return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
            }
            $img = $img_file -> getClientOriginalName();
            $i=1;
            while(file_exists('source/cat/'.$img)){
                if($i == 1){
                    $img = str_replace('.','-'.$i++.'.',$img);
                }else{
                    $a =$i-1;
                    $img = str_replace($a.'.',$i++.'.',$img);
                }
            }
            $img_file->move('source/cat/',$img);
        
        }else{
            $img = '';
        }
        $cat ->  img = $img;

        $cat -> name =  $request -> name;
        $cat -> des_seo = $request-> des_seo;
        $cat -> des = $request-> des;
        $cat -> key_seo = $request -> key_seo;
        $cat -> title_seo = $request -> title_seo;

        $cat -> name_en =  $request -> name_en;
        $cat -> des_seo_en = $request-> des_seo_en;
        $cat -> des_en = $request-> des_en;
        $cat -> key_seo_en = $request -> key_seo_en;
        $cat -> title_seo_en = $request -> title_seo_en;

        $cat -> parent_id = $request -> parent_id;
        $cat -> theme_id = $request -> theme_id;
        $cat -> status = 'on';
        $cat -> canon = $canon;
        $cat -> index_meta = $request -> index_meta;
        $cat -> save();
        
        $cat_check= M_cat::where('url', $request -> url)->first();
        
        if($cat_check=='') {
            $cat_url=$request ->url;
        }
        else {
            $cat_url=$request ->url.'-'.$cat->id;
        }

        M_cat::where('id', $cat->id)->update(['url'=> $cat_url]);
        return redirect()->back() ->with('alert', 'Thêm thành công');
    }

// sua 
    public function post_cat_edit(Request $request, $cat_id) {
        $this->authorize('cat_edit');

        $this ->validate($request,
            [ 'name'=> 'required',
            'url'=> 'required',
            ],
            [ 'name.required'=> 'Bạn chưa nhập danh mục',
            'url.required'=> 'Bạn chưa gõ URL',
            ]);

        if($request -> canon=='on') {
            $canon='on';
        }
        else {
            $canon='off';
        }

        $cat = M_cat::find($cat_id);
        if($request -> del_img == 'del_img'){
            if($cat -> img){
               while(file_exists('source/cat/'.$cat ->img)){
                  unlink('source/cat/'.$cat ->img);
               }
            }
            $cat ->img = '';
        }
        if($request -> hasFile('img')){
            if($request -> del_img == 'del_img'){
                return '2';
                while(file_exists('source/cat/'.$cat ->img)){
                    unlink('source/cat/'.$cat ->img);
                }
               
                $cat ->img = '';
            }

            $img_file = $request -> file('img');
            $exten_img = $img_file -> getClientOriginalExtension();
            if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
            }
            $img = $img_file -> getClientOriginalName();
            
            $i=1;
            while(file_exists('source/cat/'.$img)){
                if($i == 1){
                    $img = str_replace('.','-'.$i++.'.',$img);
                }else{
                    $a =$i-1;
                    $img = str_replace($a.'.',$i++.'.',$img);
                }
            }
            $img_file->move('source/cat',$img);
            $cat ->  img = $img;
        }
        
        
        $cat -> name = $request -> name;
        $cat -> parent_id = $request -> parent_id;
        $cat -> des_seo = $request-> des_seo;
        $cat -> des = $request-> des;
        $cat -> key_seo = $request -> key_seo;
        $cat -> theme_id = $request -> theme_id;
        $cat -> title_seo = $request -> title_seo;

        $cat -> name_en =  $request -> name_en;
        $cat -> des_seo_en = $request-> des_seo_en;
        $cat -> des_en = $request-> des_en;
        $cat -> key_seo_en = $request -> key_seo_en;
        $cat -> title_seo_en = $request -> title_seo_en;
        
        $cat -> status = 'on';
        $cat -> canon = $canon;
        $cat -> index_meta = $request -> index_meta;
        $cat -> save();

        $cat_check= M_cat::where('url', $request -> url)->first();

        if(isset($cat_check -> url)) {

            if($cat_check -> id==$cat_id) {
                $cat_url=$request ->url;
            }

            else {
                $cat_url=$request ->url.'-'.$cat_id;
            }
        }

        else {
            $cat_url=$request ->url;
        }

        M_cat::where('id', $cat_id)->update(['url'=> $cat_url]);

        return redirect()->back() ->with('alert', 'Sửa thành công');
    }
// xoa 
    public function get_cat_del($id){
        $this->authorize('cat_edit');
        
        $cat_child = M_cat::where('parent_id',$id)->delete();
        $cat =  M_cat::where('id',$id)->first();
        if($cat -> img  != '' or $cat -> img != null){
            while(file_exists('source/cat/'.$cat->img)){
               unlink('source/cat/'.$cat->img) ;
            }
         }
         $cat->delete();

        return redirect()-> back() -> with('alert','Bạn đã xóa thành công');
    }
    
    //thay doi status
    public function get_change_status($id) {
        $this->authorize('cat_edit');
        $cat = M_cat::where('id', $id)->first();

        if($cat -> status=='off') {
            M_cat::where('id', $id)->update(['status'=> 'on']);
        }
        elseif ($cat -> status=='on') {
            M_cat::where('id', $id)->update(['status'=> 'off']);
        }
        return redirect() ->back() ->with('alert', 'Bạn đã thay đổi thành công');
    }

}
