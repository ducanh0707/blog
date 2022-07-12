@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <a href="{{asset('admin/theme')}}" class="btn btn-primary btn-sm" >Quay lại</a>
         <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#popup_new">Thêm mới</button>
         
         <form action="{{asset('admin/popup/new')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal fade" id="popup_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới popup</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body text-left">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="form-group">Tên popup</label>
                                       {{F_input_basic('text','','name','','form-control','','')}}
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Hình ảnh</label>
                                 {{F_input_image('','img','img_new_popup',asset('source/popup'))}}
                              </div> 
                              <div class="form-group">
                                 <div class="form-group">Liên kết</label>
                                       {{F_input_basic('text','','link','','form-control','','')}}
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label><i class="fa fa-columns"></i> Chọn form đăng ký <a target="_blank" href="{{asset('admin/form/0')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
                                    <select class="form-control" name="form">
                                       <option value="0">Trống</option>
                                       @foreach($form_list as $form)
                                          <option value="{{$form -> id}}">{{$form -> name}}</option>   
                                       @endforeach
                                    </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                    <label>Kích thước</label>
                                    <select class="form-control" name="size">
                                       <option value="modal-lg">Vừa</option>
                                       <option value="">Hơi Nhỏ</option>
                                       <option value="modal-sm">Nhỏ</option>
                                       <option value="modal-xl">Lớn</option>
                                    </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Hiển thị điện thoại</label>
                                 <select class="form-control" name="status_mobile">
                                    <option value="d-none d-sm-block d-md-block d-lg-block d-xl-block">Ẩn trên điện thoại</option>
                                    <option value="">Bật trên điện thoại</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                    <label>Kiểu</label>
                                    <select class="form-control" name="style">
                                       <option value="img" >Hình ảnh</option>
                                       <option value="form" >Form</option>
                                    </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label>Thời gian xuất hiện popup (giây)</label>
                                    <div class="input-group mb-2">
                                       <input type="number" name="time_deylay" class="form-control">
                                       <div class="input-group-prepend">
                                          <div class="input-group-text">giây</div>
                                       </div>
                                    </div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label>Thời gian xuất hiện lại popup sau khi tắt (phút)</label>
                                    <div class="input-group mb-2">
                                       <input type="number" name="time_cookie" class="form-control" value="20">
                                       <div class="input-group-prepend">
                                          <div class="input-group-text">phút</div>
                                       </div>
                                    </div>
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
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title">Danh sách sơ đồ</h3>
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
                  @if(count($popup) != 0)
                     @foreach($popup as $key => $val)
                        <tr>
                           <!-- cot anh dai dien -->
                           <td class=""> 
                              @if($val->img)
                                 <img width="30px" src="{{asset('source/popup/'.$val->img)}}" />
                              @else
                                  <img width="30px" src="{{asset('upload/theme/noimg.jpg')}}" />
                              @endif
                            </td>
                           <!-- cot tieu de -->
                           <td class="">
                              <div class="admin-list-post">
                                   <b  class="text-dark">{{$val->name}}</b>
                              </div>
                           </td>
                           <!-- link  -->
                           <td  class="text-center">
                              {{$val -> link}}
                           </td>
                      
                           <!-- id  -->
                           <td  class="text-center">
                              {{$val -> id}}
                           </td>
                           <td  class="text-center">
                           
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
                                          <b>Thông tin xóa: </b> {{$val -> name}}
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
                                          <h6 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-edit"></i> Sửa sơ đồ</h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                          <form action="{{asset('admin/popup/edit/'.$val->id)}}" method="POST" enctype="multipart/form-data">
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          
                                          <div class="form-group">
                                             <div class="form-group">Tên popup</label>
                                                   {{F_input_basic('text',$val->name,'name','','form-control','','')}}
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label>Hình ảnh</label>
                                             {{F_input_image($val->img,'img','img_edit_popup'.$val->id,asset('source/popup'))}}
                                          </div> 
                                          <div class="form-group">
                                             <div class="form-group">Liên kết</label>
                                                   {{F_input_basic('text',$val->link,'link','','form-control','','')}}
                                             </div>
                                          </div>
                                             <div class="form-group">
                                                <label><i class="fa fa-columns"></i> Chọn form đăng ký <a target="_blank" href="{{asset('admin/form/0')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
                                                   <select class="form-control" name="form_id">
                                                      <option value="0">Trống</option>
                                                      @foreach($form_list as $form)
                                                         <option value="{{$form -> id}}" @if($form->id == $val->form_id) selected @endif>{{$form -> name}}</option>   
                                                      @endforeach
                                                   </select>
                                             </div>
                     
                                             <div class="form-group row">
                                                <div class="col-md-4">
                                                   <label>Kích thước</label>
                                                   <select class="form-control" name="size">
                                                      <option value="modal-lg" @if($val -> size == 'modal-lg') selected @endif>Vừa</option>
                                                      <option value="" @if($val -> size == '') selected @endif>Hơi nhỏ</option>
                                                      <option value="modal-sm" @if($val -> size == 'modal-sm') selected @endif>Nhỏ</option>
                                                      <option value="modal-xl" @if($val -> size == 'modal-xl') selected @endif>Lớn</option>
                                                   </select>
                                                </div>
                                                <div class="col-md-4">
                                                   <label>Hiển thị điện thoại</label>
                                                   <select class="form-control" name="status_mobile">
                                                      <option value="d-none d-sm-block d-md-block d-lg-block d-xl-block" @if($val -> status_mobile == 'd-none d-sm-block d-md-block d-lg-block d-xl-block') selected @endif>Ẩn trên điện thoại</option>
                                                      <option value="" @if($val -> status_mobile == '') selected @endif>Bật trên điện thoại</option>
                                                   </select>

                                                </div>
                                                <div class="col-md-4">
                                                   <label>Kiểu</label>
                                                   <select class="form-control" name="style">
                                                      <option value="img" @if($val -> style == 'img') selected @endif>Hình ảnh</option>
                                                      <option value="form" @if($val -> style == 'form') selected @endif>Form đăng ký</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                         <label>Thời gian xuất hiện popup (giây)</label>
                                                         <div class="input-group mb-2">
                                                            <input type="number" name="time_deylay" class="form-control" value="{{$val->time_deylay}}">
                                                            <div class="input-group-prepend">
                                                               <div class="input-group-text">giây</div>
                                                            </div>
                                                         </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                         <label>Thời gian xuất hiện lại popup sau khi tắt (phút)</label>
                                                         <div class="input-group mb-2">
                                                            <input type="number" name="time_cookie" class="form-control" value="{{$val->time_deylay}}">
                                                            <div class="input-group-prepend">
                                                               <div class="input-group-text">phút</div>
                                                            </div>
                                                         </div>
                                                   </div>
                                                </div>
                                             </div>
                                          <div class="modal-footer">
                                             <a href="{{asset('admin/popup/del/'.$val->id)}}" class="btn btn-sm btn-warning"> Xóa</a> 
                                             <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                             <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                          </div>
                                       </form>
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
               {{$popup->appends(request()->input()) ->links()}}
            </div>
          </div>
  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection