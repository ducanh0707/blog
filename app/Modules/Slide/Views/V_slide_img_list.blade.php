@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <a href="{{asset('admin/slide')}}" class="btn btn-primary btn-sm">Quay lại</a>
         <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#slide_new">Thêm ảnh mới</button>
         <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#slide_new_fast">Thêm nhanh nhiều ảnh</button>

         <div class="modal fade" id="slide_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalCenterTitle"> Thêm mới ảnh </h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{asset('admin/slide/'.$slide_id.'/img')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Tiêu đề ảnh silde</label>
                              {{F_input_textarea('','title','title_vi_new','form-control','','')}}
                              {{F_tinymce('title_vi_new')}}
                           </div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Tiêu đề ảnh silde tiếng anh</label>
                              {{F_input_textarea('','title','title_en_new','form-control','','')}}
                              {{F_tinymce('title_en_new')}}
                           </div>
                           <!-- ảnh slide  -->
                           <div class="form-group">
                              <div class="widget-img">
                                 <div class="img" id="img_group">
                                    <div class="button-del" id="button-del_group" style="" onclick="document.getElementById('imgInp_group').value = ''">
                                       <i class="fa fa-times-circle"></i>
                                    </div>
                                    <img width="200px" id="blah_group" src=""/>
                                 </div>
                                 <div class="">
                                    <label>Tải ảnh lên</label><br />
                                    <input type="file" name="img" class="form-controll" id="imgInp_group">
                                 </div>
                              </div>
                              <script>
                                 document.getElementById('button-del_group').style.display = "none";
                                 // hien thi anh truoc khi upload
                                 function readURL(input) {
                                 if (input.files && input.files[0]) {
                                    // hien thi div hinh anh
                                    document.getElementById('img_group').style.display = "block";
                                    var reader = new FileReader();
            
                                    reader.onload = function(e) {
                                       $('#blah_group').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                 }
                                 }
                                 $("#imgInp_group").change(function() {
                                 readURL(this);
                                 document.getElementById('button-del_group').style.display = "block";
                                 });
            
            
                                 // js xoa anh 
                                 $(document).ready(function(){
                                    $("#button-del_group").click(function(){
                                       // anh div hinh anh
                                       document.getElementById('img_group').style.display = "none";
                                    });
                                 });
            
                              </script>
                           </div>
                           <!-- link  -->
                           <div class="form-group">
                              <label class="font-weight-bold"> Link ảnh</label>
                              {{F_input_basic('text',$value = old('link'),'link','','form-control','','')}}
                           </div>
                          
                           <div class="form-group">
                              <label class="font-weight-bold"> Mô tả</label>
                              {{F_input_textarea('','des','des_vi_new','form-control','','')}}
                              {{F_tinymce('des_vi_new')}}
                           </div>

                           <div class="form-group">
                              <label class="font-weight-bold"> Mô tả tiếng anh</label>
                              {{F_input_textarea('','des_en','des_en_new','form-control','','')}}
                              {{F_tinymce('des_en_new')}}
                           </div>
                           <!-- nut bam  -->
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Tên nút bấm</label>
                                 {{F_input_basic('text',$value = old('button'),'button','','form-control','','')}}
                              </div>
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Tên nút bấm tiếng anh</label>
                                 {{F_input_basic('text',$value = old('button_en'),'button_en','','form-control','','')}}
                              </div>
                              <!-- link nut bam-->
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Link nút bấm</label>
                                 {{F_input_basic('text',$value = old('link_button'),'link_button','','form-control','','')}}
                              </div>
                           </div>
                           <!-- css class id  -->
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Class Css</label>
                                 {{F_input_basic('text',$value = old('css_class'),'css_class','','form-control','','')}}
                                 {{-- type, value, name, id,class , attri, placeholder --}}
                              </div>
                              <!-- css id -->
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Id Css</label>
                                 {{F_input_basic('text',$value = old('css_id'),'css_id','','form-control','','')}}
                                 {{-- type, value, name, id,class , attri, placeholder --}}
                              </div>
                              {{-- thu tu  --}}
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Thứ tự</label>
                                 {{F_input_basic('number',$value = old('orderby'),'orderby','','form-control','required','')}}
                                 {{-- type, value, name, id,class , attri, placeholder --}}
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                           <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
                        </div>
                     </form>
                  </div> <!-- dong the modal -body -->
               </div>
            </div>
         </div>
         <div class="modal fade" id="slide_new_fast" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalCenterTitle"> Thêm mới ảnh </h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{asset('admin/slide/'.$slide_id.'/img_fast')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                           <div class="form-group">
                              <div class="widget-img">
                                 <div class="">
                                    <label>Tải ảnh lên (bôi đen nhiều ảnh hoặc giữ nút shift)</label><br />
                                    <input type="file" name="img_fast[]" class="form-controll" multiple="multiple">
                                 </div>
                              </div>
   
                           </div>
                         </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                           <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
                        </div>
                     </form>
                  </div> <!-- dong the modal -body -->
               </div>
            </div>
         </div>

    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title">Danh sách slide </h3>
            </div>
            <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                  <tr>
                     <th>Ảnh</th>
                     <th>Tên</th>
                     <th class="text-center">Link</th>
                     <th class="text-center">id</th>
                     <th class="text-center"></th>
                  </tr>
                  @if(count($slide_img) != 0)
                     @foreach($slide_img as $key => $val)
                        <tr>
                           <!-- cot anh dai dien -->
                           <td class=""> 
                              @if($val->img)
                                 <img width="100px" src="{{asset('/source/slide/'.$val->img)}}" />
                              @else
                                  <img width="100px" src="{{asset('upload/theme/noimg.jpg')}}" />
                              @endif
                            </td>
                           <!-- cot tieu de -->
                           <td class="">
                              <div class="admin-list-post">
                                 <div class="si_title">
                                    <b  class="text-dark"><?php echo html_entity_decode($val->title) ?></b>
                                 </div>
                                 <div class="si_title"><?php echo html_entity_decode($val->des) ?>
                                 </div>
                              </div>
                           </td>
                        
                           <!-- link  -->
                           <td  class="text-center">
                              @if($val -> link != '')
                                 <a href="{{$val -> link}}" target="_blank"> Xem</a>
                              @endif
                           </td>
                           <!-- id  -->
                           <td  class="text-center">
                              {{$val -> id}}
                           </td>
                           <td  class="text-center">
                               <!-- cot  trang thai  -->
                               <?php if($val->status == 'off'){ ?>
                                 <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                                    <i class="fa fa-exclamation-circle text-danger"></i>
                                 </a>
                              <?php }elseif($val->status == 'on'){ ?>
                                 <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                                    <i class="fa fa-check-circle text-success"></i>
                                 </a>
                              <?php } ?>
                              <!-- xoa -->
                              <a  href="" data-toggle="modal" data-target="#call_del_{{$val -> id}}">
                                 <i class="fa fa-trash text-danger"></i>
                              </a>
                              <div class="modal fade" id="call_del_{{$val -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> Bạn có chắc chắn muốn xóa?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                          <!-- id thuoc tinh -->
                                          <b>Thông tin xóa: </b> {{$val -> title}}
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                          <a href="<?php echo url()->current().'/del/'.$val->id; ?>" role="button" class="btn btn-danger">Ok Xóa</a>
                                       </div>
                                    </div>
                                 </div>    
                              </div>
                              <!-- sua  -->
                              <a  href="" data-toggle="modal" data-target="#call_edit_{{$val -> id}}">
                                 <i class="fa fa-edit text-primary"></i>
                              </a>
                              <div class="modal fade" id="call_edit_{{$val -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h6 class="modal-title" id="exampleModalCenterTitle"> Sửa hình ảnh slide </h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                          <form action="{{asset('admin/slide/'.$slide_id.'/img/edit/'.$val->id)}}" method="POST" enctype="multipart/form-data">
                                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                                             <div>
                                                <div class="form-group">
                                                   <label class="font-weight-bold"> Tiêu đề ảnh silde</label>
                                                   {{F_input_textarea($val ->title,'title','title_vi_'.$val->id,'form-control','','')}}
                                                   {{F_tinymce('title_vi_'.$val->id)}}
                                                </div>
                                                <div class="form-group">
                                                   <label class="font-weight-bold"> Tiêu đề ảnh silde tiếng anh</label>
                                                   {{F_input_textarea($val ->title_en,'title_en','title_en_'.$val->id,'form-control','','')}}
                                                   {{F_tinymce('title_en_'.$val->id)}}
                                                </div>
                                                <!-- ảnh slide  -->
                                                <div class="form-group">
                                                   {{F_input_image($val -> img,'img',$val -> id,asset('/source/slide/'))}}
                                                </div>                   
                                                <!-- link  -->
                                                <div class="form-group">
                                                   <label class="font-weight-bold"> Link ảnh</label>
                                                   {{F_input_basic('text',$val -> link,'link','','form-control','','')}}
                                                </div>
                                             
                                                <div class="form-group">
                                                   <label class="font-weight-bold"> Mô tả</label>
                                                   {{F_input_textarea($val ->des,'des','des_vi_'.$val->id,'form-control','','')}}
                                                   {{F_tinymce('des_vi_'.$val->id)}}
                                                </div>
                                                <div class="form-group">
                                                   <label class="font-weight-bold"> Mô tả tiếng anh</label>
                                                   {{F_input_textarea($val ->des_en,'des_en','des_en_'.$val->id,'form-control','','')}}
                                                   {{F_tinymce('des_en_'.$val->id)}}
                                                </div>
                                                <!-- nut bam  -->
                                                <div class="form-group row">
                                                   <div class="col-md-6">
                                                      <label class="font-weight-bold">Tên nút bấm</label>
                                                      {{F_input_basic('text',$val -> button,'button','','form-control','','')}}
                                                   </div>
                                                   <div class="col-md-6">
                                                      <label class="font-weight-bold">Tên nút bấm tiếng anh</label>
                                                      {{F_input_basic('text',$val -> button_en,'button_en','','form-control','','')}}
                                                   </div>
                                                   <!-- link nut bam-->
                                                   <div class="col-md-6">
                                                      <label class="font-weight-bold">Link nút bấm</label>
                                                      {{F_input_basic('text',$val -> link_button,'link_button','','form-control','','')}}
                                                   </div>
                                                </div>
                                                <!-- css class id  -->
                                                <div class="form-group row">
                                                   <div class="col-md-6">
                                                      <label class="font-weight-bold">Class Css</label>
                                                      {{F_input_basic('text',$val ->css_class,'css_class','','form-control','','')}}
                                                      {{-- type, value, name, id,class , attri, placeholder --}}
                                                   </div>
                                                   <!-- css id -->
                                                   <div class="col-md-6">
                                                      <label class="font-weight-bold">Id Css</label>
                                                      {{F_input_basic('text',$val ->css_id,'css_id','','form-control','','')}}
                                                      {{-- type, value, name, id,class , attri, placeholder --}}
                                                   </div>
                                                   {{-- thu tu  --}}
                                                   <div class="col-md-6">
                                                      <label class="font-weight-bold">Thứ tự</label>
                                                      {{F_input_basic('number',$val -> orderby,'orderby','','form-control','required','')}}
                                                      {{-- type, value, name, id,class , attri, placeholder --}}
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>    
                              </div>
                           </td>
                        </tr>
                     @endforeach   
                  @else
                     <tr>
                        <td colspan="9" class="text-center">
                           <h6>Không có bài viết đủ điều kiện lọc</h6>
                        </td>
                     </tr>
                  @endif
               </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               {{$slide_img->appends(request()->input()) ->links()}}
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection