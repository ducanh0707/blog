  
  <input type="hidden" name="type" value="custome">
  <div class="row mt-3">
     <div class="col-md-8">
            <?php if(isset($row->feild)): ?>
               <?php if($row->feild): ?>
                  <?php $__currentLoopData = json_decode($row->feild); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('Theme::feild/'.$feild, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php endif; ?>
            <?php else: ?>
               Bạn chưa chọn trường cho hàng này
            <?php endif; ?>
     </div>
     
     <div class="col-md-4">
         <?php echo $__env->make('Theme::inc/inc_row_input_right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     </div>
  </div><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/inc/row_custome_edit.blade.php ENDPATH**/ ?>