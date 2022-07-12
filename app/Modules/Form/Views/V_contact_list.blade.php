@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
         <h1>
            Danh sách đăng ký   <a href="{{asset('admin/form/0')}}" class="btn btn-sm btn-primary">Cấu hình </a>
         </h1>
       </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
         <div class="col-md-12">
            @foreach($contact_list as $contact_list_r)
               @if($form  ->id != $contact_list_r -> id)
                  <a href="{{asset('admin/form/'.$contact_list_r ->id.'/contact')}}" class="btn btn-sm btn-primary">Khách hàng {{$contact_list_r -> name}}</a>
               @endif      
            @endforeach
         </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title">Danh sách: {{$form -> name}} </h3>
               <div class="box-tools">
                   <div class="input-group input-group-sm" style="width: 200px;">
                     <input type="text" name="table_search" class="form-control pull-right" placeholder="Tìm kiếm">

                     <div class="input-group-btn">
                       <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                     </div>
                   </div>
               </div>
            </div>
            <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                  <tr>
                     <th>ID</th>
                     <th>Họ tên</th>
                     <th>Điện thoại</th>
                     <th>Email</th>
                     <th>Quan tâm</th>
                     <th>Yêu cầu</th>
                     <th class="text-center">Ngày</th>
                     <th class="text-center"></th>
                     <th class="text-center"></th>
                  </tr>
                  @if(count($contact) != 0)
                     @foreach($contact as $key => $val)
                        <tr>
                           <td>  
                              {{$val ->id}}
                           </td>
                           <td>
                              {{$val -> full_name}}
                           </td>
                           <td>
                              {{$val -> tel}}
                           </td>
                           <td>
                              {{$val -> email}}
                           </td>
                           <td>
                              {{$val -> request}}
                           </td>
                           <td>
                              @if(json_decode($val -> care))@foreach(json_decode($val -> care) as $key_c => $care)@if($key_c != 0), @endif{{$care}} @endforeach @endif
                           </td>
                           <!-- cot ngay dang  -->
                           <td class="text-center">
                              <?php 
                                 $date_today = new DateTime();
                                 $date = date_create($val -> created_at);
                              ?>
                              <div class="">
                                 <?php echo date_format($date,'d/m/Y'); ?><br />
                                 <?php echo date_format($date,'H:i:s'); ?>
                              </div>
                             
                           </td>
                          
                           <td class="text-center">
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
                                          <b>Thông tin xóa: </b> {{$val ->code}}
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                          <a href="<?php echo url()->current().'/del/'.$val->id; ?>" role="button" class="btn btn-danger">Ok Xóa</a>
                                       </div>
                                    </div>
                                 </div>    
                              </div>
                           </td>

                           <td class="text-center">{{$val-> id}}</td>
                        </tr>
                     @endforeach   
                  @else
                     <tr>
                        <td colspan="9" class="text-center">
                           <h6>Chưa có khách đăng ký</h6>
                        </td>
                     </tr>
                  @endif
               </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               {{$contact->appends(request()->input()) ->links()}}
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection