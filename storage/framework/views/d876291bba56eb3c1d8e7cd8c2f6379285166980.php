<?php if($row->F_slide_img->count()>0): ?>
    <div id="carousel_<?php echo $row->id; ?>" class="carousel slide" data-ride="carousel" style="height: <?php echo $row->height ?>px !important;">
        <ol class="carousel-indicators">
            <?php foreach($row->F_slide_img->where('status','on') as $key_d => $dot){ ?>
                <li data-target="#carousel_<?php echo $row->id; ?>" data-slide-to="<?php echo $key_d ?>" class="<?php if($key_d == 0){ echo 'active';} ?>"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner" style="height: <?php echo $row->height ?>px; display: flex; align-items: center;">
            <?php foreach($row->F_slide_img->where('status','on') as $key_i => $img){ ?> 
                <div class="carousel-item <?php if($key_i == 0){ echo 'active';} ?>">
                    <a href="<?php echo $img->link ?>">
                        <img src="<?php echo  '/public/source/slide/'.$img->img ?>" class="d-block w-100 img-slide">
                    </a>
                    <div class="carousel-caption d-none d-md-block">
                        <div class="animate__animated animate__fadeInUp">
                            
                            <div class="slide-des">
                                <?php if($img->{'des'.$lang} != ''){ echo  html_entity_decode($img->{'des'.$lang });}else{echo  html_entity_decode($img->des);} ?>    
                            </div>
                            <div class="slide-button py-3">
                                <a href="<?php echo $img->link_button ?>" class="bg-blue-2 text-white font-weight-bold p-2 px-4"><?php if($img->{'button'.$lang} != ''){ echo $img->{'button'.$lang };}else{echo $img->button;} ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>    
        </div>
        <a class="carousel-control-prev" href="#carousel_<?php echo $row->id; ?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel_<?php echo $row->id; ?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
<?php endif; ?><?php /**PATH /home/cid18/domains/cid18.vn/public_html/resources/views/V_fontend/layout/slide.blade.php ENDPATH**/ ?>