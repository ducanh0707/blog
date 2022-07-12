<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn menu <a target="_blank" href="<?php echo e(asset('admin/menu/0')); ?>"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="menu_id">
          <option value="0">Trống</option>
          <?php $__currentLoopData = $menu_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($menu_r -> id); ?>" <?php if($menu_r->id == $row->menu_id ): ?> selected <?php endif; ?>><?php echo e($menu_r -> name); ?></option>   
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </select>
</div><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/feild/menu_id.blade.php ENDPATH**/ ?>