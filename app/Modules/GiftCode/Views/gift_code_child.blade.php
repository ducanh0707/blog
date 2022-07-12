@extends('V_backend.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="{{asset('admin/gift_code')}}" class="btn btn-primary btn-sm">Quay lại</a>
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#gift_code_new">Thêm mới Mã</button>

        <form action="{{asset('admin/gift_code/list/'.$gift_code->id.'/new')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal fade" id="gift_code_new" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới mã</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                Mã chính: <b>{{$gift_code->code}}</b>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                    {{F_input_basic('number','1','count','','form-control','required','')}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </div>
                        </div> <!-- dong the modal -body -->
                    </div>
                </div>
            </div>
        </form>
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mã gốc: {{$gift_code->code}} | @if($gift_code->type == 'price') Mệnh giá : {{$gift_code->price}} đ @elseif($gift_code->type == 'percent') Phần trăm : {{$gift_code->percent}} % @endif | Thời hạn: @if($gift_code->deadline != ''){{ date_format(date_create($gift_code->deadline),'d-m-Y') }} @endif</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>TT</th>
                                <th>Mã giảm</th>
                                <th class="text-center">Sử dụng</th>
                                <th class="text-center">id</th>
                                <th class="text-center"></th>
                            </tr>
                            @if(count($gift_code_child) != 0)
                            @foreach($gift_code_child as $key => $val)
                            <tr>
                                <td class="">{{$key+1}}</td>
                                <td class="">
                                    {{$val->code}}
                                </td>
                                <td class="text-center">
                                    @if($val -> time != 0)
                                        Đã dùng
                                    @else
                                        Chưa dùng
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{$val -> id}}
                                </td>
                                <td class="text-center">
                                    <?php if($val->status == 'off'){ ?>
                                        <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                                            <i class="fa fa-exclamation-circle text-danger"></i>
                                        </a>
                                        <?php }elseif($val->status == 'on'){ ?>
                                        <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                                            <i class="fa fa-check-circle text-success"></i>
                                        </a>
                                    <?php } ?>
                                    <!-- xoa -->
                                    <a href="" data-toggle="modal" data-target="#call_del_{{$val -> id}}">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                    <div class="modal fade" id="call_del_{{$val -> id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> Bạn có
                                                        chắc chắn muốn xóa?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <!-- id thuoc tinh -->
                                                    <b>Thông tin xóa: </b> {{$val -> code}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal">Đóng</button>
                                                    <a href="<?php echo url()->current().'/del/'.$val->id; ?>" role="button"
                                                        class="btn btn-danger">Ok Xóa</a>
                                                </div>
                                            </div>
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
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{$gift_code_child->appends(request()->input()) ->links()}}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
