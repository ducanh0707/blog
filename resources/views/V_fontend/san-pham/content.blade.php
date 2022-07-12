<section id="product" class="product mt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if($post->{'content'.$lang} != ''){ echo html_entity_decode($post->{'content'.$lang });}else{echo html_entity_decode($post->content);} ?>
            </div>
        </div>
     
    </div>
</section>
<div style="clear:both"></div>