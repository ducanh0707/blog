<?php namespace App\Modules\Tab\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_tab;
use Auth;
use DB;

class TabController extends Controller {
   public function index(){
      $this->authorize('tab_view');
      $tab = M_tab::paginate(25);

		return view('Tab::index',['title'=>'Danh sách Sơ đồ','tab'=>$tab]);
   }
      // theme
   public function post_tab_new(Request $request){
     	$this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);
      $this->authorize('tab_edit');
      M_tab::insert([
         'name' => $request -> name,
         'css_id' => $request -> css_id,
         'css_class' => $request -> css_class,
         'status' => 'on',
         'des' => $request -> des,
         'type' => $request -> type,
      ]);

      return redirect() -> back() -> with('alert','Thêm thành công sơ đồ');
   }

   // sua 
   public function post_tab_edit(Request $request,$tab_id){
     	$this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);  
      $this->authorize('tab_edit');
      M_tab::where('id',$tab_id)->update([
         'name' => $request -> name,
         'css_id' => $request -> css_id,
         'css_class' => $request -> css_class,
         'status' => 'on',
         'des' => $request -> des,
         'type' => $request -> type,
      ]);
   
      return redirect() -> back() -> with('alert','Sửa thành công tab');
   }

   // xoa 
   public function get_tab_del(Request $request,$tab_id){
      $this->authorize('tab_edit');
      M_tab::where('id',$tab_id)->delete();
      return redirect() -> back() -> with('alert','Xóa thành công tab');
   }

    //thay doi status
    public function get_change_status($id){
      
      $this->authorize('tab_edit');
      
      $slide = M_tab::where('id',$id)->first();
      if($slide -> status == 'on'){
         M_tab::where('id',$id)->update(['status'=> 'off']);
         return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
      }else{
         M_tab::where('id',$id)->update(['status'=> 'on']);
         return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
      }
   }
}
