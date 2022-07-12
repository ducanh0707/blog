<?php $__env->startSection('content'); ?>
<div id="about" class="">
    <?php if(Session::get('lang') != 'vi'): ?>
        <?php 
            $lang = '_'.Session::get('lang');
            $name = 'Name';
            $tel =  'Phone';
            $address =  'Addpress';
            $content =  'Content';
            $send =  'Send';
         
        ?>
    <?php else: ?>
        <?php 
            $lang =  '';
            $name =  'Họ tên';
            $tel = 'Điện thoại';
            $address = 'Địa chỉ';
            $content = 'Nội dung';
            $send = 'Gửi';
           
           
        ?>
    <?php endif; ?>
  
   
    <div class="container">
        
 
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="contactTitle my-3 ">
                    <h2 class="sectionTitle text-center"> <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?></h1>
                </div>
                <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="contatMap">
                    <?php if($row->{'content_'.Session::get('lang')} != ''){ echo html_entity_decode($row->{'content_'.Session::get('lang')});}else{echo html_entity_decode($row->des);} ?>
                </div>
            </div>
            <div class="col-md-12 mt-3" >
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input name="name" type="text" class="form-control" placeholder="<?php echo e($name); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input name="email" type="text" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
               
                    
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input name="tel" type="text" class="form-control" placeholder="<?php echo e($tel); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <input name="address" type="text" class="form-control" placeholder="<?php echo e($address); ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                           <textarea name="content"  placeholder="<?php echo e($content); ?>" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-warning"><?php echo e($send); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
   
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_fontend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/resources/views/V_fontend/contact.blade.php ENDPATH**/ ?>