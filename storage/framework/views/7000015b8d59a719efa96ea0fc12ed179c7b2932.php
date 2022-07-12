<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center ">
                <img src="<?php echo e(asset('upload/theme/section-icon.png')); ?>" alt="">
            </div>
            <h2 class="sectionTitle text-center  my-3"> <i class="fa fa-video mr-2" aria-hidden="true"></i> <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?></h2>
        </div>

    </div>
    <div class="row">
        <div class="content">
            <div class="col-md-12">
                <div class="row">
                    <?php $__currentLoopData = $row->F_cat_post_id->f_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-6 mt-4">
                                <div class="video_mod">
                                    <div class="video_img">
                                        <a href="<?php echo e(asset(Session::get('lang').'/'.$post->url.'.html')); ?>"><img src="<?php echo e(asset('source/post/'.$post->img)); ?>" class="w-100"></a>
                                    </div>
                                  
                                    <div class="video_title font-weight-bold py-2">
                                        <a href="<?php echo e(asset(Session::get('lang').'/'.$post->url.'.html')); ?>">
                                            <?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?>
                                        </a>
                                    </div>
                                     
                                 
                                </div>
                            </div>                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </div>
            </div>
          
        </div>
    </div>
 
</div><?php /**PATH D:\xampp\htdocs\cid18\resources\views/V_fontend/home/video.blade.php ENDPATH**/ ?>