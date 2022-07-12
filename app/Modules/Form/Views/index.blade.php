@extends('V_backend.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Danh sách Form  <a href="#" class="btn btn-primary btn-sm mt-2" data-toggle="modal" data-target="#new_form">Thêm mới form</a>
      </h1>
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
         <div class="row">
            <!-- danh sach form -->
            <div class="col-md-3">
               <ul class="list-group">
                  @if(count($form_list) != 0)
                     @foreach($form_list as $val)
                           <li class="list-group-item d-flex justify-content-between align-items-center @if($val -> id == $form_id) {{'list-group-item-primary'}} @endif">
                              <a href="{{asset('admin/form/'.$val->id)}}">
                                 {{$val -> name}}
                              </a>
                           </li>
                     @endforeach
                  @endif

               </ul>
               <hr>
               <h5>Danh sách khách hàng</h5>
               <ul class="list-group">
                  @if(count($contact_list) != 0)
                     @foreach($contact_list as $contact_list_r)
                           <li class="list-group-item d-flex justify-content-between align-items-center @if($contact_list_r -> id == $form_id) {{'list-group-item-primary'}} @endif">
                              <a href="{{asset('admin/form/'.$contact_list_r ->id.'/contact')}}" >Khách hàng {{$contact_list_r -> name}}</a>
                           </li>
                     @endforeach
                  @endif
 
               </ul>

               <!-- Modal them moi form -->
                  @include('Form::IV_Modal_form_new')
            </div>
            <!-- ket thuc danh sach form -->
            <!-- danh sach form -->
            <div class="col-md-9">
               <div class="box box-primary">
                  @if(count($contact_list) != 0)
                     <div class="box-header with-border">
                        <div class="box-title">
                           <div class="text-center">
                              <h5>
                                 <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#new_feild">
                                 Thêm trường
                                 </button> 
                                 {{$form ->name}} 
                                 <a href="{{asset('admin/form/'.$form_id.'/status/')}}">
                                    <i class="fa fa-chevron-circle-down small @if($form->status == 'on') {{'text-success'}} @else {{'text-danger'}} @endif"></i> 
                                 </a>
                                 <a href="{{asset('admin/form/'.$form_id.'/del')}}" data-toggle="modal" data-target="#del_form">
                                    <i class="fa fa-trash small text-danger"></i>  
                                 </a>
                              </h5>
                           </div>
                           
                        </div>
                     </div>
                     @include('Form::IV_Modal_feild_new')
                     @include('Form::IV_Modal_form_del')
                  @else
                     Bạn chưa tạo form
                  @endif
                  <!-- danh sach -->
                  <div class="box-body">
                     @if($form)
                     <form action="{{asset('admin/form/'.$form_id.'/edit')}}" method="post">
                     <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="row">
                           {{-- truong thong tin  --}}
                           <div class="col-md-7">
                              <div class="text-center">
                                 Trường form đăng ký
                                 
                              </div>
                              <table class="table table-hover">
                                 <tr>
                                    <th>Họ và tên</th>
                                    <th class="text-center">Kiểu</th>
                                    <th class="text-center"></th>
                                 </tr>
                                 @if($form -> full_name == 'on')
                                    <tr>
                                       <td>Họ và tên</td>
                                       <td class="text-center">Text</td>
                                       <td class="text-center">
                                          <span class="del_feild cursor" data-feild="full_name">
                                             <i class="fa fa-trash text-danger"></i>
                                          </span>
                                       </td>
                                    </tr>
                                 @endif
                                 @if($form -> email == 'on')
                                    <tr>
                                       <td>Địa chỉ email</td>
                                       <td class="text-center">Text</td>
                                       <td class="text-center">
                                          <span class="del_feild cursor" data-feild="email">
                                             <i class="fa fa-trash text-danger"></i>
                                          </span>
                                       </td>
                                    </tr>
                                 @endif
                                 @if($form -> tel == 'on')
                                    <tr>
                                       <td>Số diện thoại</td>
                                       <td class="text-center">Text</td>
                                       <td class="text-center">
                                          <span class="del_feild cursor" data-feild="tel">
                                             <i class="fa fa-trash text-danger"></i>
                                          </span>
                                       </td>
                                    </tr>
                                 @endif
                                 @if($form -> request =='on')
                                    <tr>
                                       <td>Yêu cầu</td>
                                       <td class="text-center">Textarea</td>
                                       <td class="text-center">
                                          <span class="del_feild cursor" data-feild="request">
                                             <i class="fa fa-trash text-danger"></i>
                                          </span>
                                       </td>
                                    </tr>
                                 @endif
                                 @if($form -> care != '' or $form -> care != null)
                                    <tr>
                                       <td>
                                          Khách quan tâm<br>
                                             <textarea rows="4" name="care_option" class="form-control"><?php echo $form -> care ?></textarea>
                                       </td>
                                       <td class="text-center">Textarea</td>
                                       <td class="text-center">
                                          <span class="del_feild cursor" data-feild="care">
                                             <i class="fa fa-trash text-danger"></i>
                                          </span>
                                       </td>
                                    </tr>
                                 @endif
   
                              </table>
                              <script>
                                 $('.del_feild').click(function(){
                                    var feild = $(this).data('feild');
                                    var form_id = '{{$form_id}}';
                                    if (confirm("Bạn có chắc chắn muốn xóa")) {
                                       window.location.replace('{{asset('')}}admin/form/'+form_id+'/del/'+feild);
                                    } else {
                                       txt = "You pressed Cancel!";
                                    }
                                    
                                 });
                              </script>
                           </div>
                           {{-- thong tin form dang ky  --}}
                           <div class="col-md-5">
                              
                              <!-- ten feild thuoc tinh-->
                              <div class="form-group">
                                 <label>Tên trường</label>
                                 <input type="text" class="form-control"  id="title_form" placeholder="Tên trường" name="name"  onkeyup="ChangeToSlug();" value="{{$form->name}}" required>
                              </div>
                              <!-- Id css -->
                              <div class="form-group">
                                 <label>Mã liên hệ</label>
                                 <input type="text" class="form-control" placeholder="MS_" name="code"  value="{{$form->code}}">
                              </div>
                              <!-- thong bao -->
                              {{-- <div class="form-group">
                                    <label>Thông báo khi gửi xong </label>
                                    <textarea class="form-control" name="noti">{{$form->noti}}</textarea>
                              </div> --}}
                              <!-- email  -->
                              <div class="form-group">
                                 <label>Email hệ thống gửi</label>
                                 <input type="email" class="form-control" name="email_send_admin" value="{{$form->email_send_admin}}">
                              </div>
                              <div class="form-group">
                                 <label>Email nhận đăng ký</label>
                                 <input type="email" class="form-control" name="email_receive_admin" value="{{$form->email_receive_admin}}">
                              </div>
                           </div>
                        </div>

                     
                        <!-- xoa form -->
                        @include('Form::IV_Modal_form_del')
                        <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                     </form>
                     @endif
                  </div>
               </div>
            </div>
            <!-- ket thuc danh sach  -->
         </div>
         
      </section>
  </div>
@endsection