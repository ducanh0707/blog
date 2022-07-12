@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <a href="{{asset('admin/theme')}}" class="btn btn-primary btn-sm" >Quay lại</a>
         <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ring_new">Thêm mới</button>
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title"><i class="fa fa-arrows-alt"></i> Nút bấm liên hệ</h3>
               <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
               </div>
            </div>
             {{-- popup them nut bam  --}}
               <form action="{{asset('admin/button_ring/new')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="modal fade" id="ring_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới nút bấm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body text-left">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">Tên nút bấm</label>
                                          {{F_input_basic('text','','ring_new[name]','','form-control','','')}}
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Tên hoặc số điện thoại</label>
                                          <input type="text" class="form-control form-control-sm" name="ring_new[text]">
                                    </div>
                                    <div class="form-group">
                                          <label class="font-weight-bold">Kiểu</label>
                                          <select class="form-control" name="ring_new[type]">
                                             <option value="tell">Số điện thoại</option>
                                             <option value="email">Email</option>
                                             <option value="link">Link</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label>Liên kết</label>
                                          <input type="text" class="form-control form-control-sm" name="ring_new[link]">
                                    </div>
                                    <div class="form-group">
                                          <label>Màu chữ</label>
                                          {{F_input_color('','ring_new[color_text]','color_re_text_new','form-control form-control-sm','')}}
                                          <script>
                                             $('#color_re_text_new').colorpicker()
                                             function ChangeBgColor(){
                                             var  bgcolor = document.getElementById("color_re_text_new").value;
                                             document.getElementById("color_re_text_new").style.backgroundColor = bgcolor;
                                             }
                                          </script>
                                    </div>
                                    
                                    <div class="form-group">
                                          <label class="font-weight-bold"> Vị trí</label>
                                          <select class="form-control" name="ring_new[position]">
                                             <option value="right">Bên phải</option>
                                             <option value="left">Bên trái</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                          <label class="font-weight-bold"> Khoảng cách trên (50px hoặc 2%)</label>
                                          {{F_input_basic('text','','ring_new[css_top]','','form-control','','')}}
                                          {{-- type, value, name, id,class , attri, placeholder --}}
                                    </div>
                                    <div class="form-group">
                                          <label class="font-weight-bold"> Khoảng cách dưới (50px hoặc 2%)</label>
                                          {{F_input_basic('text','','ring_new[css_bottom]','','form-control','','')}}
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                          <label>Biểu tượng &#60;i class="fa fa-phone-volume"&#62;&#60;/i&#62; </label>
                                          <input type="text" class="form-control form-control-sm" name="ring_new[icon]">
                                          Copy biểu tượng <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">ở đây</a> 
                                    </div>
                                    <div class="form-group">
                                          <label>Màu nền</label>
                                          {{F_input_color('','ring_new[color_bg]','color_re_bg_new','form-control form-control-sm','')}}
                                          <script>
                                             $('#color_re_bg_new').colorpicker()
                                             function ChangeBgColor(){
                                             var  bgcolor = document.getElementById("color_re_bg_new").value;
                                             document.getElementById("color_re_bg_new").style.backgroundColor = bgcolor;
                                             }
                                          </script>
                                    </div>
                                    <div class="form-group">
                                          <label class="font-weight-bold"> Cỡ chữ  (14px)</label>
                                          {{F_input_basic('text','','ring_new[font]','','form-control','','')}}
                                    </div>
                                    <div class="form-group">
                                          <label class="font-weight-bold"> Khoảng cách trái (50px hoặc 2%)</label>
                                          {{F_input_basic('text','','ring_new[css_left]','','form-control','','')}}
                                    </div>
                                    <div class="form-group">
                                          <label class="font-weight-bold"> Khoảng cách phải (50px hoặc 2%)</label>
                                          {{F_input_basic('text','','ring_new[css_right]','','form-control','','')}}
                                    </div>
                                    <div class="form-group">
                                          <label class="font-weight-bold">Trạng thái</label>
                                          <select class="form-control" name="ring_new[status]">
                                             <option value="on">Hiển thị</option>
                                             <option value="off">Ẩn</option>
                                          </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                 <button type="submit" class="btn btn-primary">Gửi</button>
                              </div>     
                        </div> <!-- dong the modal -body -->
                        </div>
                     </div>
                  </div>
               </form>
            <div class="box-body">
               <form action="{{asset('admin/button_ring')}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  @foreach($button_ring as $button_ring_r)
                     <h6><i class="fa fa-caret-right"></i> {{$button_ring_r->name}}</h6>
                     <div class="form-group row">
                        <div class="col-md-3">
                              <label>Tên hoặc số điện thoại</label>
                              <input type="text" class="form-control form-control-sm" name="ring[{{$button_ring_r->id}}][text]" value="{{$button_ring_r->text}}">
                        </div>
                        
                        <div class="col-md-3">
                              <label>Liên kết</label>
                              <input type="text" class="form-control form-control-sm" name="ring[{{$button_ring_r->id}}][link]" value="{{$button_ring_r->link}}">
                        </div>
                        <div class="col-md-2">
                              <label>Màu chữ</label>
                              {{F_input_color($button_ring_r->color_text,'ring['.$button_ring_r->id.'][color_text]','color_re_text_'.$button_ring_r->id,'form-control form-control-sm','')}}
                              <script>
                                 $('#color_re_text_{{$button_ring_r->id}}').colorpicker()
                                 function ChangeBgColor(){
                                    var  bgcolor = document.getElementById("color_re_text_{{$button_ring_r->id}}").value;
                                    document.getElementById("color_re_text_{{$button_ring_r->id}}").style.backgroundColor = bgcolor;
                                 }
                              </script>
                        </div>
                        <div class="col-md-2">
                              <label>Màu nền</label>
                              {{F_input_color($button_ring_r->color_bg,'ring['.$button_ring_r->id.'][color_bg]','color_re_bg_'.$button_ring_r->id,'form-control form-control-sm','')}}
                              <script>
                                 $('#color_re_bg_{{$button_ring_r->id}}').colorpicker()
                                 function ChangeBgColor(){
                                    var  bgcolor = document.getElementById("color_re_bg_{{$button_ring_r->id}}").value;
                                    document.getElementById("color_re_bg_{{$button_ring_r->id}}").style.backgroundColor = bgcolor;
                                 }
                              </script>
                        </div>
                        <div class="col-md-2">
                              <label>Trạng thái</label><br>
                              <span class="btn btn-sm  @if($button_ring_r -> status == 'on') btn-success @else btn-danger @endif">@if($button_ring_r -> status == 'on') Hiển thị @else Ẩn @endif</span>
                              <span class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_ring_{{$button_ring_r->id}}">Sửa</span>
                              {{-- popup sua   --}}
                                 <div class="modal fade" id="edit_ring_{{$button_ring_r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                       <div class="modal-content">
                                             <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalCenterTitle">Sửa: {{$button_ring_r->name}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                             <div class="row">
                                                <div class="col-md-12">
                                                   <div class="form-group">Tên nút bấm</label>
                                                         {{F_input_basic('text',$button_ring_r->name,'ring['.$button_ring_r->id.'][name]','','form-control','','')}}
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                         <label class="font-weight-bold">Kiểu</label>
                                                         <select class="form-control" name="ring[{{$button_ring_r->id}}][type]">
                                                            <option value="tell" @if($button_ring_r->type == 'tell') selected @endif>Số điện thoại</option>
                                                            <option value="email" @if($button_ring_r->type == 'email') selected @endif>Email</option>
                                                            <option value="link" @if($button_ring_r->type == 'link') selected @endif>Link</option>
                                                         </select>
                                                   </div>
                                                   <div class="form-group">
                                                         <label>Biểu tượng ví dụ: &#60;i class="fa fa-phone-volume"&#62;&#60;/i&#62; </label>
                                                         <input type="text" class="form-control form-control-sm" placeholder="Biểu tượng" name="ring[{{$button_ring_r->id}}][icon]" value="{{$button_ring_r->icon}}">
                                                         Copy biểu tượng <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">ở đây</a> 
                                                   </div>
                                                   <div class="form-group">
                                                         <label class="font-weight-bold"> Vị trí</label>
                                                         <select class="form-control" name="ring[{{$button_ring_r->id}}][position]">
                                                            <option value="right" @if($button_ring_r->position == 'right') selected @endif>Bên phải</option>
                                                            <option value="left" @if($button_ring_r->position == 'left') selected @endif>Bên trái</option>
                                                         </select>
                                                   </div>
                                                   <div class="form-group">
                                                         <label class="font-weight-bold"> Khoảng cách trên (50px hoặc 2%)</label>
                                                         {{F_input_basic('text',$button_ring_r->css_top,'ring['.$button_ring_r->id.'][css_top]','','form-control','','')}}
                                                         {{-- type, value, name, id,class , attri, placeholder --}}
                                                   </div>
                                                   <div class="form-group">
                                                         <label class="font-weight-bold"> Khoảng cách dưới (50px hoặc 2%)</label>
                                                         {{F_input_basic('text',$button_ring_r->css_bottom,'ring['.$button_ring_r->id.'][css_bottom]','','form-control','','')}}
                                                   </div>
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                         <label class="font-weight-bold"> Cỡ chữ  (14px)</label>
                                                         {{F_input_basic('text',$button_ring_r->font,'ring['.$button_ring_r->id.'][font]','','form-control','','')}}
                                                   </div>
                                                   <div class="form-group">
                                                         <label class="font-weight-bold"> Khoảng cách trái (50px hoặc 2%)</label>
                                                         {{F_input_basic('text',$button_ring_r->css_left,'ring['.$button_ring_r->id.'][css_left]','','form-control','','')}}
                                                   </div>
                                                   <div class="form-group">
                                                         <label class="font-weight-bold"> Khoảng cách phải (50px hoặc 2%)</label>
                                                         {{F_input_basic('text',$button_ring_r->css_right,'ring['.$button_ring_r->id.'][css_right]','','form-control','','')}}
                                                   </div>
                                                   <div class="form-group">
                                                         <label class="font-weight-bold">Trạng thái</label>
                                                         <select class="form-control" name="ring[{{$button_ring_r->id}}][status]">
                                                            <option value="on" @if($button_ring_r->status == 'on') selected @endif>Hiển thị</option>
                                                            <option value="off" @if($button_ring_r->status == 'off') selected @endif>Ẩn</option>
                                                         </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                                <a href="{{asset('admin/button_ring/del/'.$button_ring_r->id)}}" class="btn btn-sm btn-warning"> Xóa</a> 
                                                <button type="submit" class="btn btn-sm btn-primary">Lưu thông tin</button>
                                             </div>     
                                          </div> <!-- dong the modal -body -->
                                       </div>
                                    </div>
                                 </div>
                              
                        </div>
                     </div>
                  @endforeach
                  <button type="submit" class="btn btn-primary">Lưu thông tin</button>
               </form>
            </div>
          </div>
       
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection