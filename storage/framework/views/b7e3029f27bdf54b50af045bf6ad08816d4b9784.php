<?php $__env->startSection('content'); ?>
<div class="content-wrapper" style="background-color: #ecf0f5;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="<?php echo e(asset('admin/dashboard')); ?>" class="btn btn-primary btn-sm">Quay lại</a>

        <h3>Sửa trang chủ</h3>
        <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-2">
                <ul class="list-group" id="sortable">
                    <?php if(count($row_list) > 0): ?>
                    <?php $__currentLoopData = $row_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li id="item_<?php echo e($val->id); ?>" class="ui-state-default list-group-item d-flex justify-content-between align-items-center <?php if($val -> id == $row_id): ?> <?php echo e('list-group-item-primary'); ?> <?php endif; ?>">
                        <a class="<?php if($val -> status != 'on'): ?> text-danger <?php endif; ?>"
                            href="<?php echo e(asset('admin/theme/row/'.$val->id)); ?>">
                            <?php echo e($val->name); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
                <button class="btn btn-primary btn-sm mt-2" href="#" data-toggle="modal" data-target="#new_row_custome">
                    <i class="fa fa-plus text-sm"></i> Thêm hàng
                </button>

                <?php echo $__env->make('Theme::inc_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Theme::inc/row_custome_new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <script>
                    $(function () {
                        $("#sortable").sortable({
                            update: function (event, ui) {
                                var data = $(this).sortable('serialize');
                                var token = '<?php echo e(csrf_token()); ?>';
                                // ajax 
                                $.ajax({
                                    type: "POST",
                                    url: '<?php echo e(asset('')); ?>admin/theme/row_order',
                                    dataType: "json",
                                    data: {
                                        data: data,
                                        _token: token
                                    },
                                });
                            }
                        });
                        $("#sortable").disableSelection();
                    });

                </script>
            </div>
            <?php if(isset($row->name)): ?>
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="box-title">
                            <?php echo e($row->name); ?>

                            <!-- status -->
                            <a href="<?php echo e(asset('admin/theme/row/status/'.$row_id)); ?>">
                                <i
                                    class="fa fa-chevron-circle-down <?php if($row->status == 'on'): ?> <?php echo e('text-success'); ?> <?php else: ?> <?php echo e('text-danger'); ?> <?php endif; ?>"></i>
                            </a>
                            <!-- xoa widget -->
                            <a href="#" data-toggle="modal" data-target="#del_row">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                            <div class="modal fade" id="del_row" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="modal-dialog modal-dialog-centered" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle"><i
                                                    class="text-danger fa fa-trash"></i> Xóa hàng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <div>
                                                    <i class="fa fa-caret-right"></i> Tên: <?php echo e($row -> name); ?>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                                <a href="<?php echo e(asset('admin/theme/row/del/'.$row_id)); ?>"
                                                    class="btn btn-sm btn-danger">Ok Xóa</a>
                                            </div>
                                        </div> <!-- dong the modal -body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget group meta  -->
                    <div class="box-body">
                        <form method="post" action="<?php echo e(asset('admin/theme/row/'.$row_id)); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo $__env->make('Theme::inc/row_custome_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                            
                        </form>

                    </div>
                </div>
            </div>
            <?php else: ?>
            Hàng không tồn tại
            <?php endif; ?>
            <!-- ket thuc danh sach  -->
        </div>

    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/theme_row.blade.php ENDPATH**/ ?>