<div class="modal fade" id="new_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/form/new')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-dialog modal-dialog-centered" role="document">
   
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới form</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            
                  <!-- ten meta thuoc tinh-->
                  <div class="form-group">
                     <label>Tên trường</label>
                     <input type="text" class="form-control"  id="title_form" placeholder="Tên trường" name="name"  onkeyup="ChangeToSlug();" value="{{old('name')}}" required>
                  </div>
                  <!-- Id css -->
                  <div class="form-group">
                     <label>Mã liên hệ </label>
                     <input type="text" class="form-control" placeholder="MS_" name="code"  value="{{old('code')}}">
                  </div>
                  <!-- thong bao -->
                  <div class="form-group">
                     <label>Thông báo khi gửi xong </label>
                     <textarea class="form-control" name="noti">Bạn đã gửi thành công</textarea>
                  </div>
                  <div class="form-group">
                     <label>Email hệ thống gửi</label>
                     <input type="email" class="form-control" name="email_send_admin">
                  </div>
                  <div class="form-group">
                     <label>Email nhận đăng ký</label>
                     <input type="email" class="form-control" name="email_receive_admin">
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