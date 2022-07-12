<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center ">
                <img src="<?php echo e(asset('upload/theme/section-icon.png')); ?>" alt="">
            </div>
            <h2 class="sectionTitle text-center"> <img height="30px" src="<?php echo e(asset('source/theme/'.$row_head->first()->img_2)); ?>" alt=""> <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?></h2>
        </div>

    </div>
    <div class="row mt-3">
       
                <?php $__currentLoopData = $row->F_cat_list_id->f_child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="col-md-3">
                            <div class="activity_mod">
                                <div class="activity_img">
                                    <a href="<?php echo e(asset(Session::get('lang').'/'.$cat->url)); ?>"><img src="<?php echo e(asset('source/cat/'.$cat->img)); ?>" class="w-100"></a>
                                </div>
                                <div class="activity_title_des bg-white">
                                    <div class="activity_title font-weight-bold py-2">
                                        <a href="<?php echo e(asset(Session::get('lang').'/'.$cat->url)); ?>">
                                            <?php if($cat->{'name'.$lang} != ''){ echo $cat->{'name'.$lang };}else{echo $cat->name;} ?>
                                        </a>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
       
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
 
</div><?php /**PATH D:\wamp64\www\cid18\resources\views/V_fontend/home/field_of_activity.blade.php ENDPATH**/ ?>