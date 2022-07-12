@extends('V_backend.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
         <a class="btn btn-sm btn-primary" href="{{ asset('admin/post/san-pham/import')}}">Quay lại</a>
            Danh sách sản phẩm
        </h1>
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
        <table class="table table-hover">
            <tr>
                


                <th class="text-center">ID</th>
                <th class="text-center">Giá</th>
                <th>Tên</th>
                <th></th>
            </tr>
            @if(count($product_list) != 0)
            @foreach($product_list as $key => $val)
            <tr>
               <td class="text-center">{{$val-> id}}</td>
               <td> {{$val->price}} </td>
                <td class="">
                    <div class="admin-list-post">
                        <div class="admin-list-post-title">
                            <a target="_blank" href="{{ asset('admin/post/san-pham/edit/'.$val->id)}}">
                                <b class="text-dark">{{$val->title}}</b>
                            </a>
                        </div>

                    </div>
                </td>

            </tr>
            @endforeach
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
