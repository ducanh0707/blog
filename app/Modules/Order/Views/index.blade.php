@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">

    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title mb-3">Danh sách đơn hàng</h3>
               <br>
               <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#call_new"><i class="fa fa-edit"></i> Thêm mới</a>
               <a class="btn btn-sm btn-primary" href="{{asset('admin/order/export')}}">Tải file</a>
               <a class="btn btn-sm btn-success" href="{{asset('admin/order/import')}}">Nhập file</a>
               <a class="btn btn-sm btn-warning" href="{{asset('admin/order/mailConfig')}}">Cài đặt mail</a>
            </div>
            @include('Order::new')
            <div class="">
                <form action="{{asset('admin/order')}}" method="GET">
                    <input type="hidden" name="search" value="on">
                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <input name="key" type="text" class="form-control" placeholder="Tìm kiếm" value="@if(isset($_GET['key'])){{$_GET['key']}}@endif">
                        </div>
                        <div class="col-md-2">
                            <select name="field" class="form-control">
                                <option value="tel">Số điện thoại</option>
                                <option value="email">Email</option>
                                <option value="cmt">Chứng minh thư</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-body table-responsive no-padding mt-3">
               <table class="table table-hover">
                  <tr>
                     <!-- <th>Mã</th> -->
                     <th>Tên</th>
                     <th>Điện thoại</th>
                     <th>Email</th>
                     <th>Số CMT</th>
                     <th>Tham gia</th>
                     <th>Hợp đồng</th>
                     <th>Số lô</th>
                     <th>DT m2</th>
                     <th>Nhóm</th>
                     <th>Đã góp</th>
                     <th>Còn lại</th>
                     <th>Lịch sử</th>
                     <th>Ghi chú</th>
                     <th>Địa chỉ</th>
                     <th>Yêu cầu</th>
                     
                     <th>Trạng thái</th>
                     <th class="text-center"></th>
                  </tr>
                  @if(count($order) != 0)
                     @foreach($order as $key => $val)
                        <tr>
                           <!-- <td class="">
                              M_{{$val->id}}
                           </td> -->
                           <td class="">
                              {{$val->name}}
                           </td>
                           <td class="">
                              {{$val->tel}}
                           </td>
                           <td class="">
                              {{$val->email}}
                           </td>
                           <td class="">
                              {{$val->cmt}}
                           </td>
                           <!-- ngay tham gia  -->
                           <td class="text-center">
                             {{$val->ngay_tham_gia}}
                           <td class="">
                              {{$val->so_hop_dong}}
                           </td>
                           <td class="">
                              {{$val->so_lo}}
                           </td>
                           <td class="">
                              {{$val->dien_tich}}
                           </td>
                           <td class="">
                              {{$val->nhom}}
                           </td>
                           <td class="">
                              {{$val->da_gop_von}}
                           </td>
                           <td class="">
                              {{$val->con_lai}}
                           </td>
                           <td class="">
                              {{$val->lich_su}}
                           </td>
                           <td class="">
                              {{$val->note}}
                           </td>
                           <td class="">
                              {{$val->address}}
                           </td>
                           <td class="">
                              {{$val->content}}
                           </td>
                           <td class="">
                              @if($val->status == 'on')
                                 <label class="text-success">Đã xem</label>
                              @else 
                                 <label class="text-danger">Mới</label>
                              @endif
                           </td>
                            <!-- <td class="text-center">
                                <?php 
                                $date = date_create($val -> created_at);
                                echo date_format($date,'d/m/Y').'<br />';
                                echo date_format($date,'H:i:s');
                            ?> -->
                            </td>
                           <td  class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu_{{$val->id}}" data-toggle="dropdown" aria-expanded="false">
                                      
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$val->id}}">
                                       
                                        <a class="dropdown-item text-success" href="#" data-toggle="modal" data-target="#call_email_{{$val -> id}}"><i class="fa fa-envelope"></i> Gửi mail</a>
                                        <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#call_edit_{{$val -> id}}"><i class="fa fa-edit"></i> Sửa</a>
                                        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#call_del_{{$val -> id}}">
                                            <i class="fa fa-trash"></i> Xóa</a>
                                    </div>
                              </div>
                                <form action="{{asset('admin/order/mail')}}" method="POST">
                                    @csrf
                                    <div class="modal fade" id="call_email_{{$val -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">   
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><i class="fa fa-envelope"></i> Gửi mail: {{$val->email}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                            
                                                    <input type="hidden" name="email_nhan" value="{{$val->email}}">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label>Tiêu đề</label>
                                                                {{F_input_basic('text',$val->title,'title','','form-control form-control-sm','','')}}
                                                        </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Nội dung</label>
                                                                <textarea name="content" id="mailContent_{{$val->id}}" class="form-control form-control-sm"> </textarea>
                                                                {{F_tinymce('mailContent_'.$val->id)}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-submit btn-success">Gửi mail</button>
                                            </div>
                                        </div>
                                    </div>    
                                </form>
                             </div>

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
                           
                              <div class="modal fade" id="call_edit_{{$val -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered modal-xl" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h6 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-edit"></i> Sửa liên hệ -  Mã đơn:  M_{{$val->id}}</h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                            <form action="{{asset('admin/order/edit/'.$val->id)}}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="row">
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                             <label>Họ và tên</label>
                                                                {{F_input_basic('text',$val->name,'name','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                  
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                             <label>Số điện thoại</label>
                                                                {{F_input_basic('text',$val->tel,'tel','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                                <label>Email</label>
                                                                {{F_input_basic('text',$val->email,'email','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <!-- chung minh thu  -->
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Số chứng minh thư</label>
                                                            {{F_input_basic('text',$val->cmt,'cmt','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <!-- ngay tham gia  -->
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Ngày tham gia</label>
                                                            {{F_input_basic('text',$val->ngay_tham_gia,'ngay_tham_gia','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Số hợp đồng</label>
                                                            {{F_input_basic('text',$val->so_hop_dong,'so_hop_dong','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Số lô</label>
                                                            {{F_input_basic('text',$val->so_lo,'so_lo','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Diện tích m2</label>
                                                            {{F_input_basic('text',$val->dien_tich,'dien_tich','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Nhóm</label>
                                                            {{F_input_basic('text',$val->nhom,'nhom','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Đã góp</label>
                                                            {{F_input_basic('text',$val->da_gop_von,'da_gop_von','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Còn lại</label>
                                                            {{F_input_basic('text',$val->con_lai,'con_lai','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                       <div class="form-group">
                                                            <label>Lịch sử</label>
                                                            <textarea name="lich_su" class="form-control form-control-sm">{{$val->lich_su}}</textarea>
                                                       </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                       <div class="form-group">
                                                            <label>Ghi chú</label>
                                                            <textarea name="note" class="form-control form-control-sm">{{$val->note}}</textarea>
                                                       </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                       <div class="form-group">
                                                             <label>Địa chỉ</label>
                                                                {{F_input_basic('text',$val->address,'address','','form-control form-control-sm','','')}}
                                                       </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                            <label>Yêu cầu</label>
                                                               {{F_input_basic('textarea',$val->content,'content','','form-control form-control-sm','','')}}
                                                      </div>
                                                   </div>
                                                   
                                                    <div class="col-md-6">
                                                       <div class="form-group">
                                                          <label>Trạng thái liên hệ</label>
                                                          <select name="status" class="form-control form-control-sm">
                                                             <option value="on" @if($val->status == 'on') selected @endif>Đã xem</option>
                                                             <option value="off" @if($val->status == 'off') selected @endif>Mới</option>
                                                          </select>
                                                       </div>
                                                    </div>
                                                   <div class="col-md-12">
                                                         Trạng thái gửi mail: @if($val->sendmail == 'on') Đã gửi @else Chưa gửi @endif
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
               {{$order->appends(request()->input()) ->links()}}
            </div>
          </div>
  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection