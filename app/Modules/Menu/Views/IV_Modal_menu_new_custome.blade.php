
<div class="modal fade" id="new_menu_custome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="<?php echo asset('admin/menu/type/'.$type_id.'/new_custome') ?>" method="post"  enctype="multipart/form-data">
      <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="exampleModalCenterTitle">Thêm menu tùy chỉnh</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <!-- ten menu -->
                  <div class="form-group">
                     <label><i class="fa fa-list"></i> Tên menu (bắt buộc)</label>
                     <input type="text" id="name_menu" class="form-control" placeholder="Bạn điền menu" name="name">
                  </div>
                  <div class="form-group">
                     <label> Tên menu tiếng anh</label>
                     <input type="text"  class="form-control"  name="name_en">
                  </div>
                
                     <!-- menu cha -->
                  <div class="form-group">
                     <label><i class="fa fa-stream"></i> Menu cha</label>
                     <div class="form-group">
                           <select class="form-control" name="parent_id">
                           <option value="0">Menu cha</option>
                              <?php F_select_menu_muli_level($menu) ?>
                           </select>
                     </div>
                  </div>
                  <!-- link menu -->
                  <div class="form-group">
                     <label><i class="fa fa-link"></i> Link menu</label>
                     <input type="text" class="form-control" placeholder="Bạn điền link menu" name="url" id="url_menu">
                  </div>
                  <hr>
                  <label class="font-weight-bold">Thêm nhanh</label>
                  <div class="form-group">
                     <label>Menu kéo xuống hàng (trang chủ)</label>
                     <select id="select_row" class="form-control form-control-sm">
                        <option value="">Trống</option>
                        @foreach ($row_list as $row)
                           <option data-name="<?php echo $row->name ?>" value="#{{$row->type}}_{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Menu trỏ đến danh mục</label>
                     <select id="select_cat" class="form-control form-control-sm">
                        <option value="0">Trống</option>
                        <?php F_select_cat_in_menu($cat_list) ?>
                     </select>
                     <input type="checkbox" id="sub_cat" name="subcat" value="on"> <label for="sub_cat">thêm cả danh mục con</label>
                  </div>

                  <script>
                     $('#select_row').change(function(){
                        var row = $(this).val();
                        var name_row = $('#select_row option:selected').data('name');
                        $('#url_menu').val(row);
                        $('#name_menu').val(name_row);
                     });
                     $('#select_cat').change(function(){
                        var cat = $(this).val();
                        var name_cat = $('#select_cat option:selected').data('name');
                        $('#url_menu').val(cat);
                        $('#name_menu').val(name_cat);
                     });
                  </script>
               </div>
               <div class="col-md-6">
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
                  <!-- menu icon -->
                  <div class="form-group">
                     <label><i class="fa fa-icons"></i> Biểu tượng </label>
                     <input type="text" class="form-control" placeholder="Ví dụ: <i class='fa fa-user'></i>" name="icon">
                     Bạn copy mã biểu tượng  <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_bank">tại đây</a>
                  </div>
                  <div class="form-group">
                     {{F_input_image('','img','new_news','')}}
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