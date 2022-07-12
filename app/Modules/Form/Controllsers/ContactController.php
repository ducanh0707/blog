<?php namespace App\Modules\Form\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_form;
use App\Http\Model\M_contact;
use Auth;
use DB;

class ContactController extends Controller {
    public function get_contact_list(Request $request, $form_id){
        $this->authorize('form_view'); 
        if($form_id == 0){$form_id = M_form::select('id')->first() -> id;}
        $form = M_form::find($form_id);
        $contact_list = M_form::all();
        $contact =  M_contact::orderby('id','desc')->where('form_id',$form_id)->paginate(25);
  
        return view('Form::V_contact_list',['title'=>'Liên hệ','contact_list'=>$contact_list,'contact'=>$contact,'form' => $form]);
     }
  
     public function get_contact_status($form_id, $id){
        if($form_id == 0){
           $form_id  = M_form::first();
        }
        $contact = M_contact::where('id',$id)->first();
        if($contact -> status == 'on'){
           $connect->table('contact')->where('id',$id)->update(['status' => 'off']);
        }else{
           $connect->table('contact')->where('id',$id)->update(['status' => 'on']);
        }
       return redirect()->back() -> with('alert','Bạn đã thay đổi thành công');
     }
  
     public function get_contact_del($form_id, $id){
       M_contact::where('id',$id) -> delete();
        return redirect()-> back() -> with('alert','Bạn đã xóa thành công');
     }
}
