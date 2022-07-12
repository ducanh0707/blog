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

class PermissionController extends Controller {
    public function get_permission(Request $request){
        $permission = M_permission::all();

        return view('AdminUser::permission',['permission'=>$permission,'title'=>'Danh sách quyền']);
    }
    public function post_permission_new(Request $request){
        $this->authorize('admin_permission_edit');

        $permission = new M_permission;
        $permission -> name = $request->name;
        $permission -> title = $request->title;
        $permission -> type = $request->type;
        $permission -> save();
        return redirect()->back()->with('alert','Bạn thêm thành công');
    }

    public function post_permission_edit(Request $request,$per_id){
        $this->authorize('admin_permission_edit');

        $permission = M_permission::find($per_id);
        $permission -> name = $request->name;
        $permission -> title = $request->title;
        $permission -> type = $request->type;
        $permission -> save();
        return redirect()->back()->with('alert','Bạn sửa thành công');
    }

    public function get_permission_del(Request $request,$per_id){
        $this->authorize('admin_permission_edit');

        $permission = M_permission::find($per_id)->delete();
        return redirect()->back()->with('alert','Bạn xóa thành công');
    }
}
