<div class="modal fade" id="new_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/user/role/new')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới nhóm quyền</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
               <!-- ten dinh dang -->
               <div class="form-group">
                  <label><i class="fa fa-user-secret"></i> <b>Tên quyền (quyền thuộc domain)</b></label>
                  <input type="text" class="form-control" name="name">
               </div>
               <!-- loai dinh dạng-->
               <div class="form-group">
                    <label> <b>Loại quyền</b></label>
                    <select name="type" class="form-control">
                        <option value="domain">Domain</option>
                        <option value="customer">Customer</option>
                        <option value="root">Root</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Biên tập</option>
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
