<div class="container">
  
    <div class="row">
        <div class="col-md-12">

            <div class="projectSlider slider-project ">
                <?php $__currentLoopData = $row->F_cat_post_id->f_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="du_an_mod">
                        <div class="du_an_img">
                            <a href="<?php echo e(asset(Session::get('lang').'/'.$post->url.'.html')); ?>"><img src="<?php echo e(asset('source/post/'.$post->img)); ?>" class="w-100"></a>
                        </div>
                        <div class="du_an_title_des ">
                            <div class="du_an_title font-weight-bold py-2">
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

  <?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/home/project.blade.php ENDPATH**/ ?>