@extends('V_backend.index')
@section('content')
<div class="content-wrapper"  style="background-color: #ecf0f5;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="{{asset('admin/dashboard')}}" class="btn btn-primary btn-sm">Quay lại</a>
       
      <h3>Sửa thông tin website</h3>
      @include('V_backend/alert')
    </section>

    <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-2">
               @include('Theme::inc_menu')
            </div>
            
            <div class="col-md-10">
               <form action="{{asset('admin/theme/info')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <div class="box-title">
                           Tối ưu SEO
                        </div>
                     </div>
                     <!-- widget group meta  -->
                     <div class="box-body">
                           <!-- toi uu seo -->
                           <!-- tieu de bài viết  -->
                           <div class="form-group">
                                <input type="text" class="form-control" placeholder="Tiêu đề SEO <title></title>" name="title_seo" value="{{$theme -> title_seo}}">
                                <div>
                                    <div class="text-right">
                                        <a data-toggle="collapse" href="#title_seo" role="button" aria-expanded="false"
                                            aria-controls="title_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="title_seo">
                                        <div class="form-group">
                                            <label>Tiêu đề SEO tiếng anh</label>
                                            <input type="text" class="form-control" value="{{$theme ->title_seo_en}}" name="title_seo_en" >
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                           <!-- mô tả bài viết  -->
                           <div class="form-group">
                                <textarea  class="form-control" rows="3" name="des_seo" placeholder="Mô tả SEO (meta description)">{{$theme -> des_seo}}</textarea>
                                <div>
                                    <div class="text-right">
                                        <a  data-toggle="collapse" href="#des_seo" role="button" aria-expanded="false" aria-controls="des_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="des_seo">
                                        <div class="form-group">
                                            <label>Mô tả bài viết tiếng anh</label>
                                            <textarea  class="form-control" rows="3" name="des_seo_en">{{$theme -> des_seo_en}}</textarea>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                           <!-- meta keyword bài viết  -->
                           <div class="form-group">
                               <input type="text"  class="form-control" rows="3" name="key_seo" placeholder="Từ khóa SEO, cách nhau dấu phẩy (meta keyword)" value="{{$theme -> key_seo}}">
                               <div>
                                    <div class="text-right">
                                        <a  data-toggle="collapse" href="#key_seo" role="button" aria-expanded="false" aria-controls="key_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="key_seo">
                                        <div class="form-group">
                                            <label>Keywords tiếng anh</label>
                                            <input type="text" class="form-control" rows="3" name="key_seo_en"  value="{{$theme  -> key_seo_en}}">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                           <!-- index-->
                           <div class="form-group">
                              <select class="form-control" name="index_meta">
                                 <option value="INDEX, FOLLOW" @if($theme -> index_meta == 'INDEX, FOLLOW') {{'selected'}} @endif>INDEX, FOLLOW</option>
                                 <option value="NOINDEX, FOLLOW" @if($theme -> index_meta == 'NOINDEX, FOLLOW') {{'selected'}} @endif>NOINDEX, FOLLOW</option>
                                 <option value="INDEX, NOFOLLOW" @if($theme -> index_meta == 'INDEX, NOFOLLOW') {{'selected'}} @endif>INDEX, NOFOLLOW</option>
                                 <option value="NOINDEX, NOFOLLOW" @if($theme -> index_meta == 'NOINDEX, NOFOLLOW') {{'selected'}} @endif>NOINDEX, NOFOLLOW</option>
                              </select>
                           </div>
                     </div>
                  </div>

                  {{-- Cài đặt chức năng  --}}
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <div class="box-title">
                           Cài đặt chức năng
                        </div>
                     </div>
                     <div class="box-body">
                        <div class="form-group row">
                           {{-- <div class="col-md-3">
                              <label class="font-weight-bold">Cài đặt popup</label>
                              <select name="popup" class="form-control">
                                 <option value="">Tắt</option>
                                 @foreach($popup as $poup_r)
                                    <option value="{{$poup_r->id}}" @if($theme->popup == $poup_r->id) selected @endif>{{$poup_r->name}}</option>
                                 @endforeach
                              </select>
                              Sửa popup <a href="{{asset('admin/popup')}}">tại đây</a>
                           </div>
                           <div class="col-md-3">
                              <label class="font-weight-bold">Khách hàng đăng đã đăng ký</label>
                              <select name="popup_regis" class="form-control">
                                 <option value="on" @if($theme->popup_regis == 'on') selected @endif>Bật</option>
                                 <option value="off" @if($theme->popup_regis == 'off') selected @endif>Tắt</option>
                              </select>
                           </div> --}}
                           <div class="col-md-6">
                              <label class="font-weight-bold">Nút bấm số điện thoại</label>
                                 <div class="form-group">
                                    @foreach($buton_ring as $key_br => $buton_ring_r)
                                       <div class="form-check form-check-inline">
                                          <input class="form-check-input" name="button_ring[]" type="checkbox" id="br_{{$key_br}}" value="{{$buton_ring_r->id}}" @if($buton_ring_r->status == 'on') checked @endif>
                                          <label class="form-check-label" for="br_{{$key_br}}">{{$buton_ring_r->name}}</label>
                                       </div>
                                    @endforeach
                                 </div>
                              Sửa nút bấm tại đây <a href="{{asset('admin/button_ring')}}">tại đây</a>
                           </div>
                           
                        </div>
                        
                     </div>
                  </div>

                    {{-- phan head  --}}
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="box-title">
                            Cài đặt head
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                            <label><i class="fa fa-image"></i> Ảnh favicon (kích thước tối đa 100pixel x 100pixel)</label>
                            {{F_input_image($theme->favicon,'img','edit_favicon',asset('/source/theme/'))}}
                            </div>
                            <div class="form-group">
                            <label><i class="fa fa-image"></i> Ảnh hiển thị mạng xã hội cho trang chủ (facebook, zalo)</label>
                            {{F_input_image_2($theme->og_image,'og_image','edit_og_image',asset('/source/theme/'))}}
                            </div>
                            <div class="form-group">
                            <label class="font-weight-bold"><i class="fa fa-book-reader"></i> Code head</label>
                            <textarea name="head" class="form-control" id="" cols="30" rows="10">{{$theme->head}}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- contact  --}}
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="box-title">
                                Liên hệ
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Địa chỉ</label>
                                <textarea name="contact" class="form-control" id="contact_t" cols="30" rows="10">{{$theme->contact}}</textarea>
                                {{ F_tinymce('contact_t')}}
                                <div>
                                    <div class="text-right">
                                        <a  data-toggle="collapse" href="#conact_seo" role="button" aria-expanded="false" aria-controls="conact_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="conact_seo">
                                        <div class="form-group">
                                            <label>Mô tả bài viết tiếng anh</label>
                                            <textarea  class="form-control" id="contact_en" rows="3" name="contact_en">{{$theme -> contact_en}}</textarea>
                                            {{ F_tinymce('contact_en')}}
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  {{-- gui  --}}
                  <button type="submit" class="btn btn-primary">Lưu thông tin</button>
               </form>
            </div>
            <!-- ket thuc danh sach  -->
         </div>
         
      </section>
  </div>
@endsection