<?php namespace App\Modules\Comment\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_comment;
use App\Http\Model\M_cat;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class CommentController extends Controller {

    public function index(Request $request){
         $this->authorize('comment_edit');         
         $comment_list = M_comment::orderby('id','desc')->paginate(25);

        return view('Comment::index',['comment_list'=>$comment_list,'title'=>'Danh sách bình luận']);
  
     }
    public function comment_post(Request $request,$post_id){
         $this->authorize('comment_edit');         
         $comment_list = M_comment::where('post_id',$post_id)->paginate(25);

        return view('Comment::index',['comment_list'=>$comment_list,'title'=>'Danh sách bình luận']);
  
     }

    public function post_comment_edit(Request $request,$comment_id){
         $this->authorize('comment_edit');         

         $comment = M_comment::find($comment_id);
         if($request -> del_img == 'del_img'){
            if($comment -> img){
               while(file_exists('source/comment/'.$comment ->img)){
                  unlink('source/comment/'.$comment ->img);
               }
            }
            $comment ->  img = '';
         }else{
            if($request -> hasFile('img')){
               $img_file = $request -> file('img');
               $exten_img = $img_file -> getClientOriginalExtension();
               if($exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                    return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
               }
               $img = $img_file -> getClientOriginalName();
               
               $i=1;
               while(file_exists('source/comment/'.$img)){
                  if($i == 1){
                        $img = str_replace('.','-'.$i++.'.',$img);
                  }else{
                        $a =$i-1;
                        $img = str_replace($a.'.',$i++.'.',$img);
                  }
               }
               $img_file->move('source/comment',$img);
               $comment ->  img = $img;
            }
        }

         $comment -> name = $request -> name;
         $comment -> email = $request -> email;
         $comment -> tel = $request -> tel;
         $comment -> content = $request -> content;
         $comment -> review = $request -> review;
         $comment -> save();
       
         return redirect()->back()->with('alert','Bạn sửa thành công');
  
     }
     
    public function get_comment_del(Request $request,$id){
        $comment =  M_comment::where('id',$id)->first();
        if($comment-> img  != '' or $comment-> img != null){
            while(file_exists('source/comment/'.$comment->img)){
               unlink('source/comment/'.$comment->img) ;
            }
         }
         $comment->delete();
         return redirect()->back()->with('alert','Bạn xóa thành công');
    }
    public function post_action(Request $request){
      $this->authorize('comment_edit');

      if($request-> action == 'del'){
         foreach($request->check as $id){
            $comment = M_comment::find($id);
            if($comment-> img  != '' or $comment-> img != null){
                while(file_exists('source/comment/'.$comment->img)){
                   unlink('source/comment/'.$comment->img) ;
                }
             }
             $comment -> delete();
         }

      }elseif($request-> action == 'status'){
         foreach($request->check as $id){
            $status_comment = M_comment::find($id);
            if($status_comment->status == 'on'){
               M_comment::where('id',$id)->update(['status'=>'off']);
            }else{
               M_comment::where('id',$id)->update(['status'=>'on']);
            }
            
         }
      }
      return redirect()->back()->with('alert','Bạn đã xóa thành công');
    }
    
     //thay doi status
     public function get_change_status($id){
        $comment = M_comment::where('id',$id)->first();
  
        if($comment -> status == 'off'){
           M_comment::where('id',$id)->update(['status' => 'on']);
        }
        elseif ($comment -> status == 'on'){
           M_comment::where('id',$id)->update(['status' => 'off']);
        }
        return redirect() -> back() -> with('alert','Bạn đã thay đổi thành công');
     }

}
