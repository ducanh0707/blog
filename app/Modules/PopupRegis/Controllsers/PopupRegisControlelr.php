<?php namespace App\Modules\PopupRegis\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_popup_regis;
use Auth;
use DB;

class PopupRegisController extends Controller {
   public function index(){
      $this->authorize('popup_regis_view');
      $popup_regis = M_popup_regis::orderby('id','desc')->paginate(25);


		return view('PopupRegis::index',['title'=>'Danh sách khách hàng','popup_regis'=>$popup_regis]);
   }

   public function post_popup_regis_new(Request $request){
      $this->authorize('popup_regis_edit');
      $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);

      M_popup_regis::insert([
        'name' => $request -> name,
        'tel' => $request -> tel,
        'email' => $request -> emails,
        'status' => 'on',
        'noti' => $request -> noti,
      ]);    
    
   
    return redirect() -> back() -> with('alert','Thêm thành công khách hàng');
 }

   // sua 
   public function post_popup_regis_edit(Request $request,$popup_regis_id){
         $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);
         $this->authorize('popup_regis_edit');

         M_popup_regis::where('id',$popup_regis_id)->update([
            'name' => $request -> name,
            'tel' => $request -> tel,
            'email' => $request -> emails,
            'status' => 'on',
            'noti' => $request -> noti,
          ]);

      return redirect() -> back() -> with('alert','Sửa thành công popup khách hàng');
   }

   // xoa 
   public function get_popup_regis_del(Request $request,$popup_regis_id){
        $this->authorize('popup_regis_edit');
        M_popup_regis::where('id',$popup_regis_id)-> delete();
      
      return redirect() -> back() -> with('alert','Xóa thành công popup_regis');
   }

   //thay doi status
   public function get_change_status($id){
    $this->authorize('popup_regis_edit');

       $popup_regis = M_popup_regis::find($id);
      if($popup_regis -> status == 'on'){
        M_popup_regis::where('id',$id)->update(['status'=> 'off']);
        return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
     }else{
        M_popup_regis::where('id',$id)->update(['status'=> 'on']);
        return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
     }
   }
    
}
