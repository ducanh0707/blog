<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn danh mục <a target="_blank" href="{{asset('admin/cat')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="cat_list_id">
          <option value="0">Trống</option>
          <?php F_select_cat_edit_in_row($cat_list,$row->cat_list_id) ?> 
       </select>
       Hiển thị danh mục con theo danh mục được chọn
 </div>