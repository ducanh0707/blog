<!DOCTYPE html>
<html lang=vi_VN class=no-js>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <title><?php echo e($title); ?></title>
   <meta name="description" content="<?php echo e($des); ?>" />
   <meta name="keywords" content="<?php echo e($key); ?>" />

   <meta property="og:title" content="<?php echo e($title); ?>" />
   <meta property="og:description" content="<?php echo e($des); ?>" />
    <?php if(isset($page_type)): ?>
        <?php if($page_type == 'home'): ?>
            <meta property="og:image" content="<?php echo e(asset('source/theme/'.$theme->og_image)); ?>" />
        <?php elseif($page_type == 'cat'): ?>
            <meta property="og:image" content="<?php echo e(asset('source/cat/'.$cat->img)); ?>" />
        <?php elseif($page_type == 'post'): ?>
            <meta property="og:image" content="<?php echo e(asset('source/post/'.$post->img)); ?>" />
        <?php else: ?>
        <meta property="og:image" content="" />
        <?php endif; ?>
    <?php endif; ?>
   <meta property="og:image:width" content="630"/>
    <meta property="og:image:height" content="315"/>
   <meta name="robots" content="index,follow">
   <meta name="copyright" content="" />
   <meta name="author" content="" />
   <meta http-equiv="audience" content="General" />
   <meta name="resource-type" content="Document" />
   <meta name="distribution" content="Global" />
   <meta name="revisit-after" content="1 days" />
   <meta name="generator" content="" />
   <meta property="og:site_name" content="Vankyo" />
   <meta property="og:type" content="website" />
   <meta property="og:locale" content="vi_VN" />
   <link rel="shortcut icon" href="<?php echo e(asset('source/theme/'.$theme->favicon)); ?>">
   
   <script src="<?php echo e(asset('style/fontend/js/jquery-3.3.1.min.js')); ?>"></script>
   <!-- giao dien -->
   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/css/style.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/css/style_mobile.css')); ?>">

   
   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/bootstrap-4-3-1/css/bootstrap.min.css')); ?>">
   
   <script src="<?php echo e(asset('style/fontend/bootstrap-4-3-1/js/popper.min.js')); ?>"></script>
   <script src="<?php echo e(asset('style/fontend/money/simple.money.format.js')); ?>"></script>

   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/css/animate.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/slick/slick.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/slick/slick-theme.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/icon/css/all.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('style/fontend/button-ring.css')); ?>">
 
   <?php echo html_entity_decode($theme->head) ?>
  
