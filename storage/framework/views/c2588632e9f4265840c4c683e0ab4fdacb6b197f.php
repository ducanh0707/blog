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
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_fontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/bai-viet.blade.php ENDPATH**/ ?>