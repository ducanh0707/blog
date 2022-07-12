<?php namespace App\Modules\Order\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_order;
use App\Http\Model\M_tinh;
use App\Http\Model\M_post;
use App\Http\Model\M_config;
use Auth;
use DB;
use Mail;

class OrderController extends Controller {
    public function index(Request $request){
        $this->authorize('order_view');
     

        $key_ar = explode(' ',$request->key);
        $order = M_order::orderby('id','desc');
        if($request -> search == 'on'){
            $field = $request->field;
            foreach($key_ar as $key_r){
                $order = M_order::orwhere($field,'like', '%'.$key_r.'%');
            }
            $order = $order ->paginate(100);
        }else{
            $order =  $order->paginate(25);
        }
        
        $tinh_list = M_tinh::all();
		return view('Order::index',['tinh_list'=>$tinh_list,'title'=>'Danh sách đơn hàng','order'=>$order]);
   }

   public function get_resetMail(Request $request){
      $mail_list = M_order::get();
      foreach($mail_list as $email){
         // trang thai gui roi la on 
         $email -> sendmail = '';
         $email -> save();
      }
      return redirect() -> back() -> with('alert','Rest thành công');
   }
   public function get_mailConfig(Request $request){
      $mailConfig = M_config::where('name','mailContent')->where('type','mail')->first();
      $mailTitle = M_config::where('name','mailTitle')->where('type','mail')->first();
      $mailSendStatus = M_config::where('name','mailSendStatus')->where('type','mail')->first();
      $mailAddress = M_config::where('name','mailAddress')->where('type','mail')->first();
      $mailPass = M_config::where('name','mailPass')->where('type','mail')->first();

      return view('Order::mailConfig',['mailAddress'=>$mailAddress,'mailPass'=>$mailPass,'mailSendStatus'=>$mailSendStatus,'mailConfig'=>$mailConfig,'mailTitle'=>$mailTitle,'title'=>'Cài đặt mail']);
   }
   public function post_mailConfig(Request $request){
      $mailContent = M_config::where('name','mailContent')->where('type','mail')->first();
      $mailContent -> value = $request->mailContent;
      $mailContent -> save();

      $mailTitle = M_config::where('name','mailTitle')->where('type','mail')->first();
      $mailTitle-> value = $request->mailTitle;
      $mailTitle -> save();

      $mailSendStatus = M_config::where('name','mailSendStatus')->where('type','mail')->first();
      $mailSendStatus-> value = $request->mailSendStatus;
      $mailSendStatus -> save();

      $mailAddress = M_config::where('name','mailAddress')->where('type','mail')->first();
      $mailAddress -> value = $request->mailAddress;
      $mailAddress -> save();

      $mailPass = M_config::where('name','mailPass')->where('type','mail')->first();
      $mailPass-> value = $request->mailPass;
      $mailPass -> save();

      return redirect() -> back() -> with('alert','Lưu thành công');
   }
   public function post_order_new(Request $request){
      $this->authorize('order_edit');
      $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);
      $order = new M_order;
      $order -> name = $request -> name;
      $order -> tel = $request -> tel;
      $order -> email = $request -> email;
      $order -> cmt = $request -> cmt;
      $order -> ngay_tham_gia = $request -> ngay_tham_gia;
      $order ->so_hop_dong = $request -> so_hop_dong;
      $order -> so_lo = $request -> so_lo;
      $order -> dien_tich = $request -> dien_tich;
      $order -> nhom = $request -> nhom;
      $order -> da_gop_von = $request -> da_gop_von;
      $order -> con_lai = $request -> con_lai;
      $order ->lich_su = $request -> lich_su;
      $order ->note = $request -> note;
 
 
      $order -> content = $request -> content;
      $order -> address = $request -> address;
      $order -> status = $request -> status;
      $order ->save();

