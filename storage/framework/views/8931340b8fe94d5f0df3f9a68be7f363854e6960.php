<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <!-- trang chu -->
            <li class="<?php if(Request::segment(2) == 'dashboard'){echo 'active';} ?>">
               <a href="<?php echo e(asset('admin/dashboard')); ?>">
                  <i class="fa fa-home"></i> <span>Trang chủ</span>
               </a>
            </li>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('post_view')): ?>
               <?php $__currentLoopData = $_post_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_type_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="<?php if(Request::segment(4) == 'post'){echo 'active';} ?>">
                     <a href="<?php echo e(asset('admin/post/'.$post_type_r -> url)); ?>">
                        <?php echo html_entity_decode($post_type_r->icon) ?> <span><?php echo e($post_type_r -> name); ?></span>
                     </a>
                  </li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
           
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cat_view')): ?>
               <li class="<?php if(Request::segment(4) == 'cat'){echo 'active';} ?>">
                  <a href="<?php echo e(asset('admin/cat')); ?>">
                     <i class="fab fa-buffer"></i> <span>Danh mục</span>
                  </a>
               </li>
            <?php endif; ?> 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_view')): ?>
               <li class="<?php if(Request::segment(4) == 'order'){echo 'active';} ?>">
                  <a href="<?php echo e(asset('admin/order')); ?>">
                     <i class="fas fa-file-invoice-dollar"></i> <span>Đơn hàng</span>
                  </a>
               </li>
            <?php endif; ?>    

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_view')): ?>
               <li class="<?php if(Request::segment(2) == 'user'){echo 'active';} ?>">
                  <a href="<?php echo e(asset('admin/user/')); ?>">
                     <i class="fa fa-user"></i> <span>Thành viên</span>
                  </a>
               </li>
            <?php endif; ?>

            <li class="treeview <?php if( Request::segment(2) == 'gift'){echo 'active';} ?>">
               <a href="#">
                  <i class="fa fa-palette"></i> <span>Giao diện website</span>
                  <span class="pull-right-container"><i class="fa fa-arrow-circle-down pull-right"></i></span>
               </a>
               <ul class="treeview-menu">
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('theme_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'theme'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/theme/info')); ?>">
                           <i class="fa fa-palette text-danger"></i> <span>Sửa giao diện</span>
                        </a>
                     </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'menu'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/menu/0')); ?>">
                           <i class="fa fa-list"></i> <span>Menu</span>
                        </a>
                     </li>
                  <?php endif; ?>   
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slide_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'slide'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/slide')); ?>">
                           <i class="fa fa-photo-video"></i> <span>Slide</span>
                        </a>
                     </li>
                  <?php endif; ?>   
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('button_ring_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'button_ring'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/button_ring')); ?>">
                           <i class="fa fa-satellite-dish"></i> <span>Nút bấm liên hệ</span>
                        </a>
                     </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('popup_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'popup'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/popup')); ?>">
                           <i class="fa fa-clone"></i> <span>Popup tự động</span>
                        </a>
                     </li>
                  <?php endif; ?>
               </ul>
            </li>



            <li class="treeview <?php if(Request::segment(2) == 'post_type' or  Request::segment(2) == 'file' or Request::segment(2) == 'tab' or Request::segment(2) == 'popup_regis' or Request::segment(2) == 'popup' or Request::segment(2) == 'button_ring'){echo 'active';} ?>">
               <a href="#">
                  <i class="fa fa-cog"></i> <span>Chức năng website</span>
                  <span class="pull-right-container"><i class="fa fa-arrow-circle-down pull-right"></i></span>
               </a>
               <ul class="treeview-menu">
                  
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('popup_regis_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'popup_regis'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/popup_regis')); ?>">
                           <i class="fa fa-comment-alt"></i> <span>Popup khách hàng</span>
                        </a>
                     </li>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tab_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'tab'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/tab')); ?>">
                           <i class="fa fa-indent"></i> <span>Tab nội dung</span>
                        </a>
                     </li>
                  <?php endif; ?> 
                  
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('post_type_view')): ?>
                     <li class="<?php if(Request::segment(4) == 'post_type'){echo 'active';} ?>">
                        <a href="<?php echo e(asset('admin/post_type')); ?>">
                           <i class="fa fa-folder-plus"></i> <span>Thể loại post</span>
                        </a>
                     </li>
                  <?php endif; ?>
                 
               </ul>
            </li>
         
      </ul>
   </section>
</aside>
<?php /**PATH D:\xampp\htdocs\cid18\resources\views/V_backend/menu.blade.php ENDPATH**/ ?>