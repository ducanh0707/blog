@extends('V_backend.index')
@section('content')
<div class="content-wrapper" style="background-color: #ecf0f5;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{asset('admin/dashboard')}}" class="btn btn-primary btn-sm">Quay lại</a>

        <h3>Sửa trang chủ</h3>
        @include('V_backend/alert')
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-2">
                <ul class="list-group" id="sortable">
                    @if(count($row_list) > 0)
                    @foreach($row_list as $val)
                    <li id="item_{{$val->id}}" class="ui-state-default list-group-item d-flex justify-content-between align-items-center @if($val -> id == $row_id) {{'list-group-item-primary'}} @endif">
                        <a class="@if($val -> status != 'on') text-danger @endif"
                            href="{{asset('admin/theme/row/'.$val->id)}}">
                            {{$val->name}}
                        </a>
                    </li>
                    @endforeach
                    @endif
                </ul>
                <button class="btn btn-primary btn-sm mt-2" href="#" data-toggle="modal" data-target="#new_row_custome">
                    <i class="fa fa-plus text-sm"></i> Thêm hàng
                </button>

                @include('Theme::inc_menu')
                @include('Theme::inc/row_custome_new')
                <script>
                    $(function () {
                        $("#sortable").sortable({
                            update: function (event, ui) {
                                var data = $(this).sortable('serialize');
                                var token = '{{ csrf_token() }}';
                                // ajax 
                                $.ajax({
                                    type: "POST",
                                    url: '{{asset('')}}admin/theme/row_order',
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
            @if(isset($row->name))
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="box-title">
                            {{$row->name}}
                            <!-- status -->
                            <a href="{{asset('admin/theme/row/status/'.$row_id)}}">
                                <i
                                    class="fa fa-chevron-circle-down @if($row->status == 'on') {{'text-success'}} @else {{'text-danger'}} @endif"></i>
                            </a>
                            <!-- xoa widget -->
                            <a href="#" data-toggle="modal" data-target="#del_row">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                            <div class="modal fade" id="del_row" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                                                    <i class="fa fa-caret-right"></i> Tên: {{$row -> name}}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                                <a href="{{asset('admin/theme/row/del/'.$row_id)}}"
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
                        <form method="post" action="{{asset('admin/theme/row/'.$row_id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('Theme::inc/row_custome_edit')
                            <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                            {{-- ket thuc noi dung  --}}
                        </form>

                    </div>
                </div>
            </div>
            @else
            Hàng không tồn tại
            @endif
            <!-- ket thuc danh sach  -->
        </div>

    </section>
</div>
@endsection
