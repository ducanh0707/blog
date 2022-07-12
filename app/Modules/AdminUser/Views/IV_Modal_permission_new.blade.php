<div class="modal fade" id="new_permission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/user/permission/new')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới quyền</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
               <!-- ten dinh dang -->
               <div class="form-group">
                  <label><i class="fa fa-user-secret"></i> <b>Tên quyền (viết liền không dấu)</b></label>
                  <input type="text" class="form-control" name="name">
               </div>
               <!-- loai dinh dạng-->
               <div class="form-group">
						<label> Tiêu đề (tên tiếng việt)</label>
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label> Loại</label>
						<select name="type" class="form-control">
							<option value="web">Web</option>
							<option value="admin">Admin</option>
							<option value="domain">Domain</option>
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
