<?php $__env->startSection('content'); ?>
<div id="cat" class="mt-5">
    <?php if(Session::get('lang') != 'vi'): ?>
        <?php $lang = '_'.Session::get('lang'); ?>
    <?php else: ?>
        <?php  $lang =  ''; ?>
    <?php endif; ?>
    <?php if(Session::get('lang') == ''): ?>
        <?php Session::put(['lang' => 'vi']); ?>
    <?php endif; ?>
 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php if($cat->{'name_'.Session::get('lang')} != ''){ echo $cat->{'name_'.Session::get('lang') };}else{echo $cat->name;} ?></h1>
            </div>
            <div class="col-md-12">
                <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <?php $__currentLoopData = $post_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 my-2">
                            <?php echo $__env->make('V_fontend/mod_product_doc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-footer clearfix">
                            <?php echo e($post_list->appends(request()->input()) ->links()); ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
   
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_fontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/cat.blade.php ENDPATH**/ ?>