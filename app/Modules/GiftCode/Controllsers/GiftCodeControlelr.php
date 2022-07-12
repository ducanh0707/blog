<?php namespace App\Modules\GiftCode\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_gift_code;
use Auth;
use DB;
use Carbon\Carbon;

class GiftCodeController extends Controller {
   public function index(){
      $this->authorize('gift_code_view');
      $gift_code = M_gift_code::where('parent_id',0)->paginate(25);

		return view('GiftCode::index',['title'=>'Danh sách mã giảm giá','gift_code'=>$gift_code]);
   }

   public function post_gift_code_new(Request $request){
      $this->authorize('gift_code_edit');
      
      $this -> validate($request,
      ['name' => 'required','code'=>'required|unique:gift_code,code'],
      ['name.required' => 'Bạn chưa nhập tiêu đề','code.required' => 'Bạn chưa nhập mã khuyến mại', 'code.unique'=> 'Mã khuyến mại trùng lặp']);

      $gift_code = new M_gift_code;
      $gift_code -> name = $request -> name;
      $gift_code -> code = $request -> code;
      $gift_code -> type = $request -> type;
      $gift_code -> one_time = $request -> one_time;
      $gift_code -> percent = $request -> percent;
      $gift_code -> price = $request -> price;
      if($request -> deadline != ''){
         $dead =  new Carbon($request -> deadline);
         $gift_code -> deadline = $dead;
      }
      $gift_code -> status = 'on';
      $gift_code ->save();

      return redirect() -> back() -> with('alert','Thêm thành công gift_code');
   }

   // sua 
   public function post_gift_code_edit(Request $request,$gift_code_id){
      $this->authorize('gift_code_edit');
      $this -> validate($request,['name' => 'required','code'=>'required|unique:gift_code,code,'.$gift_code_id],
      ['name.required' => 'Bạn chưa nhập tiêu đề','code.required' => 'Bạn chưa nhập mã khuyến mại', 'code.unique'=> 'Mã khuyến mại trùng lặp']);

      $gift_code = M_gift_code::find($gift_code_id);
      $gift_code -> name = $request -> name;
      $gift_code -> code = $request -> code;
      $gift_code -> type = $request -> type;
      $gift_code -> one_time = $request -> one_time;
      $gift_code -> percent = $request -> percent;
      if($request -> deadline != ''){
         $dead =  new Carbon($request -> deadline);
         $gift_code -> deadline = $dead;
      }
      $gift_code -> price = $request -> price;
      $gift_code ->save();
   
      return redirect() -> back() -> with('alert','Sửa thành công gift_code');
   }

   // xoa 
   public function get_gift_code_del(Request $request,$gift_code_id){
      $this->authorize('gift_code_edit');
      M_gift_code::where('id',$gift_code_id)->delete();
      
      return redirect() -> back() -> with('alert','Xóa thành công gift_code');
   }

   public function get_change_status($id){
      $gift_code = M_gift_code::where('id',$id)->first();

      if($gift_code -> status == 'off'){
         M_gift_code::where('id',$id)->update(['status' => 'on']);
      }
      elseif ($gift_code -> status == 'on'){
         M_gift_code::where('id',$id)->update(['status' => 'off']);
      }
      return redirect() -> back() -> with('alert','Bạn đã thay đổi thành công');
   }

    public function get_gift_code_list($id){
        $gift_code = M_gift_code::where('id',$id)->first();
        $gift_code_child = M_gift_code::where('parent_id',$id)->orderby('id','desc')->paginate(20);

        return view('GiftCode::gift_code_child',['title'=>'Mã giảm giá 1 lần','gift_code'=>$gift_code,'gift_code_child'=>$gift_code_child]);
    }
    public function get_gift_code_list_new(Request $request,$id){
        $gift_code_parent = M_gift_code::where('id',$id)->first();
        for($i=1;$i<=$request->count;$i++){
            $random =  substr(md5(mt_rand()), 0, 2);
            $gift_code = new M_gift_code;
            $gift_code -> parent_id = $gift_code_parent->id;
            $gift_code -> one_time = 'on';
            $gift_code -> deadline = $gift_code_parent -> deadline;
            $gift_code -> type = $gift_code_parent -> type;
            $gift_code -> percent =  $gift_code_parent -> percent;
            $gift_code -> price =  $gift_code_parent -> price;
            $gift_code -> status = 'on';

            $gift_code -> save();
            $gift_code -> code = $gift_code_parent->code.'_'.$gift_code->id.'_'.$i.$random;
            $gift_code-> save();
        }

        return redirect() -> back() -> with('alert','Bạn đã thêm thành công');
    }
    public function get_gift_code_list_del(Request $request,$id,$id_child){
        M_gift_code::where('id',$id_child)->delete();

        return redirect() -> back() -> with('alert','Bạn đã xóa thành công');
    }
}
