<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         <a class="btn btn-sm btn-primary" href="<?php echo e(asset('admin/order/import')); ?>">Quay lại</a>
          Mẫu liên hệ
        </h1>
    </section>
    <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main content -->
    <section class="content">
        <table class="table table-hover">
            <tr>
                <tr>
                 
                    <th>Tên</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Số CMT</th>
                    <th>Tham gia</th>
                    <th>Hợp đồng</th>
                    <th>Số lô</th>
                    <th>DT m2</th>
                    <th>Nhóm</th>
                    <th>Đã góp</th>
                    <th>Còn lại</th>
                    <th>Lịch sử</th>
                    <th>Ghi chú</th>
                    <th>Địa chỉ</th>
                    <th>Yêu cầu</th>
                    
                </tr>
            </tr>
            <?php if($order): ?>
              
                <tr>

                    <td class="">
                        <?php echo e($order->name); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->tel); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->email); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->cmt); ?>

                     </td>
                     <!-- ngay tham gia  -->
                     <td class="text-center">
                       <?php echo e($order->ngay_tham_gia); ?>

                     <td class="">
                        <?php echo e($order->so_hop_dong); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->so_lo); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->dien_tich); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->nhom); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->da_gop_von); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->con_lai); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->lich_su); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->note); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->address); ?>

                     </td>
                     <td class="">
                        <?php echo e($order->content); ?>

                     </td>

                </tr>
          
            <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">
                    <h6>Không có bài viết đủ điều kiện lọc</h6>
                </td>
            </tr>
            <?php endif; ?>
        </table>
    </section>
    <!-- /.content -->
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Order/Views/order_list.blade.php ENDPATH**/ ?>