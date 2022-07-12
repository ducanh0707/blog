<ul class="list-group mt-2">
    <li class="list-group-item <?php if(Request::segment(3) == 'sidebar'): ?><?php echo e('list-group-item-success'); ?> <?php endif; ?>">
       <a href="<?php echo e(asset('admin/theme/sidebar/'.$sidebar_first_id)); ?>">Sửa sidebar</a>
    </li>
    <li class="list-group-item <?php if(Request::segment(3) == 'row'): ?><?php echo e('list-group-item-success'); ?> <?php endif; ?>">
       <a href="<?php echo e(asset('admin/theme/row/'.$row_first_id)); ?>">Sửa trang chủ</a>
    </li>
    
    
    <li class="list-group-item <?php if(Request::segment(3) == 'info'): ?><?php echo e('list-group-item-success'); ?> <?php endif; ?>">
       <a href="<?php echo e(asset('admin/theme/info')); ?>">Cài đặt website</a>
    </li>
 </ul><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/inc_menu.blade.php ENDPATH**/ ?>