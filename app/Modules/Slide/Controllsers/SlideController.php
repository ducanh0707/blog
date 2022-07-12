<?php namespace App\Modules\Slide\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_slide;
use App\Http\Model\M_slide_img;
use Auth;
use DB;

class SlideController extends Controller {
    public function index(){
        $this->authorize('slide_view');
        $slide = M_slide::all();
  
        return view('Slide::index',['title'=>'Danh sách slide','slide'=>$slide]);
     }
  
        // them 
     public function post_slide_new(Request $request){
        $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);
        $this->authorize('slide_edit');
        M_slide::insert([
           'name' => $request -> name,
           'css_id' => $request -> css_id,
              'css_class' => $request -> css_class,
              'status' => 'on',
           'des' => $request -> des,
           'type' => $request -> type,
        ]);
           return redirect() -> back() -> with('alert','Thêm thành công slide');
     }
     
     // sua 
     public function post_slide_edit(Request $request,$slide_id){
        $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);
        $this->authorize('slide_edit');
  
        M_slide::where('id',$slide_id)->update([
           'name' => $request -> name,
           'css_id' => $request -> css_id,
            'css_class' => $request -> css_class,
            'status' => 'on',
           'des' => $request -> des,
           'type' => $request -> type,
        ]);
        return redirect() -> back() -> with('alert','Sửa thành công slide');
     }
  
     // xoa 
     public function get_slide_del(Request $request,$slide_id){
         $this->authorize('slide_edit');
  
         M_slide_img::where('slide_id',$slide_id)->delete();
         M_slide::where('id',$slide_id) -> delete();
        
        return redirect() -> back() -> with('alert','Xóa thành công slide');
     }
  
      //thay doi status
      public function get_change_status($id){
         $this->authorize('slide_edit');
         $slide = M_slide::where('id',$id)->first();
         if($slide -> status == 'on'){
           M_slide::where('id',$id)->update(['status'=> 'off']);
            return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
         }else{
           M_slide::where('id',$id)->update(['status'=> 'on']);
            return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
         }
     }
}
