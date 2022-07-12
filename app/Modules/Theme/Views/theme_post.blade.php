@extends('V_backend.index')
@section('content')
<div class="content-wrapper"  style="background-color: #ecf0f5;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3>Sửa chi tiết bài viết</h3>
      @include('V_backend/alert')
    </section>

    <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-2">
               @include('Theme::inc_menu')
               
            </div>
            <!-- ket thuc danh sach widget -->
            <!-- danh sach widget -->
            <div class="col-md-10">
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <div class="box-title">
                        Cài đặt chi tiết bài viết
                     </div>
                  </div>
                  <!-- widget group meta  -->
                  <div class="box-body">
                     <form action="{{asset('admin/theme/post')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                       
                        <div class="form-group row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Hiển thị bài viết liên quan</label>
                                 <select name="relate_post" class="form-control">
                                    <option value="on" @if($theme_post->relate_post == 'on') selected @endif>Có hiển thị</option>
                                    <option value="off" @if($theme_post->relate_post == 'off') selected @endif>Không hiển thị</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label><i class="fa fa-sliders-h"></i> Lề giao diện</label>
                                 <select class="form-control" name="width">
                                    <option value="container" @if($theme_post->width == 'container') selected @endif>Có lề</option>
                                    <option value="container-fluid" @if($theme_post->width == 'container-fluid') selected @endif>Không lề</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Cột 1</label>
                                 <select class="form-control form-control-sm" id="" name="col_1">
                                    <option value="col-md-12" @if($theme_post->col_1 == 'col-md-12') selected @endif>12/12 phần</option>
                                    <option value="col-md-11" @if($theme_post->col_1 == 'col-md-11') selected @endif>11/12 phần </option>
                                    <option value="col-md-10" @if($theme_post->col_1 == 'col-md-10') selected @endif>10/12 phần </option>
                                    <option value="col-md-9" @if($theme_post->col_1 == 'col-md-9') selected @endif>9/12 phần </option>
                                    <option value="col-md-8" @if($theme_post->col_1 == 'col-md-8') selected @endif>8/12 phần </option>
                                    <option value="col-md-7" @if($theme_post->col_1 == 'col-md-7') selected @endif>7/12 phần </option>
                                    <option value="col-md-6" @if($theme_post->col_1 == 'col-md-6') selected @endif>6/12 phần </option>
                                    <option value="col-md-5" @if($theme_post->col_1 == 'col-md-5') selected @endif>5/12 phần </option>
                                    <option value="col-md-4" @if($theme_post->col_1 == 'col-md-4') selected @endif>4/12 phần</option>
                                    <option value="col-md-3" @if($theme_post->col_1 == 'col-md-3') selected @endif>3/12 phần</option>
                                    <option value="col-md-2" @if($theme_post->col_1 == 'col-md-2') selected @endif>2/12 phần</option>
                                    <option value="col-md-1" @if($theme_post->col_1 == 'col-md-1') selected @endif>1/12 phần</option>
                              </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Cột 2</label>
                                 <select class="form-control form-control-sm" id="" name="col_2">
                                    <option value="col-md-12" @if($theme_post->col_2 == 'col-md-12') selected @endif>12/12 phần</option>
                                    <option value="col-md-11" @if($theme_post->col_2 == 'col-md-11') selected @endif>11/12 phần </option>
                                    <option value="col-md-10" @if($theme_post->col_2 == 'col-md-10') selected @endif>10/12 phần </option>
                                    <option value="col-md-9" @if($theme_post->col_2 == 'col-md-9') selected @endif>9/12 phần </option>
                                    <option value="col-md-8" @if($theme_post->col_2 == 'col-md-8') selected @endif>8/12 phần </option>
                                    <option value="col-md-7" @if($theme_post->col_2 == 'col-md-7') selected @endif>7/12 phần </option>
                                    <option value="col-md-6" @if($theme_post->col_2 == 'col-md-6') selected @endif>6/12 phần </option>
                                    <option value="col-md-5" @if($theme_post->col_2 == 'col-md-5') selected @endif>5/12 phần </option>
                                    <option value="col-md-4" @if($theme_post->col_2 == 'col-md-4') selected @endif>4/12 phần</option>
                                    <option value="col-md-3" @if($theme_post->col_2 == 'col-md-3') selected @endif>3/12 phần</option>
                                    <option value="col-md-2" @if($theme_post->col_2 == 'col-md-2') selected @endif>2/12 phần</option>
                                    <option value="col-md-1" @if($theme_post->col_2 == 'col-md-1') selected @endif>1/12 phần</option>
                              </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Hình ảnh</label>
                                 {{F_input_image($theme_post->post_img,'img','post_img',asset('source/theme'))}}
                             </div> 
                           </div>
   
                        </div>

                        <button type="submit" class="btn btn-primary">Gửi</button>
                     </form>
                  </div>
               </div>
            </div>
            <!-- ket thuc danh sach  -->
         </div>
         
      </section>
  </div>
@endsection