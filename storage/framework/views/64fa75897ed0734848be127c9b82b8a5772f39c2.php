<?php $__env->startSection('content'); ?>
<div class="content-wrapper"  style="background-color: #ecf0f5;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="<?php echo e(asset('admin/dashboard')); ?>" class="btn btn-primary btn-sm">Quay lại</a>
       
      <h3>Sửa thông tin website</h3>
      <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <!-- Main content -->
      <section class="content">
         <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-2">
               <?php echo $__env->make('Theme::inc_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            
            <div class="col-md-10">
               <form action="<?php echo e(asset('admin/theme/info')); ?>" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <div class="box-title">
                           Tối ưu SEO
                        </div>
                     </div>
                     <!-- widget group meta  -->
                     <div class="box-body">
                           <!-- toi uu seo -->
                           <!-- tieu de bài viết  -->
                           <div class="form-group">
                                <input type="text" class="form-control" placeholder="Tiêu đề SEO <title></title>" name="title_seo" value="<?php echo e($theme -> title_seo); ?>">
                                <div>
                                    <div class="text-right">
                                        <a data-toggle="collapse" href="#title_seo" role="button" aria-expanded="false"
                                            aria-controls="title_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="title_seo">
                                        <div class="form-group">
                                            <label>Tiêu đề SEO tiếng anh</label>
                                            <input type="text" class="form-control" value="<?php echo e($theme ->title_seo_en); ?>" name="title_seo_en" >
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                           <!-- mô tả bài viết  -->
                           <div class="form-group">
                                <textarea  class="form-control" rows="3" name="des_seo" placeholder="Mô tả SEO (meta description)"><?php echo e($theme -> des_seo); ?></textarea>
                                <div>
                                    <div class="text-right">
                                        <a  data-toggle="collapse" href="#des_seo" role="button" aria-expanded="false" aria-controls="des_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="des_seo">
                                        <div class="form-group">
                                            <label>Mô tả bài viết tiếng anh</label>
                                            <textarea  class="form-control" rows="3" name="des_seo_en"><?php echo e($theme -> des_seo_en); ?></textarea>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                           <!-- meta keyword bài viết  -->
                           <div class="form-group">
                               <input type="text"  class="form-control" rows="3" name="key_seo" placeholder="Từ khóa SEO, cách nhau dấu phẩy (meta keyword)" value="<?php echo e($theme -> key_seo); ?>">
                               <div>
                                    <div class="text-right">
                                        <a  data-toggle="collapse" href="#key_seo" role="button" aria-expanded="false" aria-controls="key_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="key_seo">
                                        <div class="form-group">
                                            <label>Keywords tiếng anh</label>
                                            <input type="text" class="form-control" rows="3" name="key_seo_en"  value="<?php echo e($theme  -> key_seo_en); ?>">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                           <!-- index-->
                           <div class="form-group">
                              <select class="form-control" name="index_meta">
                                 <option value="INDEX, FOLLOW" <?php if($theme -> index_meta == 'INDEX, FOLLOW'): ?> <?php echo e('selected'); ?> <?php endif; ?>>INDEX, FOLLOW</option>
                                 <option value="NOINDEX, FOLLOW" <?php if($theme -> index_meta == 'NOINDEX, FOLLOW'): ?> <?php echo e('selected'); ?> <?php endif; ?>>NOINDEX, FOLLOW</option>
                                 <option value="INDEX, NOFOLLOW" <?php if($theme -> index_meta == 'INDEX, NOFOLLOW'): ?> <?php echo e('selected'); ?> <?php endif; ?>>INDEX, NOFOLLOW</option>
                                 <option value="NOINDEX, NOFOLLOW" <?php if($theme -> index_meta == 'NOINDEX, NOFOLLOW'): ?> <?php echo e('selected'); ?> <?php endif; ?>>NOINDEX, NOFOLLOW</option>
                              </select>
                           </div>
                     </div>
                  </div>

                  
                  <div class="box box-primary">
                     <div class="box-header with-border">
                        <div class="box-title">
                           Cài đặt chức năng
                        </div>
                     </div>
                     <div class="box-body">
                        <div class="form-group row">
                           
                           <div class="col-md-6">
                              <label class="font-weight-bold">Nút bấm số điện thoại</label>
                                 <div class="form-group">
                                    <?php $__currentLoopData = $buton_ring; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_br => $buton_ring_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="form-check form-check-inline">
                                          <input class="form-check-input" name="button_ring[]" type="checkbox" id="br_<?php echo e($key_br); ?>" value="<?php echo e($buton_ring_r->id); ?>" <?php if($buton_ring_r->status == 'on'): ?> checked <?php endif; ?>>
                                          <label class="form-check-label" for="br_<?php echo e($key_br); ?>"><?php echo e($buton_ring_r->name); ?></label>
                                       </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </div>
                              Sửa nút bấm tại đây <a href="<?php echo e(asset('admin/button_ring')); ?>">tại đây</a>
                           </div>
                           
                        </div>
                        
                     </div>
                  </div>

                    
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="box-title">
                            Cài đặt head
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                            <label><i class="fa fa-image"></i> Ảnh favicon (kích thước tối đa 100pixel x 100pixel)</label>
                            <?php echo e(F_input_image($theme->favicon,'img','edit_favicon',asset('/source/theme/'))); ?>

                            </div>
                            <div class="form-group">
                            <label><i class="fa fa-image"></i> Ảnh hiển thị mạng xã hội cho trang chủ (facebook, zalo)</label>
                            <?php echo e(F_input_image_2($theme->og_image,'og_image','edit_og_image',asset('/source/theme/'))); ?>

                            </div>
                            <div class="form-group">
                            <label class="font-weight-bold"><i class="fa fa-book-reader"></i> Code head</label>
                            <textarea name="head" class="form-control" id="" cols="30" rows="10"><?php echo e($theme->head); ?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="box-title">
                                Liên hệ
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="font-weight-bold">Địa chỉ</label>
                                <textarea name="contact" class="form-control" id="contact_t" cols="30" rows="10"><?php echo e($theme->contact); ?></textarea>
                                <?php echo e(F_tinymce('contact_t')); ?>

                                <div>
                                    <div class="text-right">
                                        <a  data-toggle="collapse" href="#conact_seo" role="button" aria-expanded="false" aria-controls="conact_seo">
                                            Thêm ngôn ngữ
                                        </a>
                                    </div>
                                    <div class="collapse multi-collapse" id="conact_seo">
                                        <div class="form-group">
                                            <label>Mô tả bài viết tiếng anh</label>
                                            <textarea  class="form-control" id="contact_en" rows="3" name="contact_en"><?php echo e($theme -> contact_en); ?></textarea>
                                            <?php echo e(F_tinymce('contact_en')); ?>

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                  <button type="submit" class="btn btn-primary">Lưu thông tin</button>
               </form>
            </div>
            <!-- ket thuc danh sach  -->
         </div>
         
      </section>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('V_backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/theme_info.blade.php ENDPATH**/ ?>