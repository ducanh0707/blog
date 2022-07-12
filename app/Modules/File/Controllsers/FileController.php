<?php namespace App\Modules\File\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_file;
use Auth;
use DB;

class FileController extends Controller {
    public function index(){
        $this->authorize('slide_view');
        $file = M_file::all();
        return view('File::index',['file'=>$file,'title'=>'Danh sách slide']);
     }
     
    public function file_new(Request $request){
        $this->authorize('slide_view');
        M_file::insert([
            'name' => $request->name,
            'link' => $request->link
        ]);

        return redirect()->back()->with('alert','Bạn thêm thành công');
    }
    public function file_edit(Request $request, $id){
        $this->authorize('slide_view');
        M_file::where('id',$id)->update([
            'name' => $request->name,
            'link' => $request->link
        ]);

        return redirect()->back()->with('alert','Bạn sửa thành công');
    }
    public function file_del(Request $request,$id){
        $this->authorize('slide_view');
        M_file::where('id',$id)->delete();

        return redirect()->back()->with('alert','Bạn xóa thành công');
    }
    
}
