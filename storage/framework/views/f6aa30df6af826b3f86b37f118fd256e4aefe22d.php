<?php $__env->startSection('content'); ?>
<?php echo $__env->make('Post::Classes/PHPExcel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-wrapper">
	
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nhập bảng excel giá sản phẩm
		</h1>
		- Bước 1: Copy danh sách ID và giá hiện tại <a href="<?php echo e(asset('admin/post/san-pham/product_list')); ?>" target="_blank">tại đây</a> <br>
		- Bước 2: nhập file excel (để hệ thống đọc và kiểm tra file) => Chọn file và bấm "Nhập dữ liệu". <br>
		- Bước 3: Lưu file excel => bấm "Nhập dữ liệu".<br>
    </section>
    <?php echo $__env->make('V_backend/alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Main content -->
    <section class="content">
			
			<?php
			
					if(isset($_GET["file"])){
						
						//Nhúng file PHPExcel
						// require_once 'Post::Classes/PHPExcel.php';
						//Đường dẫn file
						$file = public_path('source/price/'.$_GET["file"]);

						//Tiến hành xác thực file
						$objFile = PHPExcel_IOFactory::identify($file);
						$objData = PHPExcel_IOFactory::createReader($objFile);

						//Chỉ đọc dữ liệu
						$objData->setReadDataOnly(true);

						// Load dữ liệu sang dạng đối tượng
						$objPHPExcel = $objData->load($file);

						//Lấy ra số trang sử dụng phương thức getSheetCount();
						// Lấy Ra tên trang sử dụng getSheetNames();

						//Chọn trang cần truy xuất
						$sheet  = $objPHPExcel->setActiveSheetIndex(0);

						//Lấy ra số dòng cuối cùng
						$Totalrow = $sheet->getHighestRow();
						//Lấy ra tên cột cuối cùng
						$LastColumn = $sheet->getHighestColumn();

						//Chuyển đổi tên cột đó về vị trí thứ, VD: C là 3,D là 4
						$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);

						//Tạo mảng chứa dữ liệu
						$data = [];

						//Tiến hành lặp qua từng ô dữ liệu
						//----Lặp dòng, Vì dòng đầu là tiêu đề cột nên chúng ta sẽ lặp giá trị từ dòng 2
						for ($i = 2; $i <= $Totalrow; $i++)
						{
							//----Lặp cột
							for ($j = 0; $j < $TotalCol; $j++)
							{
								// Tiến hành lấy giá trị của từng ô đổ vào mảng
								$data[$i-2][$j]=$sheet->getCellByColumnAndRow($j, $i)->getValue();;
							}
						}
					}
							
			?>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<div class="form-group">
					<input type="file" name="file">
					<input type="hidden" name="data" value="<?php if(isset($_GET["file"])): ?> <?php echo e(json_encode($data)); ?> <?php endif; ?>">
				</div>
				 <button class="btn btn-primary btn-sm">Nhập dữ liệu</button>
				<?php if(isset($_GET["file"])): ?>
					<table class="table table-hover table-striped">
						<tr>
							<th>ID</th>
							<th>Giá</th>
						</tr>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post_a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($post_a[0]); ?></td>
								<td><?php echo e($post_a[1]); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>
				<?php endif; ?>
				
			</form>
	</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('V_backend.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Post/Views/post_import.blade.php ENDPATH**/ ?>