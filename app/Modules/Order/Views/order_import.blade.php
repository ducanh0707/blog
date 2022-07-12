@extends('V_backend.index')
@section('content')
@include('Order::Classes/PHPExcel')
<div class="content-wrapper">
	{{-- tai file id  --}}
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a class="btn btn-sm btn-primary" href="{{ asset('admin/order')}}">Quay lại</a> Nhập bảng excel liên hệ
		</h1>
		- Bước 1: Xem mẫu <a href="{{asset('source/order/website_data_20220402.xls')}}" target="_blank">tại đây</a> <br>
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
						$file = public_path('source/order/'.$_GET["file"]);

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
			<form action="{{asset('admin/order/import')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<input type="file" name="file">
					<input type="hidden" name="data" value="@if(isset($_GET["file"])) {{json_encode($data)}} @endif">
				</div>
				 <button class="btn btn-primary btn-sm" type="submit">Nhập dữ liệu</button>
				@if(isset($_GET["file"]))
					<table class="table table-hover table-striped">
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
						@foreach($data as $post_a)
							<tr>
								<td>{{$post_a[1]}}</td>
								<td>{{$post_a[2]}}</td>
								<td>{{$post_a[3]}}</td>
								<td>{{$post_a[4]}}</td>
								<td>{{$post_a[5]}}</td>
								<td>{{$post_a[6]}}</td>
								<td>{{$post_a[7]}}</td>
								<td>{{$post_a[8]}}</td>
								<td>{{$post_a[9]}}</td>
								<td>{{$post_a[10]}}</td>
								<td>{{$post_a[11]}}</td>
								<td>{{$post_a[12]}}</td>
								<td>{{$post_a[13]}}</td>
								<td>{{$post_a[14]}}</td>
								<td>{{$post_a[15]}}</td>

							</tr>
						@endforeach
					</table>
				@endif
				
			</form>
	</section>
</div>
@endsection
