
<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $row_body; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section id="<?php echo e($row->style); ?>" class="<?php echo e($row->style); ?>">
            <?php if(Session::get('lang') != 'vi'): ?>
                <?php 
                    $lang = '_'.Session::get('lang');
                ?>
            <?php else: ?>
                <?php  $lang =  ''; ?>
            <?php endif; ?>

            <?php if(Session::get('lang') == ''): ?>
                <?php Session::put(['lang' => 'vi']); ?>
            <?php endif; ?>
            <?php echo $__env->make('V_fontend/home/'.$row->style, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_fontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cid18\resources\views/V_fontend/home.blade.php ENDPATH**/ ?>