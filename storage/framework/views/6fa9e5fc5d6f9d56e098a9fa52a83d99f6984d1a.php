
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">

    <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title mb-3">Cài đặt mail</h3>
               <br>
               <a class="btn btn-sm btn-primary" href="<?php echo e(asset('admin/order')); ?>">Quay lại</a>
               <a class="btn btn-sm btn-danger" href="<?php echo e(asset('admin/order/resetMail')); ?>">Reset tất cả mail</a>
            </div>
          
            <div class="box-body">
                <form action="<?php echo e(asset('admin/order/mailConfig')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="font-weight-bold">Bật/ tắt gửi mail</label>
                            <select name="mailSendStatus" class="form-control">
                                <option value="on" <?php if($mailSendStatus->value == 'on'): ?> selected <?php endif; ?>>Bật</option>
                                <option value="off" <?php if($mailSendStatus->value == 'off'): ?> selected <?php endif; ?>>Tắt</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Địa chỉ email</label>
                            <input name="mailAddress" class="form-control" value="<?php echo e($mailAddress->value); ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Mật khẩu email</label>
                            <input name="mailPass" class="form-control" value="<?php echo e($mailPass->value); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tiêu đề</label>
                        <input name="mailTitle" class="form-control" value="<?php echo e($mailTitle->value); ?>">
                        
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nội dung mail</label>
                        <textarea name="mailContent" class="form-control" id="mailContent"><?php echo e($mailConfig->value); ?></textarea>
                        <?php echo e(F_tinymce('mailContent')); ?>

                    </div>
                   
                    <div class="form-group">
                        <button class="btn btn-primary">Gửi</button>
                    </div>
               </form>
            </div>
          
          </div>
  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('V_backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cid18\app\Modules/Order/Views/mailConfig.blade.php ENDPATH**/ ?>