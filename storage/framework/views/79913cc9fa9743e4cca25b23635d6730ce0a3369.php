

<?php $__env->startSection('content'); ?>
<div class="container detail-news mt-3">
    <?php if(Session::get('lang') != 'vi'): ?>
        <?php $lang = '_'.Session::get('lang'); ?>
    <?php else: ?>
        <?php  $lang =  ''; ?>
    <?php endif; ?>
    <?php if(Session::get('lang') == ''): ?>
        <?php Session::put(['lang' => 'vi']); ?>
    <?php endif; ?>

    <div class='row justify-content-center'>
        <div class="col-md-8">
            <h1><?php if($post->{'title_'.Session::get('lang')} != ''){ echo $post->{'title_'.Session::get('lang') };}else{echo $post->title;} ?></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="post-content">
               
                <?php if($post->{'content_'.Session::get('lang')} != ''){ echo html_entity_decode($post->{'content_'.Session::get('lang')});}else{echo html_entity_decode($post->content);} ?>
            </div>
            <div class="post-relate mt-3">
                <h5>Bài viết liên quan</h5>
                <?php if(isset($post_relate)): ?>
                    <ul>
                        <?php $__currentLoopData = $post_relate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(asset(Session::get('lang').'/'.$post_r->url.'.html')); ?>">
                                    <?php echo e($post_r->title); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_fontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\cid18\resources\views/V_fontend/bai-viet.blade.php ENDPATH**/ ?>