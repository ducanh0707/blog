<?php namespace App\Modules\Post\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_post;
use App\Http\Model\M_post_cat;
use App\Http\Model\M_post_type;
use App\Http\Model\M_cat;
use App\Http\Model\M_gift_code;
use App\Http\Model\M_slide_img;
use App\Http\Model\M_file;
use Auth;
use DB;

class PostEditController extends Controller {
    public function get_post_edit(Request $request,$post_type_url,$id){
        $this->authorize('post_edit');
        $post = M_post::where('id',$id)->first();
        $cat = M_cat::orderby('created_at','desc')->get();
        $post_type = M_post_type::where('url',$post_type_url)->first();
       
        return view('Post::V_post_edit',['post_type'=>$post_type,'post'=>$post,'cat' => $cat,'title' => 'Sửa bài viết']);
     }
   //   ajax xoa slide 
     public function get_del_slide_img($post_type_url,$img_id){
         M_slide_img::find($img_id)->delete();
     }
   //   ajax xoa file
     public function get_del_file($post_type_url,$file_id){
         M_file::find($file_id)->delete();
     }
     // ajax order
     public function post_post_order(Request $request,$post_type){
      
      $order = explode('&',$request -> data);
      foreach($order as $order_ex){
         $order_id[] = explode('[]=',$order_ex);
         $ia = 1;
         foreach($order_id as $order_in){ 
            $slide = M_slide_img::find($order_in[1]);
            $slide -> orderby = $ia;
            $slide -> save();
            $ia++;
         }
      }
   }
   //   ajax xoa san mua mua kem
     public function get_del_product_relate($post_type_url,$post_id,$relate_id){
         $post_relate = M_post::find($post_id);
         foreach(json_decode($post_relate->product_relate) as $post_relate_r){
            if($post_relate_r != $relate_id){
               $id_array[] = $post_relate_r;
            }
         }
         if(isset($id_array)){
            $post_relate -> product_relate = json_encode($id_array);
         }else{
            $post_relate -> product_relate = '';
         }
         
         $post_relate -> save();
     }
  
     public function post_post_edit(Request $request,$post_type_url,$id){
      if($request-> cat == ''){return redirect()->back()->with('alert_error','Bạn chưa chọn danh mục');}
        $this->authorize('post_edit');

        $this -> validate($request,
              [
                 'title' => 'required',
                 'url' => 'required',
                 'img' => 'max:2250'
              ],
              [
                 'title.required' => 'Bạn chưa nhập tiêu đề',
                 'url.required' => 'Đường dẫn (URL) bắt buộc phải có',
                 'img.max' => 'Kích ảnh đại diện chỉ bé hơn 2Mb'
              ]);
  
        if($request -> canon == 'on'){
           $canon = 'on';
        }else{
           $canon = 'off';
        }
        if($request -> pin == 'on'){
           $pin = 'on';
        }else{
           $pin = 'off';
        }
        $post_type = M_post_type::where('url',$post_type_url)->first();
        $post = M_post::find($id);
        
        if($request -> del_img == 'del_img'){
            $post = M_post::find($id);
            if($post -> img){
               while(file_exists('source/post/'.$post->img)){
                  unlink('source/post/'.$post->img);
               }
            }
            M_post::where('id',$id) -> update(['img'=> '']);
        }else{
            if($request -> hasFile('img')){
               $img_file = $request -> file('img');
               if($post -> img){
                  while(file_exists('source/post/'.$post->img)){
                     unlink('source/post/'.$post->img);
                  }
               }
               
                $exten_img = $img_file -> getClientOriginalExtension();
                if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG') {
                return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg (phân biệt viết hoa và viết thường)');
                }
                $img = $img_file -> getClientOriginalName();
               
                $i=1;
                while(file_exists('source/post/'.$img)){
                    if($i == 1){
                        $img = str_replace('.','-'.$i++.'.',$img);
                    }else{
                        $a =$i-1;
                        $img = str_replace($a.'.',$i++.'.',$img);
                    }
                }
                $img_file->move('source/post/',$img);
                M_post::where('id',$id) -> update(['img'=>$img]);
            }
        }
       
        $post -> title = $request -> title;
         $post -> title_seo = $request -> title_seo;
         $post -> key_seo = $request -> key_seo;
         $post -> content = $request -> content;
         $post -> des_seo = $request -> des_seo;
         $post -> des = $request -> des;

         $post -> title_en = $request -> title_en;
         $post -> title_seo_en = $request -> title_seo_en;
         $post -> key_seo_en = $request -> key_seo_en;
         $post -> content_en = $request -> content_en;
         $post -> des_seo_en = $request -> des_seo_en;
         $post -> des_en = $request -> des_en;

         $post -> status = $request -> status;
         $post -> index_meta = $request -> index_meta;
         $post -> user_id = $request -> user_id;
         $post -> canon = $canon;
         $post -> post_type_id = $post_type->id;
         $post -> price = $request -> price;
         $post -> price_km = $request -> price_km;
         $post -> code_km = $request -> code_km;
         $post -> code_product = $request -> code_product;
         $post -> index_product = $request -> index_product;
         $post -> color = $request -> color;
         $post -> view = $request -> view;
         $post -> review = $request -> review;
         $post -> orderby = $request -> orderby;
         $post -> product_relate = json_encode($request->product_relate);
         $post -> comment = $request-> comment;
         $post -> video = $request-> video;
         $post -> video_2 = $request-> video_2;


