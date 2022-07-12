@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tab_new">Thêm mới</button>
         
         <div class="modal fade" id="tab_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalCenterTitle"> Thêm mới Sơ đồ </h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{asset('admin/popup_regis/new')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Họ tên</label>
                              {{F_input_basic('text',$value = old('name'),'name','','form-control','','')}}
                           </div>
                           
                           <div class="form-group">
                              <label class="font-weight-bold"> Điện thoại</label>
                              {{F_input_basic('text',$value = old('tel'),'tel','','form-control','','')}}
                           </div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Email</label>
                              {{F_input_basic('text',$value = old('email'),'email','','form-control','','')}}
                           </div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Hành động</label>
                              {{F_input_basic('text',$value = old('noti'),'noti','','form-control','','')}}
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
               <h3 class="box-title">Danh sách popup đăng ký</h3>
            </div>
            <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                  <tr>
                     <th>Tên</th>
                     <th class="text-center">Số điên thoại</th>
                     <th class="text-center">Email</th>
                     <th class="text-center">Noti</th>
                     <th class="text-center">id</th>
                     <th class="text-center"></th>
                  </tr>
                  @if(count($popup_regis) != 0)
                     @foreach($popup_regis as $key => $val)
                        <tr>
                           <!-- cot ten -->
                           <td class="">
                              <div class="admin-list-post">
                                   <b  class="text-dark">{{$val->name}}</b>
                              </div>
                           </td>
                           <!-- tel  -->
                           <td  class="text-center">
                              {{$val->tel}}
                           </td>
                           <!-- email   -->
                           <td  class="text-center">
                              {{$val->email}}
                           </td>
                           <!-- notei-->
                           <td  class="text-center">
                              {{$val->noti}}
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
                                          <form action="{{asset('admin/popup_regis/edit/'.$val->id)}}" method="POST" enctype="multipart/form-data">
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <div>
                                             <div class="form-group">
                                                <label class="font-weight-bold"> Họ tên</label>
                                                {{F_input_basic('text',$val->name,'name','','form-control','','')}}
                                             </div>
                                             
                                             <div class="form-group">
                                                <label class="font-weight-bold"> Điện thoại</label>
                                                {{F_input_basic('text',$val->tel,'tel','','form-control','','')}}
                                             </div>
                                             <div class="form-group">
                                                <label class="font-weight-bold"> Email</label>
                                                {{F_input_basic('text',$val->email,'email','','form-control','','')}}
                                             </div>
                                             <div class="form-group">
                                                <label class="font-weight-bold"> Hành động</label>
                                                {{F_input_basic('text',$value = old('noti'),'noti','','form-control','','')}}
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
               {{$popup_regis->appends(request()->input()) ->links()}}
            </div>
          </div>
       
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection