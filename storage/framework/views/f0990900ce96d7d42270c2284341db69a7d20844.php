
<!doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>Đăng nhập</title>
   <link rel="stylesheet" href="<?php echo e(asset('style/backend/css/style_login.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('style/backend/bootstrap-4-3-1/css/bootstrap.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('style/backend/icon/fontawesome.css')); ?>">
   <script src="<?php echo e(asset('style/backend/bootstrap-4-3-1/js/popper.min.js')); ?>"></script>

</head>

  <body style="height: 100%;display: flex;-ms-flex-align: center;align-items: center;padding-top: 40px;padding-bottom: 40px; background-color: #f5f5f5;">
    <form class="form-signin" action="" method="POST">
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

      <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="form-group">
         <label>Địa chỉ Email</label>
         <input name="email" type="email" class="form-control">
      </div>

      <div class="form-group">
         <label>Mật khẩu</label>
        <input name="password" type="password"  class="form-control" >
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" id="remember" name="remember"> Lưu mật khẩu
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2010-2019</p>
    </form>
  </body>
</html><?php /**PATH D:\xampp\htdocs\cid18\resources\views/V_login.blade.php ENDPATH**/ ?>