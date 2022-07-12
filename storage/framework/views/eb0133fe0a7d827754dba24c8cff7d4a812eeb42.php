<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn slide <a target="_blank" href="<?php echo e(asset('admin/slide')); ?>"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="slide_id">
          <option value="0">Trống</option>
          <?php $__currentLoopData = $slide_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <option value="<?php echo e($slide -> id); ?>" <?php if($row->slide_id == $slide->id): ?> selected <?php endif; ?>><?php echo e($slide -> name); ?></option>   
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </select>
 </div><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/feild/slide_id.blade.php ENDPATH**/ ?>