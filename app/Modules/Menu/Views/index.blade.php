@extends('V_backend.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách menu
        </h1>
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- danh sach widget -->
            <div class="col-md-3">
                <ul class="list-group">
                    @if(count($type_list) != 0)
                    @foreach($type_list as $val)
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center @if($val -> id == $type_id) {{'list-group-item-primary'}} @endif">
                        <a href="{{asset('admin/menu/'.$val -> id)}}">
                            {{$val -> name}}
                        </a>
                    </li>
                    @endforeach
                    @endif
                    <li class="text-center">
                        <a href="#" class="btn btn-primary btn-sm mt-2" data-toggle="modal"
                            data-target="#new_type_menu">Thêm mới vị trí menu</a>
                    </li>
                </ul>

                <!-- Modal them moi widget -->
                @include('Menu::IV_Modal_menu_type_new')
            </div>
            <!-- ket thuc danh sach widget -->
            <!-- danh sach widget -->
            <div class="col-md-9">
                <div class="box box-primary">
                    @if($type_id != 0)
                    <div class="box-header with-border">
                        <div class="box-title">
                            <button class="btn btn-sm btn-light" data-toggle="modal" data-target="#new_menu_custome">
                                Thêm menu
                            </button>

                        </div>
                        @include('Menu::IV_Modal_menu_new_custome')
                    </div>
                    <div class="box-body">
                        <div class="text-center">
                            <h5>
                                {{$type -> name}}
                                <!-- sua widget -->
                                <a href="#" data-toggle="modal" data-target="#edit_widget">
                                    <i class="fa fa-edit text-primary small"></i>
                                </a>
                                <!-- xoa widget -->
                                <a href="#" data-toggle="modal" data-target="#del_widget">
                                    <i class="fa fa-trash text-danger small"></i>
                                </a>
                                <!-- status -->
                                <a href="{{asset('admin/menu/type/status/'.$type->id)}}">
                                    <i
                                        class="fa fa-chevron-circle-down small @if($type->status == 'on') {{'text-success'}} @else {{'text-danger'}} @endif"></i>
                                </a>
                                @if($type-> def == 'on') <i class="fa fa-shield-alt text-primary"></i> @endif
                            </h5>
                            <!-- xoa wigdet  -->
                            <div>
                                <i>{{$type->des}}</i>
                            </div>
                        </div>
                        <!-- MOdel widget edit  -->
                        @include('Menu::IV_Modal_menu_type_edit')
                        <!-- xoa widget -->
                        @include('Menu::IV_Modal_menu_type_del')
                    </div>

                    {{-- menu sort  --}}
                    <div class="cf nestable-lists">
                        <div class="dd" id="nestable3">
                            <ol class="dd-list">
                                <?php F_menu_multi_level_ui($menu,$type_id,$row_list,$cat_list); ?>
                            </ol>
                        </div>
                    </div>

                    <script>
                        // sap sep thu tu 
                        $(document).ready(function () {
                            var updateOutput = function (e) {
                                var list = e.length ? e : $(e.target),
                                    output = list.data('output');
                                var token = '{{ csrf_token() }}';
                                var type_id = '{{$type -> id}}';
                                $.ajax({
                                    method: "POST",
                                    url: '{{asset('')}}admin/menu/' + type_id + '/edit_ajax',
                                    data: {
                                        list: list.nestable('serialize'),
                                        _token: token
                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    alert("Unable to save new list order: " + errorThrown);
                                });
                            };

                            $('.dd').nestable({
                                group: 1,
                                maxDepth: 7,
                            }).on('change', updateOutput);
                        });

                    </script>

                </div>
                @else
                Bạn menu trống
                @endif
            </div>
        </div>
        <!-- ket thuc danh sach  -->
</div>

</section>
</div>
@endsection
