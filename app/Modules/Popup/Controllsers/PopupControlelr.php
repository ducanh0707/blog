<?php namespace App\Modules\Popup\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_popup;
use App\Http\Model\M_form;
use Auth;
use DB;

class PopupController extends Controller {
   public function index(){
      $this->authorize('popup_view');
      $popup = M_popup::paginate(25);
      $form_list = M_form::all();

		return view('Popup::index',['title'=>'Danh sách Sơ đồ','popup'=>$popup,'form_list'=>$form_list]);
   }
      // theme
   public function post_popup_new(Request $request){
      $this->authorize('popup_edit');
      $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);

      if($request -> hasFile('img')){
            $img_file = $request -> file('img');
            $exten_img = $img_file -> getClientOriginalExtension();
            if($exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
            return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
            }
            $img = $img_file -> getClientOriginalName();
        
            $i=1;
            while(file_exists('source/popup/'.$img)){
               if($i == 1){
                  $img = str_replace('.','-'.$i++.'.',$img);
               }else{
                  $a =$i-1;
                  $img = str_replace($a.'.',$i++.'.',$img);
               }
            }
            $img_file->move('source/popup/',$img);
         
      }else{
            $img = '';
      }

      M_popup::insert([
         'name' => $request -> name,
         'form_id' => $request -> form_id,
         'size' => $request -> size,
         'status' => $request -> status,
         'status_mobile' => $request -> status_mobile,
         'img' => $img,
         'style' => $request -> style,
         'link' => $request -> link,
         'time_deylay' => $request -> time_deylay,
         'time_cookie' => $request -> time_cookie,
      ]);

      return redirect() -> back() -> with('alert','Thêm thành công popup');
   }

   // sua 
   public function post_popup_edit(Request $request,$popup_id){
      $this->authorize('popup_edit');
      $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);

      if($request -> del_img == 'del_img'){
         $slide = M_slide_img::find($id);
         if($slide -> img){
            while(file_exists('source/popup/'.$slide->img)){
               unlink('source/popup/'.$slide->img);
            }
         }
        M_popup::where('id',$popup_id) -> update(['img'=> '']);
      }else{
         if($request -> hasFile('img')){
            $img_file = $request -> file('img');
            $exten_img = $img_file -> getClientOriginalExtension();
            if($exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
            return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
            }
            $img = $img_file -> getClientOriginalName();
            
            $i=1;
            while(file_exists('source/popup/'.$img)){
               if($i == 1){
                     $img = str_replace('.','-'.$i++.'.',$img);
               }else{
                     $a =$i-1;
                     $img = str_replace($a.'.',$i++.'.',$img);
               }
            }
            $img_file->move('source/popup/',$img);
           M_popup::where('id',$popup_id) -> update(['img'=> $img]);
         }
      }

      M_popup::where('id',$popup_id)->update([
         'name' => $request -> name,
         'form_id' => $request -> form_id,
         'size' => $request -> size,
         'status' => $request -> status,
         'status_mobile' => $request -> status_mobile,
         'style' => $request -> style,
         'link' => $request -> link,
         'time_deylay' => $request -> time_deylay,
         'time_cookie' => $request -> time_cookie,
      ]);

   
      return redirect() -> back() -> with('alert','Sửa thành công popup');
   }

   // xoa 
   public function get_popup_del(Request $request,$popup_id){
      $this->authorize('popup_edit');
      $poup =M_popup::where('id',$popup_id)->first();

      if($poup -> img  != '' or $poup -> img != null){
         while(file_exists('source/popup/'.$poup-> img)){
            unlink('source/popup/'.$poup -> img) ;
         }
      }
      M_popup::where('id',$popup_id)->delete();
      
      return redirect() -> back() -> with('alert','Xóa thành công popup');
   }

    //thay doi status
    public function get_change_status($id){
      $this->authorize('popup_edit');

      $slide = M_popup::where('id',$id)->first();
      if($slide -> status == 'on'){
         M_popup::where('id',$id)->update(['status'=> 'off']);
         return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
      }else{
         M_popup::where('id',$id)->update(['status'=> 'on']);
         return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
      }
   }
}
