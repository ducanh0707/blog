@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách quyền thành viên
        <a href="{{asset('admin/user')}}" class="btn btn-light btn-sm">Quay lại</a>
        <a href="" data-toggle="modal" data-target="#new_permission" class="btn btn-success btn-sm">Thêm mới quyền</a>
       
      </h1>
 </section>
 @include('AdminUser::IV_Modal_permission_new')
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <div class="box-tools">
                 
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <div class="row">
                
                    <div class="col-md-6">
                        <div class="text-center font-weight-bold">web</div>
                        <table class="table table-hover">
                            <tr>
                                <th scope="col" width="">Tên quyền</th>
                                <th class="text-center">name</th>
                                <th ></th>
                                <th scope="col" width="">ID</th>
                            </tr>
                            @if(count($permission) != 0)
                                @foreach($permission as $key => $val)
                                <tr>
                                    <td class=""> {{$val->title}} </td>
                                    <td class="text-center">{{$val -> name}}</td>
                                    <!-- sua -->
                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#edit_permission_{{$val->id}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <div class="modal fade" id="edit_permission_{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <form action="{{asset('admin/user/permission/edit/'.$val->id)}}" method="post">
                                               <input type="hidden" name="_token" value="{{csrf_token()}}">
                                               <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới quyền</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                            <!-- ten dinh dang -->
                                                            <div class="form-group">
                                                            <label><i class="fa fa-user-secret"></i> <b>Tên quyền (viết liền không dấu)</b></label>
                                                            <input type="text" class="form-control" name="name" value="{{$val->name}}">
                                                            </div>
                                                            <!-- loai dinh dạng-->
                                                            <div class="form-group">
                                                                    <label> Tiêu đề (tên tiếng việt)</label>
                                                                    <input type="text" class="form-control" name="title" value="{{$val->title}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label> Loại</label>
                                                                    <select name="type" class="form-control">
                                                                        <option value="web" @if($val->type == 'web') selected @endif>Web</option>
                                                                        <option value="admin" @if($val->type == 'admin') selected @endif>Admin</option>
                                                                        <option value="domain" @if($val->type == 'domain') selected @endif>Domain</option>
                                                                    </select>
                                                                </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                                    </div>
                                                    </div>
                                                
                                                </div>
                                            </form>
                                        </div>
                                         
                                        <!-- xoa -->
                                        <a  href="" data-toggle="modal" data-target="#call_del_{{$val -> id}}">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                        <!-- form xoa --> 
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
                                                    <input type="hidden" name="id" value="{{$val -> id}}">
                                                    <b>Thông tin xóa: </b> <?php echo $val -> name?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                                    <a href="<?php echo asset(url()->current().'/del/'.$val -> id)?>" role="button" class="btn btn-danger">Ok Xóa</a>
                                                </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </td>
                                    <td scope="col" width="1%">{{$val->id}}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                <td colspan="9" class="text-center">
                                    <h6>Không có dữ liệu đủ điều kiện lọc</h6>
                                </td>
                                </tr>
                            @endif
                        </table>
                      
                    </div>
                    
                </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection