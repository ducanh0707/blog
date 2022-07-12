<div class="modal fade" id="new_multi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/cat/new_multi')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới danh mục</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <label for="name_cat">Mỗi danh mục 1 dòng</label>
               <textarea name="name" class="form-control"></textarea>
            </div>
            <div class="form-group">
               <label for="parent_cat">Danh mục cha</label>
               <select class="form-control" name="parent_id">
                  <option selected value="0">Chọn danh mục cha</option>
                  <?php F_select_cat_multi_level($cat) ?>
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
