<?php namespace App\Modules\Crawl\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\M_cat;
use App\Http\Model\M_post;
use App\Http\Model\M_post_cat;
use App\Http\Model\M_slide_img;
use App\Http\Model\M_file;
use Auth;
use Sunra\PhpSimple\HtmlDomParser;


class CrawlController extends Controller {
   public function index(Request $request){
      $this->authorize('crawl_view');
      $cat_list = M_cat::get();
      if($request ->link){
         $link = $request -> link;
      }else{
         $link = '';
      }
		return view('Crawl::index',['link'=>$link,'cat_list'=>$cat_list,'title'=>'Danh sách thể loại']);
   }

   public function new_post(Request $request){
      $this->authorize('crawl_edit');
      if($request -> post_id != ''){
         $post = M_post::find($request->post_id);
      }else{
         $post =  new M_post;
      }
         
         $post-> title = $request-> title;
         $post-> des = $request-> des;
         $post -> video = $request-> video;
         $post -> content = $request -> content;
         $post -> save();

         // Them danh muc
         // xoa danh muc hien tai 
         //  M_post_cat::where('post_id',$post->id)->delete();
         // $post_cat = new M_post_cat;
         // $post_cat -> cat_id = $request-> cat_id;
         // $post_cat -> post_id = $post -> id;
         // $post_cat -> save();

         // them slide 
         if($request -> slide != ''){ 
            $val_array =  array_filter(preg_split('/\r\n|[\r\n]/', $request -> slide));
            // xoa slide hien tai
            M_slide_img::where('post_id',$post->id)->delete();
            foreach($val_array as $key => $val){
                  $slide = new M_slide_img;
                  $slide -> img  = $val;
                  $slide -> post_id = $post->id;
                  $slide -> orderby = $key;
                  $slide -> save();
            }
         }
         // them file 
         if($request -> file != ''){
            M_file::where('post_id',$post->id)->delete();
            $file = new M_file;
            $file -> name = $request -> file;
            $file -> post_id = $post-> id;
            $file -> save();
         }

     return redirect()->back()->with('alert', 'Lưu thành công');
   }
}
