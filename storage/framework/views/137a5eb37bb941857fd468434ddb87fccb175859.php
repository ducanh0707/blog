   <div class="col-md-12">
     <!-- thong bao thanh cong -->
     <?php if(session('alert')): ?>
       <div class="alert alert-success">
         <?php echo e(session('alert')); ?>

       </div>
     <?php endif; ?>
     <?php if(session('alert_error')): ?>
       <div class="alert alert-danger">
         <?php echo e(session('alert_error')); ?>

       </div>
     <?php endif; ?>
     <!-- thong bao loi -->
     <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
           <?php $__currentLoopData = $errors -> all (); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errors_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($errors_r); ?> <br>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
     <?php endif; ?>
   </div>
<?php /**PATH D:\wamp64\www\cid18\resources\views/V_backend/alert.blade.php ENDPATH**/ ?>