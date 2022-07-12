<div class="modal fade" id="edit_user_{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/user/'.$type_id.'/edit/'.$val->id)}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới tài khoản</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <!-- tên đây đủ -->
                  <div class="form-group">
                        <label>Họ tên(*)</label>
                        <input type="text" class="form-control" id="name_{{$val->id}}" placeholder="Họ tên" name="name" value="{{$val->name}}" onkeyup="ChangeToSlug();">
                     </div>
                     <!-- so dien thoai -->
                     <div class="form-group">
                           <label>Số điện thoại (*)</label>
                           <input type="text" class="form-control" placeholder="Điện thoại" name="tel" value="{{$val->tel}}" required>
                        </div>
                     <!-- email thanh vien -->
                     <div class="form-group">
                        <label>Email của bạn(*)</label>
                        <input type="email" class="form-control" placeholder="Email thành viên" name="email" value="{{$val->email}}" required>
                     </div>                    
                     <!-- Mat khau  -->
                     <div class="form-group">
                        <label><i class="fa fa-user-secret"></i> <b>Mật khẩu(*)</b></label>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="on" id="changepass_{{$val->id}}" name="changepass">
                           <label class="form-check-label" for="changepass_{{$val->id}}">
                              Đổi mật khẩu
                           </label>
                        </div>
                        <input type="password" class="form-control pass" placeholder="******" name="password" disabled>
                     </div>
                     <!-- nhap lai mat khau -->
                     <div class="form-group">
                        <label>Nhập lại mật khẩu(*)</label>
                        <input type="password" class="form-control pass" placeholder="******" name="password_again" disabled>
                     </div>
                     <script>
                        $(document).ready(function(){
                           $("#changepass_{{$val->id}}").change(function(){
                              if($(this).is(":checked")){
                                 $(".pass").removeAttr('disabled');  
                              }
                              else {
                                 $(".pass").attr('disabled','');
                              }
                           });
                        });
                     </script>
               </div>
               <div class="col-md-6">
                     <!-- quyền  -->
                     <div class="form-group">
                        <label><i class="fa fa-street-view"></i> <b>Quyền truy cập</b></label>
                        <select name="user_type_id" class="form-control">
                           @foreach($user_type as $user_type_r)
                              <option <?php if($val->type_id == $user_type_r->id){echo 'selected';} ?> value="{{$user_type_r->id}}">{{$user_type_r->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     
                  
                     <div class="form-group">
                        <b>Trạng thái: </b>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio1_{{$val->id}}" value="on" <?php if($val->status == 'on'){echo 'checked';} ?>>
                            <label class="form-check-label" for="inlineRadio1_{{$val->id}}">Công khai</label>
                        </div>
                     
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio2_{{$val->id}}" value="off" <?php if($val->status == 'off'){echo 'checked';} ?>>
                          <label class="form-check-label" for="inlineRadio2_{{$val->id}}">Khóa</label>
                        </div>
                     </div>
                     @if(Auth::user() -> url == 'root')
                        <div class="form-group form-check">
                           <input type="checkbox" class="form-check-input" id="def_{{$val->id}}" name="def" value="on" <?php if($val-> def == 'on'){ echo 'checked';} ?>>
                           <label class="form-check-label" for="def_{{$val->id}}">Giá trị mặc định (chỉ root có quyền xóa)</label>
                        </div>
                     @endif
                     <!-- anh dại diện  -->
                     <div class="form-group">
                        <label><i class="fa fa-image"></i> <b>Ảnh đại diện</b></label>
                        {{F_input_image($val -> img,'img',$val ->id,'upload/user/')}}
                     </div>
               </div>
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
