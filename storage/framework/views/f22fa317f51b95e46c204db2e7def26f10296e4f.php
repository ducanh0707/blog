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
               <h3 class="box-title">Danh sách đơn hàng</h3>
               <br>
               <a class="btn btn-sm btn-primary" href="<?php echo e(asset('admin/order/export')); ?>">Tải file</a>
               <a class="btn btn-sm btn-success" href="<?php echo e(asset('admin/order/import')); ?>">Nhập file</a>
            </div>
            <div class="">
                <form action="<?php echo e(asset('admin/order')); ?>" method="GET">
                    <input type="hidden" name="search" value="on">
                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <input name="key" type="text" class="form-control" placeholder="Tìm kiếm" value="<?php if(isset($_GET['key'])): ?><?php echo e($_GET['key']); ?><?php endif; ?>">
                        </div>
                        <div class="col-md-2">
                            <select name="field" class="form-control">
                                <option value="tel">Số điện thoại</option>
                                <option value="email">Email</option>
                                <option value="cmt">Chứng minh thư</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-body table-responsive no-padding mt-3">
               <table class="table table-hover">
                  <tr>
                     <!-- <th>Mã</th> -->
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
                     
                     <th>Trạng thái</th>
                     <th class="text-center"></th>
                  </tr>
                  <?php if(count($order) != 0): ?>
                     <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                           <!-- <td class="">
                              M_<?php echo e($val->id); ?>

                           </td> -->
                           <td class="">
                              <?php echo e($val->name); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->tel); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->email); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->cmt); ?>

                           </td>
                           <!-- ngay tham gia  -->
                           <td class="text-center">
                             <?php echo e($val->ngay_tham_gia); ?>

                           <td class="">
                              <?php echo e($val->so_hop_dong); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->so_lo); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->dien_tich); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->nhom); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->da_gop_von); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->con_lai); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->lich_su); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->note); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->address); ?>

                           </td>
                           <td class="">
                              <?php echo e($val->content); ?>

                           </td>
                           <td class="">
                              <?php if($val->status == 'on'): ?>
                                 <label class="text-success">Đã xem</label>
                              <?php else: ?> 
                                 <label class="text-danger">Mới</label>
                              <?php endif; ?>
                           </td>
                            <!-- <td class="text-center">
                                <?php 
                                $date = date_create($val -> created_at);
                                echo date_format($date,'d/m/Y').'<br />';
                                echo date_format($date,'H:i:s');
                            ?> -->
                            </td>
                           <td  class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenu_<?php echo e($val->id); ?>" data-toggle="dropdown" aria-expanded="false">
                                      
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu<?php echo e($val->id); ?>">
                                       
                                        <a class="dropdown-item text-success" href="#" data-toggle="modal" data-target="#call_email_<?php echo e($val -> id); ?>"><i class="fa fa-envelope"></i> Gửi mail</a>
                                        <a class="dropdown-item text-primary" href="#" data-toggle="modal" data-target="#call_edit_<?php echo e($val -> id); ?>"><i class="fa fa-edit"></i> Sửa</a>
                                        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#call_del_<?php echo e($val -> id); ?>">
                                            <i class="fa fa-trash"></i> Xóa</a>
                                    </div>
                              </div>
                                <form action="<?php echo e(asset('admin/order/mail')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal fade" id="call_email_<?php echo e($val -> id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">   
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><i class="fa fa-envelope"></i> Gửi mail: <?php echo e($val->email); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-left">
                                            
                                                    <input type="hidden" name="email_nhan" value="<?php echo e($val->email); ?>">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <div class="form-group">
                                                                <label>Tiêu đề</label>
                                                                <?php echo e(F_input_basic('text',$val->title,'title','','form-control form-control-sm','','')); ?>

                                                        </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Nội dung</label>
                                                                <textarea name="content" id="mailContent_<?php echo e($val->id); ?>" class="form-control form-control-sm"> </textarea>
                                                                <?php echo e(F_tinymce('mailContent_'.$val->id)); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-submit btn-success">Gửi mail</button>
                                            </div>
                                        </div>
                                    </div>    
                                </form>
                             </div>

                              <div class="modal fade" id="call_del_<?php echo e($val -> id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> Bạn có chắc chắn muốn xóa?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                          <!-- id thuoc tinh -->
                                          <b>Thông tin xóa: </b> <?php echo e($val -> name); ?>

                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                          <a href="<?php echo url()->current().'/del/'.$val->id; ?>" role="button" class="btn btn-danger">Ok Xóa</a>
                                       </div>
                                    </div>
                                 </div>    
                              </div>
                           
                              <div class="modal fade" id="call_edit_<?php echo e($val -> id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered modal-xl" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h6 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-edit"></i> Sửa liên hệ -  Mã đơn:  M_<?php echo e($val->id); ?></h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                            <form action="<?php echo e(asset('admin/order/edit/'.$val->id)); ?>" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                            <div class="row">
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                             <label>Họ và tên</label>
                                                                <?php echo e(F_input_basic('text',$val->name,'name','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                  
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                             <label>Số điện thoại</label>
                                                                <?php echo e(F_input_basic('text',$val->tel,'tel','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                                <label>Email</label>
                                                                <?php echo e(F_input_basic('text',$val->email,'email','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <!-- chung minh thu  -->
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Số chứng minh thư</label>
                                                            <?php echo e(F_input_basic('text',$val->cmt,'cmt','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <!-- ngay tham gia  -->
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Ngày tham gia</label>
                                                            <?php echo e(F_input_basic('text',$val->ngay_tham_gia,'ngay_tham_gia','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Số hợp đồng</label>
                                                            <?php echo e(F_input_basic('text',$val->so_hop_dong,'so_hop_dong','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Số lô</label>
                                                            <?php echo e(F_input_basic('text',$val->so_lo,'so_lo','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Diện tích m2</label>
                                                            <?php echo e(F_input_basic('text',$val->dien_tich,'dien_tich','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Nhóm</label>
                                                            <?php echo e(F_input_basic('text',$val->nhom,'nhom','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Đã góp</label>
                                                            <?php echo e(F_input_basic('text',$val->da_gop_von,'da_gop_von','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                            <label>Còn lại</label>
                                                            <?php echo e(F_input_basic('text',$val->con_lai,'con_lai','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                       <div class="form-group">
                                                            <label>Lịch sử</label>
                                                            <textarea name="lich_su" class="form-control form-control-sm"><?php echo e($val->lich_su); ?></textarea>
                                                       </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                       <div class="form-group">
                                                            <label>Ghi chú</label>
                                                            <textarea name="note" class="form-control form-control-sm"><?php echo e($val->note); ?></textarea>
                                                       </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                       <div class="form-group">
                                                             <label>Địa chỉ</label>
                                                                <?php echo e(F_input_basic('text',$val->address,'address','','form-control form-control-sm','','')); ?>

                                                       </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                            <label>Yêu cầu</label>
                                                               <?php echo e(F_input_basic('textarea',$val->content,'content','','form-control form-control-sm','','')); ?>

                                                      </div>
                                                   </div>
                                                   
                                                    <div class="col-md-6">
                                                       <div class="form-group">
                                                          <label>Trạng thái liên hệ</label>
                                                          <select name="status" class="form-control form-control-sm">
                                                             <option value="on" <?php if($val->status == 'on'): ?> selected <?php endif; ?>>Đã xem</option>
                                                             <option value="off" <?php if($val->status == 'off'): ?> selected <?php endif; ?>>Mới</option>
                                                          </select>
                                                       </div>
                                                    </div>
                                                  
                                                
                                                 </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                            </div>
                                       </form>
                                    </div>
                                 </div>    
                              </div>
                           </td>
                        </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                  <?php else: ?>
                     <tr>
                        <td colspan="9" class="text-center">
                           <h6>Không có bài viết đủ điều kiện lọc</h6>
                        </td>
                     </tr>
                  <?php endif; ?>
               </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               <?php echo e($order->appends(request()->input()) ->links()); ?>

            </div>
          </div>
  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('V_backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Order/Views/index.blade.php ENDPATH**/ ?>