<?php namespace App\Modules\Menu\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_menu_type;
use App\Http\Model\M_menu;
use Auth;
use DB;

class MenuTypeController extends Controller {
   public function post_menu_type_new(Request $request){
      $this->authorize('menu_edit');
      $max = M_menu_type::count();
      $menu_type = new M_menu_type;
      $menu_type -> name = $request -> name; 
      $menu_type -> class_nav = $request -> class_nav; 
      $menu_type -> id_nav = $request -> id_nav; 
      $menu_type -> class_ul = $request -> class_ul; 
      $menu_type -> id_ul = $request -> id_ul; 
      $menu_type -> class_li = $request -> class_li; 
      $menu_type -> id_li = $request -> id_li; 
      $menu_type -> class_a = $request -> class_a; 
      $menu_type -> id_a = $request -> id_a; 
      $menu_type -> attri = $request -> attri; 
      $menu_type -> def = $request -> def; 
      $menu_type -> status = 'on'; 
      $menu_type -> orderby = (int)$max + 1; 
      $menu_type -> save();

      M_menu_type::where('id',$menu_type->id)->update(['url'=>'menu_'.$menu_type->id]);

      return redirect('admin/menu/'.$menu_type->id)->with('alert','Bạn đã lưu thành công');
   }

   //sua
   public function post_menu_type_edit(Request $request,$id){ 
      $this->authorize('menu_edit');
      M_menu_type::where('id',$id)-> update([
            'name' => $request -> name, 
            'class_nav' => $request -> class_nav, 
            'id_nav' => $request -> id_nav, 
            'class_ul' => $request -> class_ul, 
            'id_ul' => $request -> id_ul, 
            'class_li' => $request -> class_li, 
            'id_li' => $request -> id_li, 
            'class_a' => $request -> class_a, 
            'id_a' => $request -> id_a, 
            'attri' => $request -> attri, 
            'def' => $request -> def, 
         ]);
      return redirect()->back()->with('alert','Bạn đã lưu thành công');
   }

   // xoa
   public function get_menu_type_del($id){
      $this->authorize('menu_edit');
      $type  = M_menu_type::where('id',$id)->first();
      if($type -> def == 'on' or $type -> id == 1){
			return redirect() -> back() -> with('alert_error','Bạn không được xóa giá trị mặc định');
      }
      // xoa menu 
      M_menu::where('menu_type_id',$id)->delete();
      M_menu_type::where('id',$id)->delete();

      return redirect('admin/menu/0') -> with('alert','Bạn đã xóa thành công');
      
   }
   //thay doi status
   public function get_menu_type_status($id){
      $this->authorize('menu_edit');
   
      $menu = M_menu_type::where('id',$id)->first();

      if($menu -> status == 'off'){
         M_menu_type::where('id',$id)->update(['status' => 'on']);
      }
      elseif ($menu -> status == 'on'){
         M_menu_type::where('id',$id)->update(['status' => 'off']);
      }
      return redirect() -> back() -> with('alert','Bạn đã thay đổi thành công');
   }//ket thuc doi status
}
