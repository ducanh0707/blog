<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(asset('')); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
         <img src="<?php echo e(asset('upload/theme/icon.png')); ?>" height="30px">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
         
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
         <nav class="my-2 my-md-0 mr-md-3">
            <div class="btn-group px-2">
               <?php if(isset($web_id)): ?>
                  <a class="mx-2 text-white" href="<?php echo e('http://'.$web->domain); ?>" target="_blank">
                     <?php echo e($web->domain); ?>

                  </a>
                  <a class="text-white">
                     <?php echo e($web->f_user -> email); ?>

                  </a>
               <?php endif; ?>
            </div>
            <div class="btn-group px-2">
               <?php if(Auth::user()->user_type_id == 1 or Auth::user()->user_type_id == 2): ?>
                  <a href="#" class="text-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class=" fa fa-bell"></i> <?php echo e(count(Auth::user()->f_user_noti)); ?>

                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                     <?php $__currentLoopData = Auth::user()->f_user_noti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_noti_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php if($_noti_r->type == 'form'): ?> <?php echo e(asset('admin/regis/'.$_noti_r->form_id.'/info')); ?> <?php endif; ?>" class="dropdown-item text-sm" id="alert_<?php echo e($_noti_r->id); ?>">
                           <?php echo html_entity_decode($_noti_r->noti) ?>
                        </a>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
               <?php else: ?>
                  <?php if(isset($web_id)): ?>
                     <?php
                        $web = App\Http\Model\M_domain::where('id',$web_id)->first();
                        $user_noti = DB::connection($web -> data)->table('user_noti')->where('view','off')->get();
                     ?>
                     <a href="#" class="text-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class=" fa fa-bell"></i> <?php echo e(count($user_noti)); ?>

                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <?php if(count($user_noti) >0): ?>
                           <?php $__currentLoopData = $user_noti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_noti_r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <a href="<?php if($_noti_r->type == 'form'): ?> <?php echo e(asset('admin/web/'.$web_id.'/form/'.$_noti_r->form_id.'/contact')); ?> <?php endif; ?>" class="dropdown-item text-sm" id="alert_<?php echo e($_noti_r->id); ?>">
                                 <?php echo html_entity_decode($_noti_r->noti) ?>
                              </a>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?> 
                           <a class="dropdown-item text-sm">
                              Trống
                           </a>   
                        <?php endif; ?>
                     </div>
                  <?php endif; ?>
               <?php endif; ?>
            </div>
            <!-- user -->
            <div class="btn-group px-2">
               <?php if(Auth::user()->avatar !=''): ?>
                  <img class="mr-2" height="20px" src="<?php echo e(asset('upload/user/'.Auth::user()->avatar)); ?>"> 
               <?php endif; ?>
               <a href="#" class="text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo Auth::user()->name ?>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                 
                  <a href="" class="dropdown-item">Cá nhân</a>
                  <a href="<?php echo e(asset('admin/logout')); ?>" class="dropdown-item">Thoát</a>
               </div>
               
            </div>
         </nav>
      </div>
    </nav>
</header><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_backend/top.blade.php ENDPATH**/ ?>