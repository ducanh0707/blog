@extends('V_backend.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         <a class="btn btn-sm btn-primary" href="{{ asset('admin/order/import')}}">Quay lại</a>
          Mẫu liên hệ
        </h1>
    </section>
    @include('V_backend/alert')
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
            @if($order)
              
                <tr>

                    <td class="">
                        {{$order->name}}
                     </td>
                     <td class="">
                        {{$order->tel}}
                     </td>
                     <td class="">
                        {{$order->email}}
                     </td>
                     <td class="">
                        {{$order->cmt}}
                     </td>
                     <!-- ngay tham gia  -->
                     <td class="text-center">
                       {{$order->ngay_tham_gia}}
                     <td class="">
                        {{$order->so_hop_dong}}
                     </td>
                     <td class="">
                        {{$order->so_lo}}
                     </td>
                     <td class="">
                        {{$order->dien_tich}}
                     </td>
                     <td class="">
                        {{$order->nhom}}
                     </td>
                     <td class="">
                        {{$order->da_gop_von}}
                     </td>
                     <td class="">
                        {{$order->con_lai}}
                     </td>
                     <td class="">
                        {{$order->lich_su}}
                     </td>
                     <td class="">
                        {{$order->note}}
                     </td>
                     <td class="">
                        {{$order->address}}
                     </td>
                     <td class="">
                        {{$order->content}}
                     </td>

                </tr>
          
            @else
            <tr>
                <td colspan="9" class="text-center">
                    <h6>Không có bài viết đủ điều kiện lọc</h6>
                </td>
            </tr>
            @endif
        </table>
    </section>
    <!-- /.content -->
</div>

@endsection
