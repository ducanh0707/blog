<?php namespace App\Modules\Post\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_post;
use App\Http\Model\M_post_cat;
use App\Http\Model\M_post_type;
use App\Http\Model\M_cat;
use App\Http\Model\M_gift_code;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class PostController extends Controller {

    public function index(Request $request,$post_type){
         $this->authorize('post_edit');         
         //danh sach danh muc
         $cat_list = M_cat::get();
         $post_type = M_post_type::where('url',$post_type)->first();
      
         if(isset($request->display)){
            if($request->cat == 'all'){
               $post =  M_post::where('post_type_id',$post_type->id)->orderBy('id','desc');
            }else{
               $post_cat = M_post_cat::where('cat_id',$request->cat)->pluck('post_id')->toArray();
               $post = M_post::wherein('id',$post_cat);
            }
            if($request->search){
               $post = $post->where('title','like',"%$request->search%");
            }
            $post = $post->paginate($request->display);
         }else{
            $post =  M_post::where('post_type_id',$post_type->id)->orderBy('id','desc')->paginate(50);
         }
         
        return view('Post::index',['post_type'=>$post_type,'search'=>$request->search,'cat'=>$request->cat,'display'=>$request->display,'cat_list'=>$cat_list,'post' => $post,'title'=>'Danh sách bài viết']);
  
     }

     // ajax post
    public function search_post($post_type,$key){
        $post_list = M_post::where('title','LIKE', '%' .$key. '%')->get();
        foreach($post_list as $key_p => $post){
            if($key_p <= 6){
                echo '<div class="cursor select_post" data-posttitle="'.$post->title.'" data-postid="'.$post->id.'">'.$post->title.'</div>';
            }
        }
    }

    public function post_action(Request $request,$post_type){
      $this->authorize('post_edit');

      if($request-> action == 'del'){
         M_post::wherein('id',$request->check)->delete();
      }elseif($request-> action == 'status'){
         foreach($request->check as $id){
            $status_post = M_post::find($id);
            if($status_post->status == 'on'){
               M_post::where('id',$id)->update(['status'=>'off']);
            }else{
               M_post::where('id',$id)->update(['status'=>'on']);
            }
            
         }
      }elseif($request-> action == 'gift'){
         foreach($request->check as $id){
            $post = M_post::find($id);
            $post -> gift_code_id = $request -> gift_code;
            $post -> save();
         }
      }
      return redirect()->back()->with('alert','Bạn đã xóa thành công');
    }
    
     //thay doi status
     public function get_change_status($post_type,$id){
        $post = M_post::where('id',$id)->first();
  
        if($post -> status == 'off'){
           M_post::where('id',$id)->update(['status' => 'on']);
        }
        elseif ($post -> status == 'on'){
           M_post::where('id',$id)->update(['status' => 'off']);
        }
        return redirect() -> back() -> with('alert','Bạn đã thay đổi thành công');
     }

    public function image_upload(Request $request){
        if($request->text_two != ''){
            $text_two = $request->text_two;
        }else{
            $text_two = '';
        }
        if($request -> files !='') {
            foreach($request-> files as $key_img=> $img_file_list) {   
                $count = 0;
                foreach($img_file_list as $img_file){
                    $count++;
                    if($count <= 2){
                        $exten_img=$img_file ->getClientOriginalExtension();
                        if($exten_img !='gif' && $exten_img !='GIF' && $exten_img !='webp' && $exten_img !='jpg' && $exten_img !='png'&& $exten_img !='jpeg'&& $exten_img !='JPEG'&& $exten_img !='PNG'&& $exten_img !='JPG') {
                            return redirect()->back() ->with('alert', 'Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg');
                        } 
                        $img=$img_file ->getClientOriginalName();
                        $i=1;
                        while(file_exists('source/slide/'.$img)) {
                            if($i==1) {
                                $img=str_replace('.', '-'.$i++.'.', $img);
                            }

                            else {
                                $a=$i-1;
                                $img=str_replace($a.'.', $i++.'.', $img);
                            }
                        }
                    
                        $img_file->move('source/post/', $img);
                        if($count == 1){
                            $img_name[] =  '<img src="'.asset("source/post/".$img).'"  alt="Original man holding beer">';
                        }elseif($count == 2){
                            $img_name[] =  '<div class="beer-reveal" data-beer-label="'.$text_two.'"><img src="'.asset("source/post/".$img).'" alt="Processed with logo and Lightroom presets"></div>';
                            
                        }
                    }
                }
            }
            return $img_name;
            
        }else{
            return 'Không có ảnh';
        }
    }
    
   
    public function image_upload_text_image(Request $request){
    
            if($request -> hasFile('files')){
                $img_file = $request -> file('files');
                   
                    $exten_img=$img_file ->getClientOriginalExtension();
                    if($exten_img !='gif' && $exten_img !='GIF' && $exten_img !='webp' && $exten_img !='jpg' && $exten_img !='png'&& $exten_img !='jpeg'&& $exten_img !='JPEG'&& $exten_img !='PNG'&& $exten_img !='JPG') {
                        return redirect()->back() ->with('alert', 'Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg');
                    } 
                    $img=$img_file ->getClientOriginalName();
                    $i=1;
                    while(file_exists('source/slide/'.$img)) {
                        if($i==1) {
                            $img=str_replace('.', '-'.$i++.'.', $img);
                        }

                        else {
                            $a=$i-1;
                            $img=str_replace($a.'.', $i++.'.', $img);
                        }
                    }
                
                    $img_file->move('source/post/', $img);
                   return  $img_name =  '<img class="w-100" src="'.asset("source/post/".$img).'">';
                }
         
       
    }

}
