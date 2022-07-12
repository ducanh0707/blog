<?php
    function F_slide($row,$url){
        if($row->F_slide_img->count()>0){
?>
            <div id="carousel_<?php echo $row->id; ?>" class="carousel slide" data-ride="carousel" style="height: <?php echo $row->height ?>px !important;">
                <ol class="carousel-indicators">
                    <?php foreach($row->F_slide_img->where('status','on') as $key_d => $dot){ ?>
                        <li data-target="#carousel_<?php echo $row->id; ?>" data-slide-to="<?php echo $key_d ?>" class="<?php if($key_d == 0){ echo 'active';} ?>"></li>
                     <?php } ?>
                </ol>
                <div class="carousel-inner" style="height: <?php echo $row->height ?>px; display: flex; align-items: center;">
                    <?php foreach($row->F_slide_img->where('status','on') as $key_i => $img){ ?> 
                        <div class="carousel-item <?php if($key_i == 0){ echo 'active';} ?>">
                            <img src="<?php echo  $url.'/'.$img->img ?>" class="d-block w-100" alt="<?php echo $img->des ?>">
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
<?php
        }else{
            echo 'Bạn chưa chọn slide hoặc slide không có ảnh';
        }
    }

    function F_slide_2($row,$url){
        if($row->F_slide_img_2->count()>0){
?>
            <div id="carousel_<?php echo $row->id; ?>" class="carousel slide" data-ride="carousel" style="height: <?php echo $row->height ?>px !important;">
                <ol class="carousel-indicators">
                    <?php foreach($row->F_slide_img_2->where('status','on') as $key_d => $dot){ ?>
                        <li data-target="#carousel_<?php echo $row->id; ?>" data-slide-to="<?php echo $key_d ?>" class="<?php if($key_d == 0){ echo 'active';} ?>"></li>
                     <?php } ?>
                </ol>
                <div class="carousel-inner" style="height: <?php echo $row->height ?>px; display: flex; align-items: center;">
                    <?php foreach($row->F_slide_img_2->where('status','on') as $key_i => $img){ ?> 
                        <div class="carousel-item <?php if($key_i == 0){ echo 'active';} ?>">
                            <img src="<?php echo  $url.'/'.$img->img ?>" class="d-block w-100" alt="<?php echo $img->des ?>">
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
<?php
        }else{
            echo 'Bạn chưa chọn slide hoặc slide không có ảnh';
        }
    }

    function F_slide_thumbnail($row,$url){
        if($row->F_slide_img->count()>0){
?>
            <div id="carousel_<?php echo $row->id; ?>" class="carousel slide thum" data-ride="carousel" style="height: <?php echo $row->height ?>px !important;">
                
                <div class="carousel-inner" style="height: <?php echo $row->height ?>px; display: flex; align-items: center;">
                    <?php foreach($row->F_slide_img->where('status','on') as $key_i => $img){ ?> 
                        <div class="carousel-item <?php if($key_i == 0){ echo 'active';} ?>">
                            <img src="<?php echo $url.'/'.$img->img ?>" class="d-block w-100" alt="<?php echo $img->des ?>">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $img->title ?></h5>
                                <p><?php echo $img->des ?></p>
                            </div>
                        </div>
                        <?php } ?>    
                </div>
                <ol class="carousel-indicators" style="position: unset !important;">
                    <?php foreach($row->F_slide_img->where('status','on') as $key_d => $dot){ ?>
                        <li style=" width: 80px !important;" data-target="#carousel_<?php echo $row->id; ?>" data-slide-to="<?php echo $key_d ?>" class="<?php if($key_d == 0){ echo 'active';} ?>">
                            <img src="<?php echo  $url.'/'.$dot->img ?>" class="d-block w-100" style="height: 50px !important;">
                        </li>
                     <?php } ?>
                </ol>
                <a class="carousel-control-prev" href="#carousel_<?php echo $row->id; ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel_<?php echo $row->id; ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>       
            
<?php
        }else{
            echo 'Bạn chưa chọn slide hoặc slide không có ảnh';
        }
    }