         $post -> save();

        // them slide 
        if($request -> slide !=''){
            foreach($request-> slide as $key_img => $img_file){
                if($request -> hasFile('slide.'.$key_img)){
                $exten_img = $img_file -> getClientOriginalExtension();
                if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG'){return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg');}
                $img = $img_file -> getClientOriginalName();
                $i=1;
                while(file_exists('source/post/'.$img)){
                    if($i == 1){
                        $img = str_replace('.','-'.$i++.'.',$img);
                    }else{
                        $a = $i-1;
                        $img = str_replace($a.'.',$i++.'.',$img);
                    }
                }
                $img_file->move('source/post/',$img);
                }
                M_slide_img:: insert([
                'status' => 'on',
                'img' => $img,
                'post_id' => $post->id,
                'orderby' => $key_img+1,
                ]);
            }
        }

        // them slide  2
        if($request -> slide_2 !=''){
            foreach($request-> slide_2 as $key_img => $img_file){
                if($request -> hasFile('slide_2.'.$key_img)){
                $exten_img = $img_file -> getClientOriginalExtension();
                if($exten_img != 'webp' && $exten_img != 'jpg' && $exten_img != 'png' && $exten_img != 'jpeg' && $exten_img != 'JPEG' && $exten_img != 'PNG' && $exten_img != 'JPG'){return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .jpg, .png, .jpeg');}
                $img = $img_file -> getClientOriginalName();
                $i=1;
                while(file_exists('source/post/'.$img)){
                    if($i == 1){
                        $img = str_replace('.','-'.$i++.'.',$img);
                    }else{
                        $a = $i-1;
                        $img = str_replace($a.'.',$i++.'.',$img);
                    }
                }
                $img_file->move('source/post/',$img);
                }
                M_slide_img:: insert([
                'status' => 'on',
                'img' => $img,
                'post_id_2' => $post->id,
                'orderby' => $key_img+1,
                ]);
            }
        }


     //them file tai lieu
     if($request -> file !=''){
         foreach($request-> file as $key_file => $file_file){
            if($request -> hasFile('file.'.$key_file)){
               $exten_file = $file_file -> getClientOriginalExtension();
               if($exten_file != 'pdf' && $exten_file != 'PDF' && $exten_file != 'DOC' && $exten_file != 'doc' && $exten_file != 'docx' && $exten_file != 'DOCX'){return redirect()->back() -> with('alert','Lỗi, Bạn chỉ được chọn file ảnh có đuôi là .pdf .doc');}
               $file = $file_file -> getClientOriginalName();
               $i=1;
               while(file_exists('source/post/'.$file)){
                  if($i == 1){
                     $file = str_replace('.','-'.$i++.'.',$file);
                  }else{
                     $a = $i-1;
                     $file = str_replace($a.'.',$i++.'.',$file);
                  }
               }
               $file_file->move('source/post/',$file);
            }
            M_file:: insert([
               'name' => $file,
               'post_id' => $post->id,
            ]);
         }
     }

        $post_check = M_post::where('url',$request -> url)->first();
        if(isset($post_check -> url )){
           if($post_check -> id == $id){
              $post_url = $request -> url;
           }else{
              $post_url = $request -> url.'-'.$id;
           }
        }else{
           $post_url = $request -> url;
        }
        M_post::where('id',$id)->update(['url' => $post_url]);
        
        //them danh muc
           if($request-> cat){
              //xoa ban hien tai
              M_post_cat::where('post_id',$id)->delete();
              foreach($request-> cat as $cat_id){
                 M_post_cat::insert([
                    'post_id' => $id,
                    'cat_id' => $cat_id
                 ]);
              }
           }else{
              M_post_cat::where('post_id',$id)->delete();
           }
        if($request-> save_list == 'on'){
           return redirect('admin/post/'.$post_type_url) -> with('alert','Lưu thành công tin tức');
        }elseif($request-> save_new == 'on'){
           return redirect('admin/post/'.$post_type_url.'/new') -> with('alert','Lưu thành công tin tức');
        }elseif($request-> save_edit == 'on'){
           return redirect('admin/post/'.$post_type_url.'/edit/'.$id) -> with('alert','Lưu thành công tin tức');         
        }
  
     }

     public function get_post_del($post_type,$id){
        $this->authorize('post_edit');
        $post = M_post::where('id',$id)->first();

         //   xoa anh 
         if($post -> img  != '' or $post -> img != null){
            while(file_exists('source/post/'.$post -> img)){
               unlink('source/post/'.$post -> img) ;
            }
         }
        M_post::where('id',$id) -> delete();
        return redirect()-> back() -> with('alert','Bạn đã xóa thành công');
     }

     public function get_change_status($post_type,$id){
        $this->authorize('post_edit');
        $post = M_post::where('id',$id)->first();
  
        if($post -> status == 'off'){
           M_post::where('id',$id)->update(['status' => 'on']);
        }
        elseif ($post -> status == 'on'){
           M_post::where('id',$id)->update(['status' => 'off']);
        }
        return redirect() -> back() -> with('alert','Bạn đã thay đổi thành công');
     }
}
