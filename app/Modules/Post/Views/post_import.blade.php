@extends('V_backend.index')
@section('content')
@include('Post::Classes/PHPExcel')
<div class="content-wrapper">
	{{-- tai file id  --}}
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Nhập bảng excel giá sản phẩm
		</h1>
		- Bước 1: Copy danh sách ID và giá hiện tại <a href="{{asset('admin/post/san-pham/product_list')}}" target="_blank">tại đây</a> <br>
		- Bước 2: nhập file excel (để hệ thống đọc và kiểm tra file) => Chọn file và bấm "Nhập dữ liệu". <br>
		- Bước 3: Lưu file excel => bấm "Nhập dữ liệu".<br>
    </section>
    @include('V_backend/alert')
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
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<input type="file" name="file">
					<input type="hidden" name="data" value="@if(isset($_GET["file"])) {{json_encode($data)}} @endif">
				</div>
				 <button class="btn btn-primary btn-sm">Nhập dữ liệu</button>
				@if(isset($_GET["file"]))
					<table class="table table-hover table-striped">
						<tr>
							<th>ID</th>
							<th>Giá</th>
						</tr>
						@foreach($data as $post_a)
							<tr>
								<td>{{$post_a[0]}}</td>
								<td>{{$post_a[1]}}</td>
							</tr>
						@endforeach
					</table>
				@endif
				
			</form>
	</section>
</div>
@endsection
