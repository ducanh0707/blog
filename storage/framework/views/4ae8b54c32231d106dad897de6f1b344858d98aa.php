<section class="doi_tac">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center ">
                    <img src="<?php echo e(asset('upload/theme/section-icon.png')); ?>" alt="">
                </div>
                <h2 class="sectionTitle text-center  my-3"> <i class="fa fa-newspaper mr-2" aria-hidden="true"></i> <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?> - <?php if($row->{'title_2'.$lang} != ''){ echo $row->{'title_2'.$lang };}else{echo $row->title_2;} ?></h2>
            </div>
    
        </div>

        <div class="row mt-3">
            
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title_doi_tac">
                            <h4 class="sectionSubTitle"><?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php $__currentLoopData = $row->F_cat_post_id->f_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key < 4): ?>
                                <div class="news_event_mod">
                                    <div class="row">
                                        <div class="col-md-3 col-6 mt-4">
                                            
                                            <div class="news_event_img">
                                                <a href="<?php echo e(asset(Session::get('lang').'/'.$post->url.'.html')); ?>"><img src="<?php echo e(asset('source/post/'.$post->img)); ?>"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-6 mt-4">
                                            <div class="news_event_title_des ">
                                                <div class="news_event_title font-weight-bold py-2">
                                                    <a href="<?php echo e(asset(Session::get('lang').'/'.$post->url.'.html')); ?>">
                                                        <?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?>
                                                    </a>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>   
                                </div>   
                            <?php endif; ?>              
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title_doi_tac">
                            <h4 class="sectionSubTitle"><?php if($row->{'title_2'.$lang} != ''){ echo $row->{'title_2'.$lang };}else{echo $row->title_2;} ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php $__currentLoopData = $row->F_cat_post_id_2->f_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key < 4): ?>
                            <div class="news_event_mod">
                                <div class="row">
                                    <div class="col-md-3 col-6 mt-4">
                                        
                                        <div class="news_event_img">
                                            <a href="<?php echo e(asset(Session::get('lang').'/'.$post->url.'.html')); ?>"><img src="<?php echo e(asset('source/post/'.$post->img)); ?>" ></a>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-6 mt-4">
                                        <div class="news_event_title font-weight-bold py-2">
                                            <a href="<?php echo e(asset(Session::get('lang').'/'.$post->url.'.html')); ?>">
                                                <?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>   
                            </div>     
                        <?php endif; ?>            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/home/news_event.blade.php ENDPATH**/ ?>