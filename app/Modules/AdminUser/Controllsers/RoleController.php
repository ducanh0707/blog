<?php namespace App\Modules\AdminUser\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_domain;
use App\Http\Model\User;
use App\Http\Model\M_user_type;
use App\Http\Model\M_type_permission;
use App\Http\Model\M_permission;
use Auth;
use DB;

class RoleController extends Controller {
    public function post_role_new(Request $request){
        $this->authorize('admin_permission_edit');
        $this -> validate($request,
        [
            'name' => 'required|unique:user_type,name',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên thể loại',
            'name.unique' => 'Định dạng đã tồn tại hoặc trùng với keyword của hệ thống',
        ]);
        $user_type = new M_user_type;
        $user_type -> name = $request -> name;
        $user_type -> url = change_title_to_url($request -> name);
        $user_type -> status = 'on';
        $user_type -> type = $request -> type;
        $user_type -> save();
        // them quyen
        if($request -> type == 'domain'){
            $permi = M_permission::where('type','web')->get();
            foreach($permi as $permi_r){
                $role = new M_type_permission;
                $role -> type_id = $user_type->id;
                $role -> permission_id = $permi_r->id;
                $role -> save();
            }
        }   
        
        return redirect()->back()->with('alert','Bạn đã lưu thành công');
    }

    public function post_role_edit(Request $request,$id){
        $this->authorize('admin_permission_edit');
        $this -> validate($request,
        [
            'name' => 'required|unique:user_type,name,'.$id,
        ],
        [
            'name.required' => 'Bạn chưa nhập tên thể loại',
            'name.unique' => 'Định dạng đã tồn tại hoặc trùng với keyword của hệ thống',
        ]);
        $user_type = M_user_type::find($id);
        if($user_type-> url == 'root'){
            return redirect()->back()->with('alert_error','Bạn không có quyền này');
        }
        $user_type -> name = $request -> name;
        $user_type -> url = $request -> url;
        $user_type -> type = $request -> type;
        $user_type -> save();
        
        return redirect()->back()->with('alert','Bạn đã lưu thành công');
    }

    //xoa
    public function get_role_del($id){
        $this->authorize('admin_permission_edit');
        $user_type = M_user_type::find($id);
        $user_check = User::where('user_type_id',$id)->get();
        if(count($user_check) > 0){
            return redirect()->back()->with('alert_error','Vẫn còn thành viên ở quyền này, bạn nên xóa thành viên trước');
        }
        if($user_type-> url == 'root'){
            return redirect()->back()->with('alert_error','Bạn không có quyền này');
        }
    // xoa quyen
        M_type_permission::where('type_id',$id)->delete();
        $user_type ->delete();
        return redirect()->back() -> with('alert','Bạn đã xóa thành công');
    }

     //danh sach quyen
     public function get_role_permission($user_type_id){
        $this->authorize('admin_permission_edit');

        $permission = M_permission::all();
        $title = 'Danh sách quyền của thể loại thành viên'; 
        return view('AdminUser::role_permission',['permission'=>$permission,'user_type_id'=>$user_type_id,'title'=>$title]);
    }
    
    //them quyen 
    public function get_role_permission_add($user_type_id,$id,$type_r){
        $this->authorize('admin_permission_edit');
        //check 
        $type_permission = M_type_permission::where('type_id',$user_type_id)->where('permission_id',$id)->first();

        if($type_permission ==  null){
            $type = new M_type_permission;
            $type -> type_id = $user_type_id;
            $type -> permission_id = $id;
            $type -> type = $type_r;
            $type -> save();
           
        }else{
            $type_permission -> delete(); 
        }
    }

}
