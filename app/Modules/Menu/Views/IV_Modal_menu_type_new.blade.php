
<div class="modal fade" id="new_type_menu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="<?php echo asset('admin/menu/type/new') ?>" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Thêm vị trí menu</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
            <!-- ten vi tri menu -->
            <div class="form-group">
               <label><i class="fa fa-th"></i> <b>Tên vị trí menu</b></label>
               <input type="text" class="form-control" name="name">
            </div>
            {{-- class + id nav  --}}
            <label> <b>CSS vs ID (nav)</b></label>
            <div class="form-group row">
               <div class="col-md-6">
                  <input type="text" class="form-control" name="class_nav" placeholder="class nav">
               </div>
               <!--  id -->
               <div class="col-md-6">
                  <input type="text" class="form-control" name="id_nav" placeholder="id nav">
               </div>
            </div>
            {{-- class + id ul  --}}
            <label> <b>CSS vs ID (ul)</b></label>
            <div class="form-group row">
               <div class="col-md-6">
                  <input type="text" class="form-control" name="class_ul" placeholder="class ul">
               </div>
               <!--  id -->
               <div class="col-md-6">
                  <input type="text" class="form-control" name="id_ul" placeholder="id ul">
               </div>
            </div>
            {{-- class + id li   --}}
            <label> <b>CSS vs ID (li)</b></label>
            <div class="form-group row">
               <div class="col-md-6">
                  <input type="text" class="form-control" name="class_li" placeholder="class li">
               </div>
               <!--  id -->
               <div class="col-md-6">
                  <input type="text" class="form-control" name="id_li" placeholder="id li">
               </div>
            </div>
            {{-- class + id a   --}}
            <label> <b>CSS vs ID (a)</b></label>
            <div class="form-group row">
               <div class="col-md-6">
                  <input type="text" class="form-control" name="class_a" placeholder="css a">
               </div>
               <!--  id -->
               <div class="col-md-6">
                  <input type="text" class="form-control" name="id_a" placeholder="id a">
               </div>
            </div>
            <div class="form-group">
               <label> <b>Thuộc tính thẻ a</b></label>
               <input type="text" class="form-control" name="attri">
            </div>
            @if(Auth::user() -> url == 'root')
               <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="def" name="def" value="on">
                  <label class="form-check-label" for="def">Giá trị mặc định (chỉ root có quyền xóa)</label>
               </div>
            @endif
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
         <button type="submit" class="btn btn-primary">Gửi</button>
         </div>
      </div>
   
   </div>
   </form>
</div>