<div class="product_mod_box cursor">
    
    <div class="img_product">
        <a href="<?php echo e(asset(Session::get('lang').'/'.$product->url.'.html')); ?>"><img class="w-100" src="<?php echo e(asset('source/post/'.$product->img)); ?>" alt="<?php echo e($product->title); ?>"></a>
    </div>
    <div class="title_product">
        <a class="text-black" href="<?php echo e(asset(Session::get('lang').'/'.$product->url.'.html')); ?>"><?php if($product->{'title'.$lang} != ''){ echo $product->{'title'.$lang };}else{echo $product->title;} ?></a>
    </div>
    
</div>

<?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/mod_product_doc.blade.php ENDPATH**/ ?>