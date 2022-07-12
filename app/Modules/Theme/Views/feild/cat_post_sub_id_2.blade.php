<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn danh mục <a target="_blank" href="{{asset('admin/cat')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="cat_post_sub_id_2">
          <option value="0">Trống</option>
          <?php F_select_cat_edit_in_row($cat_list,$row->cat_post_sub_id_2) ?> 
       </select>
       Hiển thị sản phẩm theo danh mục con 2 (hiển thị theo từng danh mục tab)
 </div>