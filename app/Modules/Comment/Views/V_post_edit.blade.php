@extends('V_backend.index')
@section('content')
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
         <h1>
            Sửa bài viết   <a  href="{{$post->f_cat->first()->url.'/'.$post-> url.'.html'}}" target="_blank">
                  <i class="fa fa-eye"></i>
               </a>
         </h1>
      </section>
      @include('V_backend/alert')
      <!-- Main content -->
      <section class="content">
         <form action="{{$post->id}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
              <!-- left column -->
               <div class="col-md-8">
                <!-- general form elements -->
                  <div class="box box-primary">
                     <div class="box-header with-border">
                       <h3 class="box-title">Nội dung chính</h3>
                     </div>
                  <!-- /.box-header -->

                  <!-- form start -->
                     <div class="box-body">
                         <!-- tiêu đề -->
                        <div class="form-group">
                           <label>Tiêu đề bài viết</label>
                            <input type="text" class="form-control <?php foreach($errors -> all () as $errors_r){ if($errors_r == 'Bạn chưa nhập tiêu đề'){ echo 'border-danger';}}?>" id="title_post" placeholder="Bạn điền tiêu đề" name="title" onkeyup="ChangeToSlug();" value="{{$post->title}}">
                        </div>
                        <!-- Url-->
                        <div class="form-group">
                           <div class="input-group">
                              <div class="input-group-prepend">
                                 <div class="input-group-text">{{asset('')}}</div>
                              </div>
                              <input type="text" class="form-control" id="url_post" name="url" value="{{$post->url}}">
                           </div>
                        </div>
                        
                        <script>
                           function ChangeToSlug()
                           {
                              var title, slug;
                            
                              //Lấy text từ thẻ input title_news
                              title = document.getElementById("title_post").value;
                            
                              //Đổi chữ hoa thành chữ thường
                              slug = title.toLowerCase();
                            
                              //Đổi ký tự có dấu thành không dấu
                              slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                              slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                              slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                              slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                              slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                              slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                              slug = slug.replace(/đ/gi, 'd');
                              //Xóa các ký tự đặt biệt
                              slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                              //Đổi khoảng trắng thành ký tự gạch ngang
                              slug = slug.replace(/ /gi, "-");
                              //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                              //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                              slug = slug.replace(/\-\-\-\-\-/gi, '-');
                              slug = slug.replace(/\-\-\-\-/gi, '-');
                              slug = slug.replace(/\-\-\-/gi, '-');
                              slug = slug.replace(/\-\-/gi, '-');
                              //Xóa các ký tự gạch ngang ở đầu và cuối
                              slug = '@' + slug + '@';
                              slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                              //In slug ra textbox có id “url_news”
                              document.getElementById('url_post').value = slug;
                           }
                        </script>
                        @if(is_array(json_decode($post_type->feild))) @if(in_array('des',json_decode($post_type->feild)))
                           <!-- mo ta -->
                           <div class="form-group">
                              <label>Mô tả</label>
                              <textarea type="textarea" class="form-control" name="des">{{$post->des}}</textarea>
                           </div>
                        @endif  @endif
                        @if(is_array(json_decode($post_type->feild))) @if(in_array('img',json_decode($post_type->feild)))
                           <!-- Noi dung  -->
                           <br />
                           <div class="form-group">
                              <textarea class="form-control" id="post_edit" rows="3" name="content">{{$post->content}}</textarea>
                              <?php echo F_tinymce($id = 'post_edit'); ?>
                           </div>
                         @endif  @endif
                     </div>
                  </div>

               <!-- seo bai viet -->
               @include('Post::IV_seo_post_edit')
               </div>
               
               <!-- cot phai -->
               <div class="col-md-4">
                  <!-- duyet -->
                   <div class="box box-primary">
                     <div class="box-header with-border">
                       <h3 class="box-title"><label ><b>Ngày: </b></label> <?php $ldate = new DateTime(); echo $ldate->format('d-m-Y H:i'); ?>
                        </h3>
                     </div>
                     <div class="box-body">
                         <!-- trang thai -->
                        <div class="">
                              <!-- trang thai -->
                              <div class="form-group">
                                 <b>Trạng thái: </b> <br />
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" type="radio" name="status" id="on" value="on" @if($post -> status =='on') {{'checked'}} @endif class="custom-control-input">
                                    <label class="custom-control-label" for="on">Công khai</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" type="radio" name="status" id="off" value="off" @if($post -> status !='on') {{'checked'}} @endif class="custom-control-input">
                                    <label class="custom-control-label" for="off">Khóa</label>
                                 </div>
                                 </div>
                              </div>

                     </div>
                  </div>
                     <!-- danh muc -->
                     <div class="box box-danger">
                        <div class="box-header with-border">
                        <h3 class="box-title">Danh mục</h3>
                        </div>
                        <div class="box-body">
                              <?php F_checkbox_cat_multi_level($cat,$post); ?>
                        </div>
                     </div>
                  @if(is_array(json_decode($post_type->feild))) @if(in_array('img',json_decode($post_type->feild)))
                     <div class="box box-danger">
                        <div class="box-header with-border">
                        <h3 class="box-title">Ảnh đại diện</h3>
                        </div>
                        <div class="box-body">
                              {{F_input_image($post -> img,'img','edit_post',asset('/source/post/'))}}
                        </div>
                     </div>
                  @endif @endif
               </div>
            </div>
            <div class="button_action">
               <button type="submit" name="save_list" class="btn btn-primary" value="on">
                  Lưu
               </button>
               <button type="submit" name="save_new" class="btn" value="on">
                  Lưu và thêm mới
               </button>
               <button type="submit" name="save_edit" class="btn" value="on">
                  Lưu và xem lại
               </button>
            </div>
         </form>
      
      </section>
      <!-- /.content -->
   </div>

@endsection