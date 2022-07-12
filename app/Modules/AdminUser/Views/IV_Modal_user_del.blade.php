
<!-- Modal xoa meta -->
<div class="modal fade" id="del_user_{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-dialog modal-dialog-centered" role="document">
     
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-trash"></i> Xóa tài khoản</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
            </div>
            <div class="modal-body">
               <div>
                  <div>
                     <i class="fa fa-caret-right"></i> Tên: {{$val -> name}}
                  </div>
                  <div>
                     <i class="fa fa-caret-right"></i> Email: {{$val -> email}}
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                  <a href="{{asset('admin/user/'.$val->user_type_id.'/del/'.$val->id)}}" class="btn btn-sm btn-danger">Ok Xóa</a>
               </div>     
            </div> <!-- dong the modal -body -->
         </div>
      </div>
</div>