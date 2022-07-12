<?php namespace App\Modules\ButtonRing\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_button_ring;
use Auth;
use DB;

class ButtonRingController extends Controller {
   public function index(){
      $this->authorize('button_ring_view');
      $button_ring = M_button_ring::all();

		return view('ButtonRing::index',['title'=>'Danh sách nút bấm liên hệ','button_ring'=>$button_ring]);
   }
   public function post_button_ring_edit(Request $request){
      $this->authorize('button_ring_edit');    
      foreach($request -> ring as $key => $ring){
          M_button_ring::where('id',$key)->update([
            'name' => $ring['name'],
            'icon' => $ring['icon'],
            'position' => $ring['position'],
            'color_text' => $ring['color_text'],
            'color_bg' => $ring['color_bg'],
            'font' => $ring['font'],
            'css_top' => $ring['css_top'],
            'css_left' => $ring['css_left'],
            'css_right' => $ring['css_right'],
            'css_bottom' => $ring['css_bottom'],
            'text' => $ring['text'],
            'status' => $ring['status'],
            'type' => $ring['type'],
            'link' => $ring['link'],
         ]);
      }
      return redirect()->back()->with('alert','Bạn đã lưu thành công');
   }
   
   public function post_button_ring_new(Request $request){
      $this->authorize('button_ring_edit');
      M_button_ring::insert([
         'name' => $request -> ring_new['name'],
         'icon' => $request -> ring_new['icon'],
         'position' => $request -> ring_new['position'],
         'color_text' => $request -> ring_new['color_text'],
         'color_bg' => $request -> ring_new['color_bg'],
         'font' => $request -> ring_new['font'],
         'css_top' => $request -> ring_new['css_top'],
         'css_left' => $request -> ring_new['css_left'],
         'css_right' => $request -> ring_new['css_right'],
         'css_bottom' => $request -> ring_new['css_bottom'],
         'text' => $request -> ring_new['text'],
         'status' => $request -> ring_new['status'],
         'type' => $request -> ring_new['type'],
         'link' => $request -> ring_new['link'],
      ]);


   return redirect()->back()->with('alert','Bạn đã lưu thành công');
   }  
   public function get_button_ring_del(Request $request, $button_ring_id){
      $this->authorize('button_ring_edit');
      M_button_ring::where('id',$button_ring_id)->delete();

   return redirect()->back()->with('alert','Bạn đã lưu thành công');
   }  
  
}
