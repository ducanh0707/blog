<?php namespace App\Modules\Form\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_form;
use Auth;
use DB;

class FormController extends Controller {
   public function index(Request $request,$form_id){
      $this->authorize('form_edit');
      if($form_id == 0){$form_id = M_form::select('id')->first() -> id;}
      $form = M_form::where('id',$form_id)->first();
      $form_list = M_form::get();
      $contact_list = M_form::get(); 
      
      return view('Form::index',['contact_list'=>$contact_list,'form_list'=>$form_list, 'form' => $form,'form_id'=>$form_id,'title'=>'Danh sách form']);
   }

      public function post_form_edit(Request $request,$form_id){
         $this->authorize('form_edit');

         M_form::where('id',$form_id)->update(['care'=> $request->care_option]);
          $this -> validate($request,
            [
              'name' => 'required',
            ],
            [
              'name.required' => 'Bạn chưa nhập form',
           ]);
         if($request -> custome_email){
            $custome_email = 'on';
         }else{
            $custome_email = 'off';
         } 
   
         M_form::where('id',$form_id)->update([
            'name' => $request -> name,
            'email_send_admin' => $request -> email_send_admin,
            'email_receive_admin' => $request -> email_receive_admin,
            'code' => $request -> code,
            'noti' => $request -> noti,
         ]);

           
        return redirect()->back() -> with('alert','Sửa thành công');
      }


      public function post_form_new_feild(Request $request,$form_id){

         $this->authorize('form_edit');
         if(isset($request -> feild['full_name'])){
            M_form::where('id',$form_id)->update(['full_name'=> 'on']);
         }
         if(isset($request -> feild['email'])){
            M_form::where('id',$form_id)->update(['email'=> 'on']);
         }
         if(isset($request -> feild['tel'])){
            M_form::where('id',$form_id)->update(['tel'=> 'on']);
         }
         if(isset($request -> feild['request'])){
            M_form::where('id',$form_id)->update(['request'=> 'on']);
         }
         if(isset($request -> feild['care'])){
            M_form::where('id',$form_id)->update(['care'=> $request-> feild['care_option']]);
         }
         
         return redirect()->back()->with('alert','Thêm thành công');
      }

      public function get_del_feild($form_id,$feild){
         $this->authorize('form_edit');
         M_form::where('id',$form_id)->update([ $feild => '']);

         return redirect()->back()->with('alert','Xóa thành công');
      }

      public function post_form_new(Request $request){
         $this->authorize('form_edit');
         $this -> validate($request,
           [
              'name' => 'required',
           ],
           [
              'name.required' => 'Bạn chưa nhập tên form',
           ]);
   
         if($request -> custome_email){
            $custome_email = 'on';
         }else{
            $custome_email = 'off';
         } 
   
         $form = new M_form;
         $form -> name = $request -> name;
         $form -> email_send_admin = $request -> email_send_admin;
         $form -> email_receive_admin = $request -> email_receive_admin;
         $form -> code = $request -> code;
         $form -> noti = $request -> noti;
         $form -> status = 'on';
         $form -> save();
      
        return redirect('admin/form/'.$form->id) -> with('alert','Thêm thành công');
      }

      public function get_del($form_id){
         $this->authorize('form_edit');
         M_form::where('id',$form_id)->delete();
         $form_first = M_form::first();
         return redirect('admin/form/'.$form_first ->id) -> with('alert','Bạn đã xóa thành công');
   
      }//ket thuc xoa

      public function get_form_status( $id) {
         $this->authorize('form_edit');
          $cat = M_form::where('id', $id)->first();
 
         if($cat -> status=='off') {
             M_form::where('id', $id)->update(['status'=> 'on']);
         }
 
         elseif ($cat -> status=='on') {
             M_form::where('id', $id)->update(['status'=> 'off']);
         }
 
         return redirect() ->back() ->with('alert', 'Bạn đã thay đổi thành công');
     }
}
