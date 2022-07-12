@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Danh sách thành viên: {{$type->name}}
         <a href="{{asset('admin/user')}}" class="btn btn-light btn-sm">Quay lại</a>
         <a href="" data-toggle="modal" data-target="#new_user" class="btn btn-danger btn-sm">Thêm tài khoản</a>

      </h1>
      @include('AdminUser::IV_Modal_user_new')
         </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title">Thành viên thuộc - {{$type -> name}}</h3>
               <div class="box-tools">
                 
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                     <tr>
                        <th scope="col" width="6%">Ảnh</th>
                        <th scope="col" width="">Email</th>
                        <th scope="col" class="text-center" width="">SĐT</th>
                        <th scope="col" class="text-center">Họ tên</th>
                        <th scope="col" class="text-center"><i class="fa fa-calendar-alt"></i></th>
                        <th scope="col" class="text-center"><i class="fa fa-edit"></i></th>
                        <th scope="col" width="">ID</th>
                     </tr>
                     @if(count($user) != 0)
                           @foreach($user as $val)
                              <tr>
                              <!-- anh thành vien -->
                              <td>
                                 @if($val->img)
                                    <img width="50px" src="data:image/jpeg;base64,{{$val->img}}" />
                                 @else
                                    <img class="" width="50px" src="{{asset('upload/theme/noimg.jpg')}}" />
                                 @endif
                              </td>
                              
                              <!-- email thanh vien  -->
                              <td class="">
                                 <a href="#" >
                                    {{$val->email}}
                                 </a>
                                 
                              </td>
                              {{-- dien thoai  --}}
                              <td class="text-center">
                                 {{$val -> tel}}
                              </td>
                              <!-- ho ten thanh vien -->
                              <td class="text-center">
                                 {{$val -> name}}
                              </td>
                              <!-- ngay tham gia  -->
                              <td class="text-center">
                                 {{$val -> created_at -> format('d/m/Y')}}
                              </td>
                              <!-- action -->
                              <td class="text-center">
                                 {{-- trang thai  --}}
                                 <?php
                                    //neu id = 1 -> la root cao nhat , khong hiẹn status
                                    if($val ->id != '1'){
                                       F_change_status($val);
                                    }
                                 ?>
                                 {{-- sua  --}}
                                 <a href="" data-toggle="modal" data-target="#edit_user_{{$val->id}}"><i class="fa fa-edit"></i></a>
                                 
                                 <?php if($val ->id != '1'){ ?>
                                    {{-- Xoa  --}}
                                    <a  href="" data-toggle="modal" data-target="#del_user_{{$val -> id}}">
                                       <i class="fa fa-trash text-danger"></i>
                                    </a> 
                                    {{-- xem  --}}
                                    <a href="#">
                                       <i class="fa fa-eye text-success"></i>
                                    </a>
                                 <?php } ?>
                                 {{-- mac dinh     --}}
                                 @if($val -> def == 'on') <i class="fa fa-shield-alt text-primary"></i> @endif
                              </td>
                              <th scope="col" width="1%">{{$val->id}}</th>
                           </tr>
                           @include('AdminUser::IV_Modal_user_edit')
                           @include('AdminUser::IV_Modal_user_del')
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection