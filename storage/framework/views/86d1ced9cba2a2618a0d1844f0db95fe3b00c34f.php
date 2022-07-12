<div class="modal fade" id="new_row_custome" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="<?php echo e(asset('admin/theme/row_new')); ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <input type="hidden" name="type" value="custome">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
   
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm hàng tùy chọn</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            
            <div class="row mt-3">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="font-weight-bold"><i class="fa fa-id-card"></i> Tên hàng</label>
                     <input type="text" class="form-control" name="name" required>
                  </div>
                  <div class="form-group">
                     <label> Vị trí</label>
                        <select class="form-control" name="posion">
                           <option value="head">Đầu website</option>
                           <option value="body" selected>Giữa website</option>
                           <option value="footer">Chân website</option>
                        </select>
                  </div>
               </div>
               
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="font-weight-bold"><i class="fa fa-id-card"></i> Tên file giao diện (style)</label>
                     <input type="text" class="form-control" name="style" required>
                  </div>
                  <div class="form-group">
                     <label><i class="fa fa-sliders-h"></i> Lề menu</label>
                     <select class="form-control" name="width">
                        <option value="">Trống</option>
                        <option value="container">Có lề</option>
                        <option value="container-fluid">Không lề</option>
                     </select>
                  </div>
               </div>
               
             
                  
                  <div class="col-md-5">
                      <?php
                          $feild_f1n = array(
                              'icon_text' => 'Biểu tượng và tên',
                              'title' => 'Tiêu đề',
                              'title_2' => 'Tiêu đề 2',
                              'title_color' => 'Màu tiêu đề',
                              'des' => 'Mô tả',
                              'des_2' => 'Mô tả 2',
                              'img' => 'Hình ảnh',
                              'img_2' => 'Hình ảnh 2',
                              'bg' => 'Màu nền',
                              'img_bg' => 'Hình nền',
                              'link_img' => 'Link hình ảnh',
                              'link_img_2' => 'Link hình ảnh 2',
                              'link' => 'Link',
                              'content' => 'Nội dung',
                              'content_2' => 'Nội dung 2',
                              'map_code' => 'Google Map',
                              'map_code_2' => 'Google Map 2',
                              'facebook_fanpage' => 'Facebook fanpage',
  

                          );
                          foreach($feild_f1n as $key_1n => $feild_r){
                              ?>
                                  <div class="form-check">
                                      <input class="form-check-input" name="feild[]" type="checkbox" id="f_<?php echo e($key_1n); ?>" value="<?php echo e($key_1n); ?>">
                                      <label class="form-check-label" for="f_<?php echo e($key_1n); ?>"><?php echo e($feild_r); ?></label>
                                  </div>
                              <?php
                          }
                      ?>
                  </div>
                  
                  <div class="col-md-7">
                      <?php
                          $feild_f2n = array(
                              'effect' => 'Hiệu ứng',
                              'effect_2' => 'Hiệu ứng 2',
                              'effect_3' => 'Hiệu ứng 3',
                              'effect_4' => 'Hiệu ứng 4',
                              'col_1' => 'Cột 1',
                              'col_2' => 'Cột 2',
                              'col_3' => 'Cột 3',
                              'col_4' => 'Cột 4',
                              'display' => 'Hiển thị',
                              'menu_id' => 'Menu',
                              'menu_id_2' => 'Menu 2',
                              'slide_id' => 'Slide',
                              'slide_id_2' => 'Slide 2',
                              'form_id' => 'Form',
                              'form_id_2' => 'Form 2',
                              'tab_id' => 'Tab',
                              'tab_id_2' => 'Tab 2',
                              'cat_id' => 'Danh mục',
                              'cat_id_2' => 'Danh mục 2',
                              'cat_id_3' => 'Danh mục 3',
                              'cat_id_4' => 'Danh mục 4',
                              'cat_post_id' => 'Bài viết theo danh mục',
                              'cat_post_id_2' => 'Bài viết theo danh mục 2',
                              'cat_product_id' => 'Bài viết theo danh mục sản phẩm',
                              'cat_product_id_2' => 'Bài viết theo danh mục sản phẩm 2',
                              'cat_post_sub_id' => 'Bài viết theo danh mục con',
                              'cat_post_sub_id_2' => 'Bài viết theo danh mục con 2',
                              'cat_list_id' => 'Danh sách danh mục con',
                              'cat_list_id_2' => 'Danh sách danh mục con 2',
                          );
                          foreach($feild_f2n as $key_2n => $feild_r){
                              ?>
                                  <div class="form-check">
                                      <input class="form-check-input" name="feild[]" type="checkbox" id="f_<?php echo e($key_2n); ?>" value="<?php echo e($key_2n); ?>">
                                      <label class="form-check-label" for="f_<?php echo e($key_2n); ?>"><?php echo e($feild_r); ?></label>
                                  </div>
                              <?php
                          }
                      ?>
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
</div><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/inc/row_custome_new.blade.php ENDPATH**/ ?>