      return redirect() -> back() -> with('alert','Thêm thành công');
   }

   public function post_mail(Request $request){
      $this->authorize('order_edit');
      $title_mail = $request->title;
      $data = [
          'content'=> $request->content,
      ];

      // email he thong gui di
      $email_send = 'cid18hotmail@gmail.com';
      $emai_khach =  $request->email_nhan;

      // gui mail den cho quan tri
      Mail::send('V_email/V_pay_success',$data,function($msg) use ($email_send,$title_mail,$emai_khach){
      $msg -> from($email_send,'[Hệ thống]');
      $msg -> to($emai_khach)-> subject($title_mail);
      });

      return redirect() -> back() -> with('alert','Gửi thành công');
   }


   // export 
   public function get_export(Request $request){
      $this->authorize('order_edit');
      $order_list = M_order::all();
      foreach($order_list  as $key => $row){
         if($row->status == 'on'){
            $status = 'Da xem';
         }else{
            $status = 'Moi';
         }
         
         $data[] = array(
            // "id"=> $row->id,
            // "ma_lien_he"=> 'M_'.$row->id,
            "Họ tên"=>  html_entity_decode($row->name), 

            "Điện thoại"=>$row->tel,
            "email"=>html_entity_decode($row->email),
            "Chứng minh thư"=>html_entity_decode($row->cmt),
            "Ngày tham gia"=>html_entity_decode($row->ngay_tham_gia),
            "Số hợp đồng"=>html_entity_decode($row->so_hop_dong),
            "Số lô"=>html_entity_decode($row->so_lo),
            "Điện tích"=>html_entity_decode($row->dien_tich),
            "Nhóm"=>html_entity_decode($row->nhom),
            "Đã góp"=>html_entity_decode($row->da_gop_von),
            "Còn lại"=>html_entity_decode($row->con_lai),
            "Lịch sử"=>html_entity_decode($row->lich_su),
            "Ghi chú"=>html_entity_decode($row->note),
            "Địa chỉ"=>html_entity_decode($row->address),
            "Yêu cầu"=>html_entity_decode($row->content),
            "Trạng thái"=>html_entity_decode($status),
            "Ngày"=>$row->created_at,
         );
      }
      // return $data;
     return view('Order::export',['order_list'=>$order_list,'data'=>$data]);
   }

   // sua 
   public function post_order_edit(Request $request,$order_id){
      $this->authorize('order_edit');
      $this -> validate($request,['name' => 'required',],['name.required' => 'Bạn chưa nhập tiêu đề',]);

      $order = M_order::find($order_id);
      $order -> name = $request -> name;
      $order -> tel = $request -> tel;
      $order -> email = $request -> email;
      $order -> cmt = $request -> cmt;
      $order -> ngay_tham_gia = $request -> ngay_tham_gia;
      $order ->so_hop_dong = $request -> so_hop_dong;
      $order -> so_lo = $request -> so_lo;
      $order -> dien_tich = $request -> dien_tich;
      $order -> nhom = $request -> nhom;
      $order -> da_gop_von = $request -> da_gop_von;
      $order -> con_lai = $request -> con_lai;
      $order ->lich_su = $request -> lich_su;
      $order ->note = $request -> note;
 
 
      $order -> content = $request -> content;
      $order -> address = $request -> address;
      $order -> status = $request -> status;
      $order ->save();
   
      return redirect() -> back() -> with('alert','Sửa thành công order');
   }

   // xoa 
   public function get_order_del(Request $request,$order_id){
      $this->authorize('order_edit');
      M_order::where('id',$order_id)->delete();
      
      return redirect() -> back() -> with('alert','Xóa thành công order');
   }

 public function get_list(Request $request){
  
    $order = M_order::first();
    return view('Order::order_list',['order'=>$order,'title' => 'Danh sách liên hệ']);
 }

   public function get_order_import(Request $request){
      $this->authorize('order_edit');
    
      if($request -> file){
         if($request -> hasFile('file')){
            $file_file = $request -> file('file');
            $exten_file = $file_file -> getClientOriginalExtension();
            if($exten_file != 'xls' and $exten_file != 'xlsx') {
            return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file xls');
            }
            $file = $file_file -> getClientOriginalName();
            $i=1;
            while(file_exists('source/order/'.$file)){
               if($i == 1){
                  $file = str_replace('.','-'.$i++.'.',$file);
               }else{
                  $a =$i-1;
                  $file = str_replace($a.'.',$i++.'.',$file);
               }
            }
            $file_file->move('source/order/',$file);
         }else{
            $file = '';
         }
      }else{
         $file='';
      }

      return view('Order::order_import',['title' => 'Nhập excel']);
 }


 public function post_order_import(Request $request){ 
     $this->authorize('order_edit');
   
      if($request -> hasFile('file')){
         $file_file = $request -> file('file');
         $exten_file = $file_file -> getClientOriginalExtension();
         if($exten_file != 'xlsx' and $exten_file != 'xls') {
         return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file xls)');
         }
         $file = $file_file -> getClientOriginalName();
         $i=1;
         while(file_exists('source/order/'.$file)){
            if($i == 1){
               $file = str_replace('.','-'.$i++.'.',$file);
            }else{
               $a =$i-1;
               $file = str_replace($a.'.',$i++.'.',$file);
            }
         }
         $file_file->move('source/order/',$file);
      }else{
         $file = '';
      }

      // neu data akhacs rong 
      if($request-> data != ''){
         foreach(json_decode($request->data) as $post_id){
            $order = new M_post;
            $order -> name = $request -> name;
            $order -> tel = $request -> tel;
            $order -> email = $request -> email;
            $order -> content = $request -> content;
            $order -> address = $request -> address;
            $order -> status = 'off';
            $order -> save();
         }
      }

      return redirect('admin/order/import?file='.$file)->with('alert','Bạn đã nhập file thành công');
 }

}
