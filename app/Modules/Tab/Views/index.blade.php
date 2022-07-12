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
                  <h6 class="modal-title" id="exampleModalCenterTitle"> Thêm mới tab </h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{asset('admin/tab/new')}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Tên tab</label>
                              {{F_input_basic('text',$value = old('name'),'name','','form-control','','')}}
                           </div>
                           <div class="form-group">
                              <select class="form-control" name="type">
                                 <option value="">Trống</option>
                                 <option value="mat_bang">Mặt bằng</option>
                                 <option value="tien_do">Tiến độ</option>
                              </select>
                           </div>
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
                           </div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Mô tả</label>
                              {{F_input_textarea('','des','','form-control','','')}}
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
               <h3 class="box-title">Danh sách tab</h3>
            </div>
            <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>Tên</th>
                        <th class="text-center">Loại</th>
                        <th class="text-center">Mô tả</th>
                        <th class="text-center">id</th>
                        <th class="text-center"></th>
                     </tr>
                  </thead>
                  @if(count($tab) != 0)
                  <tbody>
                     @foreach($tab as $key => $val)
                        <tr>
                           <!-- cot tieu de -->
                           <td class="">
                              <div class="admin-list-post">
                                    <a href="{{ asset('admin/tab/'.$val->id.'/item')}}">
                                       <b  class="text-dark">{{$val->name}}</b>
                                    </a>                                 
                              </div>
                           </td>
                           <td  class="text-center">
                              {{$val -> type}}
                           </td>
                           <!-- mo ta  -->
                           <td  class="text-center">
                              {{$val -> des}}
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
                                 <div class="modal-dialog modal-dialog-centered" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h6 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-edit"></i> Sửa tab </h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                          <form action="{{asset('admin/tab/edit/'.$val->id)}}" method="POST">
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <div>
                                             <div class="form-group">
                                                <label class="font-weight-bold"> Tên silde</label>
                                                <input name="name" value="{{$val->name}}" class="form-control" required>
                                             </div>
                                             <div class="form-group">
                                                <select class="form-control" name="type">
                                                   <option value="">Trống</option>
                                                   <option value="mat_bang" @if($val->type == 'mat_bang') selected @endif>Mặt bằng</option>
                                                   <option value="tien_do" @if($val->type == 'tien_do') selected @endif>Tiến độ</option>
                                                </select>
                                             </div>
                                             <div class="form-group row">
                                                <div class="col-md-6">
                                                   <label class="font-weight-bold">Class Css</label>
                                                   {{F_input_basic('text',$val-> css_class,'css_class','','form-control','','')}}
                                                   {{-- type, value, name, id,class , attri, placeholder --}}
                                                </div>
                                                <!-- css id -->
                                                <div class="col-md-6">
                                                   <label class="font-weight-bold">Id Css</label>
                                                   {{F_input_basic('text',$val -> css_id,'css_id','','form-control','','')}}
                                                   {{-- type, value, name, id,class , attri, placeholder --}}
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="font-weight-bold"> Mô tả</label>
                                                {{F_input_textarea($val -> des,'des','','form-control','','')}}
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
                  </tbody>
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
               {{$tab->appends(request()->input()) ->links()}}
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection