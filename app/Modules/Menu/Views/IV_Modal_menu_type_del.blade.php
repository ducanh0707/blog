
<!-- Modal xoa meta -->
<div class="modal fade" id="del_widget" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-dialog modal-dialog-centered" role="document">
     
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-trash"></i> Xóa wiget</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
            </div>
            <div class="modal-body">
               <div>
                  <div>
                     <i class="fa fa-caret-right"></i> Tên: {{$type ->name}}
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                  <a href="{{asset('admin/menu/type/del/'.$type->id)}}" class="btn btn-sm btn-danger">Ok Xóa</a>
               </div>     
            </div> <!-- dong the modal -body -->
         </div>
      </div>
</div>