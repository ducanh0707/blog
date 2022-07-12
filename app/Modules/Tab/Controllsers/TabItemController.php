<?php namespace App\Modules\Tab\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_tab;
use App\Http\Model\M_tab_item;
use App\Http\Model\M_slide;
use Auth;
use DB;

class TabItemController extends Controller {

    public function get_tab_item_list($tab_id){
        
        $this->authorize('tab_edit');
        
         $tab =M_tab::find($tab_id);
         $tab_item = M_tab_item::orderby('orderby','asc')->where('tab_id',$tab_id)->get();
        $slide_list = M_slide::where('status','on')->get();
         return view('Tab::V_tab_item_list',['tab'=>$tab,'slide_list'=>$slide_list,'title'=>'Danh sách tab nội dung','tab_item'=>$tab_item,'tab_id'=>$tab_id]);
     }
  
     // ajax order
     public function get_tab_item_order(Request $request,$tab_id){
         $this->authorize('tab_edit');
        $order = explode('&',$request -> data);
        foreach($order as $order_ex){
           $order_id[] = explode('[]=',$order_ex);
           $i = 1;
           foreach($order_id as $order_in){
              $widget =  M_tab_item::where('id',$order_in[1])->update(['orderby'=> $i]);
              $i++;
           }
        }
     }
  
        // them 
     public function post_tab_item_new(Request $request,$tab_id){
        $this -> validate($request,['title' => 'required',],['title.required' => 'Bạn chưa nhập tiêu đề',]);
        
        $this->authorize('tab_edit');
        if($request -> hasFile('img')){
            $img_file = $request -> file('img');
            $exten_img = $img_file -> getClientOriginalExtension();
            if($exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
            return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
            }
            $img = $img_file -> getClientOriginalName();

            $i=1;
            while(file_exists('source/tab/'.$img)){
               if($i == 1){
                  $img = str_replace('.','-'.$i++.'.',$img);
               }else{
                  $a =$i-1;
                  $img = str_replace($a.'.',$i++.'.',$img);
               }
            }
            $img_file->move('source/tab/',$img);
         
      }else{
            $img = '';
      }

        M_tab_item::insert([
            'title' => $request -> title,
            'css_id' => $request -> css_id,
            'css_class' => $request -> css_class,
            'status' => 'on',
            'des' => $request -> des,
            'button' => $request -> button,
            'content' => $request -> content,
            'icon' => $request -> icon,
            'tab_id' => $tab_id,
            'img' => $img,
            'code' => $request -> code,
            'style' => $request -> style,
        ]);
           return redirect() -> back() -> with('alert','Thêm thành công ảnh');
     }
     
     // sua 
     public function post_tab_item_edit(Request $request,$tab_id,$id){
           $this -> validate($request,['title' => 'required',],['title.required' => 'Bạn chưa nhập tiêu đề',]);
           $this->authorize('tab_edit');

            if($request -> del_img == 'del_img'){
                  $tab = M_tab_item::find($id);
                  if($slide -> img){
                     while(file_exists('source/tab/'.$tab->img)){
                        unlink('source/tab/'.$tab->img);
                     }
                  }
                 M_tab_item::where('id',$id) -> update(['img'=> '']);
            }else{
                  if($request -> hasFile('img')){
                     $img_file = $request -> file('img');
                     $exten_img = $img_file -> getClientOriginalExtension();
                     if($exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                     return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
                     }
                     $img = $img_file -> getClientOriginalName();
                     
                     $i=1;
                     while(file_exists('source/tab/'.$img)){
                        if($i == 1){
                              $img = str_replace('.','-'.$i++.'.',$img);
                        }else{
                              $a =$i-1;
                              $img = str_replace($a.'.',$i++.'.',$img);
                        }
                     }
                     $img_file->move('source/tab/',$img);
                    M_tab_item::where('id',$id) -> update(['img'=> $img]);
                  }
            }

          M_tab_item::where('id',$id)->update([
            'title' => $request -> title,
            'css_id' => $request -> css_id,
            'css_class' => $request -> css_class,
            'status' => 'on',
            'des' => $request -> des,
            'button' => $request -> button,
            'content' => $request -> content,
            'icon' => $request -> icon,
            'tab_id' => $tab_id,
            'code' => $request -> code,
            'style' => $request -> style,
        ]);
  
        return redirect() -> back() -> with('alert','Sửa thành công theme_tab');
     }
  
     // xoa 
     public function get_tab_item_del(Request $request,$tab_id,$id){
        
        $this->authorize('tab_edit');
        $tab = M_tab_item::where('id',$id)->first();

        if($tab  -> img  != '' or $tab -> img != null){
            while(file_exists('source/tab/'.$tab -> img)){
               unlink('source/tab/'.$tab -> img) ;
            }
         }
        M_tab_item::where('id',$id)->delete();
        
        return redirect() -> back() -> with('alert','Xóa thành công hình ảnh');
     }
  
      //thay doi status
      public function get_change_item_status($tab_id,$id){    
        $this->authorize('tab_edit');
        $tabitem = M_tab_item::where('id',$id)->first();

        if($tabitem -> status == 'on'){
            M_tab_item::where('id',$id)->update(['status'=> 'off']);
            return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
        }else{
            M_tab_item::where('id',$id)->update(['status'=> 'on']);
            return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
        }
     }
}
