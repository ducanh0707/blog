@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#file_new">Thêm mới</button>

         <div class="modal fade" id="file_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalCenterTitle"> Thêm mới slide </h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{asset('admin/file/new')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                           <label>Tên file tải</label>
                           <input class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group">
                           <label>Link tải</label>
                           <input class="form-control" name="link" type="text">
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
            </div>
            <div class="box-body table-responsive no-padding">
               <div class="row">
                  <div class="col-md-12">
                     <h3 class="box-title">Danh sách tải file </h3>
                     <table class="table table-hover">
                        <tr>
                           <th width="1%">TT</th>
                           <th>Tên</th>
                           <th>link</th>
                           <th></th>
                        </tr>
                        @foreach($file as $key => $file_r)
                           <tr>
                              <td>{{$key+1}}</td>
                              <td>{{$file_r->name}}</td>
                              <td>{{$file_r->link}}</td>
                              <td>
                                 {{-- xoa  --}}
                                 <span style="cursor:pointer"><i class="fa fa-trash" data-toggle="modal" data-target="#call_del_{{$file_r -> id}}"></i></span>
                                 <div class="modal fade" id="call_del_{{$file_r -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                             <b>Thông tin xóa: </b> {{$file_r -> name}}
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                             <a href="<?php echo url()->current().'/del/'.$file_r->id; ?>" role="button" class="btn btn-danger">Ok Xóa</a>
                                          </div>
                                       </div>
                                    </div>    
                                 </div>
                                 {{-- sua  --}}
                                 <span style="cursor:pointer"><i class="fa fa-edit text-primary" data-toggle="modal" data-target="#call_edit_{{$file_r -> id}}"></i></span>
                                 <div class="modal fade" id="call_edit_{{$file_r -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">   
                                       <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title"><i class="fa fa-edit text-primary"></i> Sửa {{$file_r->name}}</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body text-left">
                                             <form action="{{asset('admin/file/edit/'.$file_r->id)}}" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div class="form-group">
                                                   <label>Tên file tải</label>
                                                   <input class="form-control" name="name" type="text" value="{{$file_r->name}}">
                                                </div>
                                                <div class="form-group">
                                                   <label>Link tải</label>
                                                   <input class="form-control" name="link" type="text"  value="{{$file_r->link}}">
                                                </div>
                        
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                                   <button type="submit" class="btn btn-sm btn-primary">Sửa</button>
                                                </div>
                                             </form>
                                          </div>
                                          
                                       </div>
                                    </div>    
                                 </div>


                              </td>
                           </tr>
                        @endforeach
                           
                     </table>
                  </div>
                  <hr>
                  <div class="col-md-12 py-3">
                     <h4>Hướng dẫn</h4>
                     - <b>Copy link file:</b> bạn click chuột phải vào file cần lấy link, chọn xem URL để copy lin cần lấy.
                  </div>
                  <hr>
                  <div class="col-md-12">
                     <h3 class="box-title">Thư viện </h3>
                     <div class="file">
                        <iframe  width="100%" height="550" frameborder="0"
                           src="<?php echo asset('') ?>filemanager/dialog.php?type=0&field_id=image_link&lang=vi_VN&akey=NqHqdtye76t1K" >
                        </iframe>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.box -->
         </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection