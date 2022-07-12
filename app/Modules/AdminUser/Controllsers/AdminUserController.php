<?php namespace App\Modules\AdminUser\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_domain;
use App\Http\Model\User;
use App\Http\Model\M_user_type;
use App\Http\Model\M_theme;
use Auth;
use DB;

class AdminUserController extends Controller {
   public function index(){
      $this->authorize('admin_user_view');
      $user_type = M_user_type::all();
      
      return view('AdminUser::index',['title'=>'Danh sách quyền thành viên','user_type'=>$user_type]);
   }
   public function get_user_list(Request $request,$type_id){
      $this->authorize('admin_user_view');
      $type = M_user_type::find($type_id);
      $user_type = M_user_type::all();
      $user = User::orderBy('created_at','desc')->where('user_type_id',$type_id)->paginate(25);
      $title = 'Thành viên - '.$type->name;
      $theme = M_theme::where('status','on')->get();
      return view('AdminUser::user_list',['theme'=>$theme,'type_id'=>$type_id,'title'=>$title,'type'=>$type,'user'=>$user,'user_type'=>$user_type]);
   }

   public function post_user_new (Request $request,$type_id){
      $this->authorize('admin_user_edit');
         $this -> validate($request,
            [
                'email' => 'required|unique:users,email',
                'tel' => 'required|unique:users,tel',
                'password' => 'required|min:6|max:38',
                'name' => 'required|min:2|max:38',
                'password_again' => 'required|same:password',
                'img' => 'mimes:jpeg,bmp,png|max:2000',
            ],
            [
                'email.required' => 'Bạn chưa nhập email thành viên',
                'email.unique' => 'Tên thành viên đã tồn tại',
                'email.email' => 'Bạn phải nhập đúng định dạng email ví dụ: info@webux.vn',

                'tel.required' => 'Bạn chưa nhập số điện thoại thành viên',
                'tel.unique' => 'Số điện thoại thành viên đã tồn tại',
                'tel.number' => 'Bạn phải nhập đúng định dạng số điện thoại',

                'password.required' => 'Ban chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải từ 6 đến 38 ký tự',
                'password.max' => 'Mật khẩu phải từ 6 đến 38 ký tự',

                'name.required' => 'Bạn chưa nhập họ tên',
                'name.min' => 'Họ tên quá ngắn, họ tên từ 2 - 38 ký tự',
                'name.max' => 'Họ tên quá dài, họ tên từ 2 - 38 ký tự',

                'password_again.required' => 'Ban chưa nhập lại mật khẩu',
                'password_again.same' => 'Mật khẩu nhập lại chưa khớp',
                'img.mimes' => 'Ảnh phải có định dạng jpeg, bmp,png',
                'img.max' => '',
            ]);

        $user = new User;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user -> user_type_id = $type_id;
        $user -> remember_token = $request -> _token;
        $user -> name = $request -> name;
        $user -> tel = $request -> tel;
        $user -> status = $request -> status;
         
        if($request -> hasFile('img')){
               $img_file = $request -> file('img');
               $exten_img = $img_file -> getClientOriginalExtension();
               if($exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
               return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
               }
               $img = $img_file -> getClientOriginalName();
               $folder = str_replace([':','.','/'],'_',$web->domain);
               $i=1;
               while(file_exists('upload/user/'.$img)){
                  if($i == 1){
                     $img = str_replace('.','-'.$i++.'.',$img);
                  }else{
                     $a =$i-1;
                     $img = str_replace($a.'.',$i++.'.',$img);
                  }
               }
               $img_file->move('upload/user/',$img);
            
         }else{
               $img = '';
         }
         $user -> img = $img;
         $user -> save();

      return redirect()->back() -> with('alert','Thêm thành viên thành công');
   }

   //thay doi status
   public function get_change_status($type_id,$id){
      $this->authorize('admin_user_edit');
      $user = User::find($id);
      // khong duoc quyen thay doi trong thai root
      if($id != '1'){
         if($user -> status == 'off'){
            $user -> status = 'on';
            $user -> save();
            return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
         }
         elseif ($user -> status == 'on'){
            $user -> status = 'off';
            $user -> save();
            return redirect()-> back() -> with('alert','Bạn đã thay đổi thành công');
         }
      }else{
         return redirect()-> back() -> with('alert_error','Bạn không được quyền thay đổi trạng thái của root này');
      }
   }//ket thuc doi status
   public function post_user_edit (Request $request,$type_id,$id){
      $this->authorize('admin_user_edit');
      //sua thong tin co ban
        $user = User::find($id);
         // check sua email
            $this -> validate($request,
            [
               'email' => 'required|unique:users,email,'.$id,
               'tel' => 'required|unique:users,tel,'.$id,
               'name' => 'required|min:2|max:38',
            ],
            [
               'email.required' => 'Bạn chưa nhập email thành viên',
               'email.unique' => 'Email thành viên đã tồn tại',

               'tel.required' => 'Bạn chưa nhập số điện thoại thành viên',
               'tel.unique' => 'Số điện thoại thành viên đã tồn tại',
               'tel.number' => 'Bạn phải nhập đúng định dạng số điện thoại',

               'email.email' => 'Bạn phải nhập đúng định dạng email ví dụ: info@webux.vn',
               'name.required' => 'Bạn chưa nhập họ tên',
               'name.min' => 'Họ tên quá ngắn, họ tên từ 2 - 38 ký tự',
               'name.max' => 'Họ tên quá dài, họ tên từ 2 - 38 ký tự',
            ]);
         // checkbox neu sua mat khau
        if($request -> changepass == 'on'){
            if($request -> password != ''){
               $user -> password = bcrypt($request -> password);
            }
        }
         $user -> email = $request -> email;
         $user -> remember_token = $request -> _token;
         $user -> name = $request -> name;
         $user -> tel = $request -> tel;
         $user -> status = $request -> status;
         
         //sua anh
         if($request -> del_img == 'del_img'){
            if($user-> img){
               while(file_exists('upload/user/'.$user->img)){
                  unlink('upload/user/'.$user->img);
               }
            }
            $img = '';
         }else{
               if($request -> hasFile('img')){
                  $img_file = $request -> file('img');
                  $exten_img = $img_file -> getClientOriginalExtension();
                  if($exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                  return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
                  }
                  $img = $img_file -> getClientOriginalName();
                  
                  $i=1;
                  while(file_exists('upload/user/'.$img)){
                     if($i == 1){
                           $img = str_replace('.','-'.$i++.'.',$img);
                     }else{
                           $a =$i-1;
                           $img = str_replace($a.'.',$i++.'.',$img);
                     }
                  }
                  $img_file->move('upload/user',$img);
               }
         }    
   
      
      $user -> save();
      return redirect() -> back() -> with('alert','Sửa thành viên thành công');
   }

   public function get_user_del($type_id,$id){
      $this->authorize('admin_user_edit');
      $user = User::find($id);

      if($user -> avatar){
            while(file_exists("upload/user/".$user -> avatar)){
               unlink("upload/user/".$user -> avatar);
            }
         }
      $user -> delete();

         return redirect()->back() -> with('alert','Bạn xóa thành viên thành công');
 	   
   }

}
