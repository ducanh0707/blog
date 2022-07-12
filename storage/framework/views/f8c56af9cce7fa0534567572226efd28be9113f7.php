<section class="doi_tac">
    <div class="container">
        <div class="row">
            <div class="col-md-12   my-3">
                
                <h2 class="sectionTitle text-center">
                    <div>
                        <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?>
                    </div>
                    <img src="<?php echo e(asset('upload/theme/doitac.png')); ?>" alt="">
                </h2>
            </div>
    
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="partnerSlider slider-project ">
                    <?php $__currentLoopData = $row->F_slide_img->where('status','on'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_i => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="partner-img">
                            <img src="<?php echo e(asset('source/slide/'.$img->img)); ?>" class="">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH D:\xampp\htdocs\cid18\resources\views/V_fontend/home/partner.blade.php ENDPATH**/ ?>