<?php namespace App\Modules\PostType\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_post_type;
use Auth;
use DB;

class PostTypeController extends Controller {
   public function index(){
      $this->authorize('post_type_view');
      $post_type = M_post_type::paginate(25);

		return view('PostType::index',['title'=>'Danh sách thể loại','post_type'=>$post_type]);
   }

   public function post_post_type_new(Request $request){
      $this->authorize('post_type_edit');
      $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);
      

      $post_type = new M_post_type;
      $post_type -> name = $request -> name;
      $post_type -> url = $request -> url;
      $post_type -> icon = $request -> icon;
      if($request -> feild != ''){
         $post_type -> feild = json_encode($request -> feild);
      }else{
         $post_type -> feild = null;
      }
      $post_type ->save();

      return redirect() -> back() -> with('alert','Thêm thành công post_type');
   }

   // sua 
   public function post_post_type_edit(Request $request,$post_type_id){
      $this->authorize('post_type_edit');
      $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);

      $post_type = M_post_type::find($post_type_id);
      $post_type -> name = $request -> name;
      $post_type -> url = $request -> url;
      $post_type -> icon = $request -> icon;
      if($request -> feild != ''){
         $post_type  -> feild = json_encode($request -> feild);
      }else{
         $post_type  -> feild = null;
      }
      $post_type ->save();
   
      return redirect() -> back() -> with('alert','Sửa thành công post_type');
   }

   // xoa 
   public function get_post_type_del(Request $request,$post_type_id){
      $this->authorize('post_type_edit');
      M_post_type::where('id',$post_type_id)->delete();
      
      return redirect() -> back() -> with('alert','Xóa thành công post_type');
   }
}
