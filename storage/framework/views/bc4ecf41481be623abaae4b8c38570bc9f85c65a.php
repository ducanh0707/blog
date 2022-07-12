<nav class="navbar navbar-expand navbar-white bg-white" id="menu_top">
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
        aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample02">
        <ul class="navbar-nav">
          
                <?php echo e(FF_nav_multi_level($row->f_menu)); ?>

          
            <?php
                $url_ex = explode('/',request()->path());
            
                if(count($url_ex) == 1){
                    $url = '/home';
                }else{
                    $url =  substr(request()->path(),2);
                }
            ?>

            <li id="" class="nav-item ">
                <a href="<?php echo e(asset('changeLanguage/vi'.$url)); ?>" id="" class="nav-link ">
                    <img src="<?php echo e(asset('upload/theme/vietnam.png')); ?>"> Tiếng Việt
                </a>
            </li>
            <li id="" class="nav-item ">
                <a href="<?php echo e(asset('changeLanguage/en'.$url)); ?>" id="" class="nav-link ">
                    <img src="<?php echo e(asset('upload/theme/english.png')); ?>"> English
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/layout/menu.blade.php ENDPATH**/ ?>