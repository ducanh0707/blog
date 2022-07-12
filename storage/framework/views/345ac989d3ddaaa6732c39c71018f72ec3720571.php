<section class="footer" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="img_logo text-center">
                    <img src="<?php echo e(asset('source/theme/'.$row->img_2)); ?>" alt="">
                </div>
                
                <div class="social text-center mt-5">
                    <?php if($row->icon_text != '' or $row->icon_text != null): ?>
                    <?php $t=0; ?>
                    
                    <?php if(json_decode($row->icon_text)): ?>
                            <?php $__currentLoopData = json_decode($row->icon_text); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_it => $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $t++; ?>
                                <span class="hotine <?php if($t > 1): ?><?php echo e('borderLeft'); ?><?php endif; ?>">
                                    <a href="<?php if($it->{'text'.$lang} != ''){ echo $it->{'text'.$lang };}else{echo $it->text;} ?>">
                                        <?php echo html_entity_decode($it->icon) ?> 
                                    </a>
                                    
                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="footer-address mt-3">
                        <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-email text-right  mt-3">
                        <?php if($row->{'title_2'.$lang} != ''){ echo $row->{'title_2'.$lang };}else{echo $row->title_2;} ?>
                </div>
            </div>
        
        </div>
    </div>
</section>

<style>
    .footer{
        background-image:url('<?php echo e(asset('source/theme/'.$row->img)); ?>');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/layout/footer.blade.php ENDPATH**/ ?>