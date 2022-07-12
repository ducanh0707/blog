@extends('V_backend.index')
@section('content')
<div class="content-wrapper"  style="background-color: #ecf0f5;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="{{asset('admin/dashboard/')}}" class="btn btn-primary btn-sm">Quay lại</a>

      <h3>Sửa thông tin website</h3>
      @include('V_backend/alert')
    </section>

    <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-2">
               <ul class="list-group" id="sortable">
                  @if(count($sidebar_list) > 0)
                     @foreach($sidebar_list as $val)
                        <li id="item_{{$val->id}}" class="ui-state-default list-group-item d-flex justify-content-between align-items-center @if($val -> id == $sidebar_id) {{'list-group-item-primary'}} @endif">
                           <a class="@if($val -> status != 'on') text-danger @endif" href="{{asset('admin/theme/sidebar/'.$val->id)}}">
                             {{$val->name}}
                           </a>
                        </li>
                     @endforeach
                  @endif
               </ul>
               <div class="dropdown">
                  <button class="btn btn-primary btn-sm mt-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Thêm hàng
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="{{asset('admin/theme/sidebar_new/img')}}"><i class="fa fa-plus text-sm"></i> Hình ảnh</a>
                     <a class="dropdown-item" href="{{asset('admin/theme/sidebar_new/content')}}"><i class="fa fa-plus text-sm"></i> Thêm Nội dung</a>
                     <a class="dropdown-item" href="{{asset('admin/theme/sidebar_new/menu')}}"><i class="fa fa-plus text-sm"></i> Thêm Menu</a>
                     <a class="dropdown-item" href="{{asset('admin/theme/sidebar_new/form')}}"><i class="fa fa-plus text-sm"></i> Thêm Form</a>
                     <a class="dropdown-item" href="{{asset('admin/theme/sidebar_new/tin_tuc')}}"><i class="fa fa-plus text-sm"></i> Thêm tin tức</a>
                     <a class="dropdown-item" href="{{asset('admin/theme/sidebar_new/video_youtube')}}"><i class="fa fa-plus text-sm"></i> Video Youtube</a>
                  </div>
               </div>

               @include('Theme::inc_menu')
 
               <script>
                  $(function() {
                     $("#sortable" ).sortable({
                        update: function (event, ui){
                           var data = $(this).sortable('serialize');
                           var token = '{{ csrf_token() }}';

                           // ajax 
                           $.ajax({
                              type: "POST",
                              url: '{{asset('')}}admin/theme/sidebar_order',
                              dataType: "json",
                              data: {data: data, _token:token},
                           });
                        }
                     });
                     $( "#sortable" ).disableSelection();
                  });
               </script>
               
            </div>
            <!-- ket thuc danh sach widget -->
            <!-- danh sach widget -->
            <div class="col-md-10">
               <div class="box box-primary">
                  @if($sidebar_first_id > 0)
                     <div class="box-header with-border">
                        <div class="box-title">
                           Sửa sidebar {{$sidebar->name}} | {{$sidebar->type}} <a href="#" data-toggle="modal" data-target="#del_sidebar"> <i class="fa fa-trash text-danger"></i></a>
                        </div>
                        <div class="modal fade" id="del_sidebar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                        
                              <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-trash"></i> Xóa hàng</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                                 </div>
                                 <div class="modal-body">
                                    <div>
                                       <div>
                                          <i class="fa fa-caret-right"></i> Tên: {{$sidebar->name}}
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                       <a href="{{asset('admin/theme/sidebar/'.$sidebar->id.'/del')}}" class="btn btn-sm btn-danger">Ok Xóa</a>
                                    </div>     
                                 </div> <!-- dong the modal -body -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- widget group meta  -->
                     <div class="box-body">
                        <form method="post" action="{{asset('admin/theme/sidebar/'.$sidebar_id)}}" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           <div class="form-group">
                              <label>Tên hàng</label>
                              <input type="text" name="name" class="form-control" value="{{$sidebar->name}}">
                           </div>
                           <div class="form-group">
                              <label>Tên hàng tiếng anh</label>
                              <input type="text" name="name_en" class="form-control" value="{{$sidebar->name_en}}">
                           </div>
                           
                           <div class="form-group">
                              <label>Mô tả</label>
                              <textarea name="des" class="form-control">{{$sidebar->des}}</textarea>
                           </div>
                           <div class="form-group">
                              <label>Mô tả tiếng anh</label>
                              <textarea name="des_en" class="form-control">{{$sidebar->des_en}}</textarea>
                           </div>
                          
                           
                           @if($sidebar->type == 'img')
                              <div class="form-group">
                                 <label><i class="fa fa-image"></i> Hình ảnh</label>
                                 {{F_input_image($sidebar->img,'img','image_sidebar',asset('source'))}}
                              </div>
                              <div class="form-group">
                                 <label>Liên kết</label>
                                 <input type="text" name="link" class="form-control" value="{{$sidebar->link}}">
                              </div>
                           @elseif($sidebar->type == 'content')
                              <div class="form-group">
                                 <label class="font-weight-bold"> Nội dung</label>
                                 <textarea class="form-control" name="content" id="edit_sidebar_content">{{$sidebar->content}}</textarea>
                                 {{ F_tinymce('edit_sidebar_content')}}
                              </div>
                           @elseif($sidebar->type == 'video')
                              {{-- video  --}}
                                 <div class="form-group">
                                    <div class="form-group">
                                       <label class="font-weight-bold">Mã nhúng video Youtube</label>
                                       <textarea class="form-control" name="video_youtube">{{$sidebar->video_youtube}}</textarea>
                                 </div>
                           @elseif($sidebar->type == 'menu')
                              <div class="form-group">
                                 <label><i class="fa fa-columns"></i> Chọn menu <a target="_blank" href="{{asset('admin/menu/0')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
                                    <select class="form-control" name="menu_id">
                                       <option value="0">Trống</option>
                                       @foreach($menu_list as $menu_sidebar_edit)
                                          <option value="{{$menu_sidebar_edit -> id}}" @if($menu_sidebar_edit->id == $sidebar->menu_id ) selected @endif>{{$menu_sidebar_edit -> name}}</option>   
                                       @endforeach
                                    </select>
                              </div>
                           @elseif($sidebar->type == 'form')
                              <div class="form-group">
                                 <label><i class="fa fa-columns"></i> Chọn form đăng ký <a target="_blank" href="{{asset('admin/form')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
                                    <select class="form-control" name="form_id">
                                       <option value="0">Trống</option>
                                       @foreach($form_list as $sidebar_form_edit)
                                          <option value="{{$sidebar_form_edit -> id}}" @if($sidebar_form_edit->id == $sidebar->form_id ) selected @endif>{{$sidebar_form_edit -> name}}</option>   
                                       @endforeach
                                    </select>
                              </div>
                           
                           @elseif($sidebar->type == 'tin_tuc')
                              <div class="form-group">
                                 <label>Số lượng bài viết</label>
                                 <input type="number" name="count_post" class="form-control" value="{{$sidebar->count_post}}">
                              </div>
                              <div class="form-group">
                                 <label><i class="fa fa-columns"></i> Chọn danh mục <a target="_blank" href="{{asset('admin/cat')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
                                    <select class="form-control" name="cat_id">
                                       <option value="0">Trống</option>
                                       @foreach($cat_list as $sidebar_tin_tuc_edit)
                                          <option value="{{$sidebar_tin_tuc_edit -> id}}" @if($sidebar_tin_tuc_edit->id == $sidebar->cat_id ) selected @endif>{{$sidebar_tin_tuc_edit -> name}}</option>   
                                       @endforeach
                                    </select>
                              </div>
                           @endif
                           <div class="form-group">
                              <select class="form-control" name="status">
                                 <option value="on">Kích hoạt</option>
                                 <option value="off">Ản</option>
                              </select>
                           </div>
                           <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                           {{-- ket thuc noi dung  --}}
                        </form>
                     </div>
                  @else 
                     <div class="box-header with-border">
                           Bạn chưa tạo sidebar
                     </div>
                  @endif
               </div>
            </div>
            <!-- ket thuc danh sach  -->
         </div>
         
      </section>
  </div>
@endsection