</head>
<body class="coming-soon ui-transparent-nav" >
  
      <?php $__currentLoopData = $row_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <section id="<?php echo e($row->style); ?>_<?php echo e($row->id); ?>" class="section-scroll row_head <?php echo e($row->style); ?> <?php echo e($row->display); ?> <?php if($row->img_bg == '' or $row->img_bg == null): ?> <?php echo e($row->bg); ?> <?php endif; ?>" <?php if($row->img_bg != ''): ?> style="background-image:url('<?php echo e(asset('/source/theme/'.$row->img_bg)); ?>');" <?php endif; ?>>
            <?php echo $__env->make('V_fontend/layout/'.$row->style, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </section>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      <?php echo $__env->yieldContent('content'); ?>
      <?php $__currentLoopData = $row_footer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section id="<?php echo e($row->style); ?>_<?php echo e($row->id); ?>" class="section-scroll row_footer <?php echo e($row->style); ?> <?php echo e($row->display); ?> <?php if($row->img_bg == '' or $row->img_bg == null): ?> <?php echo e($row->bg); ?> <?php endif; ?>" <?php if($row->img_bg != ''): ?> style="background-image:url('<?php echo e(asset('/source/theme/'.$row->img_bg)); ?>');" <?php endif; ?>>
            <?php echo $__env->make('V_fontend/layout/'.$row->style, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
       
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <script src="<?php echo e(asset('style/fontend/icon/js/all.js')); ?>"></script>
   <script src="<?php echo e(asset('style/fontend/bootstrap-4-3-1/js/bootstrap.min.js')); ?>"></script>
   <script src="<?php echo e(asset('style/fontend/slick/slick.js')); ?>"></script>

   <script>
      $(document).ready(function () {
          $('.navbar .dropdown-item').on('click', function (e) {
              var $el = $(this).children('.dropdown-toggle');
              var $parent = $el.offsetParent(".dropdown-menu");
              $(this).parent("li").toggleClass('open');

              if (!$parent.parent().hasClass('navbar-nav')) {
                  if ($parent.hasClass('show')) {
                      $parent.removeClass('show');
                      $el.next().removeClass('show');
                      $el.next().css({
                          "top": -999,
                          "left": -999
                      });
                  } else {
                      $parent.parent().find('.show').removeClass('show');
                      $parent.addClass('show');
                      $el.next().addClass('show');
                      $el.next().css({
                          "top": $el[0].offsetTop,
                          "left": $parent.outerWidth() - 4
                      });
                  }
                  e.preventDefault();
                  e.stopPropagation();
              }
          });

          $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
              $(this).find('li.dropdown').removeClass('show open');
              $(this).find('ul.dropdown-menu').removeClass('show open');
          });
      });
  </script>

  
  <?php $__currentLoopData = $button_ring; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_ri => $ring): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="hotline-phone-ring-wrap" id="button_ring_<?php echo e($ring->id); ?>" style="margin-bottom:<?php echo e(($key_ri)*80); ?>px; <?php if($ring->position == 'left'): ?> <?php echo e('left: 0'); ?> <?php else: ?> <?php echo e('right: 0'); ?> <?php endif; ?>">
            <div class="hotline-phone-ring">
                <div class="hotline-phone-ring-circle" style="border: 2px solid <?php echo e($ring->color_bg); ?>"></div>
                <div class="hotline-phone-ring-circle-fill" style="background-color:<?php echo e($ring->color_bg); ?>"></div>
                <div class="hotline-phone-ring-img-circle" style="background-color: <?php echo e($ring->color_bg); ?>;">
                    <a href="tel:<?php echo e($ring ->link); ?>" class="pps-btn-img" style="color: <?php echo e($ring->color_text); ?> !important;">
                        <?php echo html_entity_decode($ring -> icon); ?>
                    </a>
                </div>
            </div>
            
        </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($theme -> popup_regis == 'on'): ?>
        
            
            <div class="popip  button_bg_gradient" style="display:none;color:#fff; padding: 10px 20px; border: 1px solid <?php echo e($theme->border_color); ?>;  font-size: 16px;">
                <span class="popre_close" style=" color: #212529; background: #fff; border: 1px solid #9c43c2; ">X</span>
                <?php shuffle($popup_regis); ?>
                <?php $__currentLoopData = $popup_regis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_pr => $po_re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $key_time = $key_pr * 5000 ?>
                    <div class="popup_regis" <?php if($key_pr !='0' ): ?> style="display:none" <?php endif; ?>><b><?php echo e($po_re['name']); ?></b> -
                        <?php echo e($po_re['tel']); ?> <?php echo e($po_re['noti']); ?> </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <script>
                setTimeout(function () {
                    $('.popip').css('display', '');
                }, 4000);

                $('.popre_close').click(function () {
                    $('.popip').css('display', 'none');
                });
                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("popup_regis");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";

                    }
                    myIndex++;
                    if (myIndex > x.length) {
                        myIndex = 1
                    }
                    x[myIndex - 1].style.display = "block";
                    setTimeout(carousel, 10000); // Change image every 2 seconds
                }
            </script>
    <?php endif; ?>
  <?php if($theme-> popup != '' or $theme-> popup != null): ?>
      <!-- Modal -->
      <div class="modal fade" id="popup_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered <?php echo e($theme->f_popup->size); ?>">
                  <div class="modal-content">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                          style="text-align: right;margin-right: 7px;">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <div>
                          <a href="<?php echo e($theme->f_popup->link); ?>" target="_blank">
                              <img class="w-100" src="<?php echo e(asset('/source/popup/'.$theme->f_popup->img)); ?>">
                          </a>
                      </div>
                  </div>
          </div>
      </div>

      <div class="modal fade" id="popup_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered <?php echo e($theme->f_popup->size); ?>">
              <div class="modal-content bg_gradient" style="">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                      style="text-align: right;margin-right: 7px;">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="px-5  text-white">
                      <div class="text-center"><h4>ĐĂNG KÝ THÔNG TIN</h4></div>
                      <?php echo f_form($theme->f_popup) ?>
                  </div>
              </div>
          </div>
      </div>

      <script type="text/javascript">
          $(window).on('load', function () {
              var time_delay = '<?php echo e($theme->f_popup->time_deylay); ?>';
              setTimeout(function(){
                  if ($.cookie('time_popup') != 'on') {
                      $('#popup_<?php echo e($theme->f_popup->style); ?>').modal('show');
                  };
                  var date = new Date();
                  var minutes = '<?php echo e($theme->f_popup->time_cookie); ?>';
                  date.setTime(date.getTime() + (minutes * 60 * 1000));
                  $.cookie("time_popup", "on", {
                      expires: date
                  });
              }, time_delay * 1000); 
          });
      
      </script>
        
  <?php endif; ?>

  <script>
    (function ($) {
        $('.projectSlider').slick({
            centerMode: true,
            infinite: true,
            autoplay:true,
            autoplaySpeed:1500,
            slidesToShow:4,
            slidesToScroll:4,
            responsive: [
                {
                
                breakpoint: 768,
                settings: {
            
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 480,
                settings: {
                    dots: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
        });

        $('.partnerSlider').slick({
            centerMode: true,
            infinite: true,
            autoplaySpeed:1500,
            slidesToShow:6,
            slidesToScroll:6,
            responsive: [
                {
                
                breakpoint: 768,
                settings: {
            
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
                },
                {
                breakpoint: 480,
                settings: {
                    dots: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
                }
            ]
        });
    })(jQuery);
</script>

</body>
</html><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/index.blade.php ENDPATH**/ ?>