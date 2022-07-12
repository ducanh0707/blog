@extends('V_backend.index')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#gift_code_new">Thêm mới</button>

        <form action="{{asset('admin/gift_code/new')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal fade" id="gift_code_new" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới mã giảm giá</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <div class="form-group">
                                <label>Tên</label>
                                    {{F_input_basic('text','','name','','form-control','required','')}}
                            </div>
                            <div class="form-group">
                                <label>Mã giảm giá</label>
                                {{F_input_basic('text','','code','','form-control','required','')}}
                            </div>
                            <div class="form-group">
                                <label>Thời hạn</label>
                                <input type="text" class="form-control" id="deadline" name="deadline" value="" autocomplete="off">
                                <script>
                                    $('#deadline').datepicker({
                                        autoclose: true,
                                        format: 'd-m-yyyy'
                                    })
                                </script>
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select name="type" id="gift_type" class="form-control">
                                    <option value="price">Giảm theo mệnh giá</option>
                                    <option value="percent">Giảm theo phần trăm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Số lần</label>
                                <select name="one_time" class="form-control">
                                    <option value="">Nhiều lần</option>
                                    <option value="on">1 Lần</option>
                                </select>
                            </div>
                            <div class="form-group" id="menhgia">
                                <label>Mệnh giá giảm (ví dụ: 100000)</label>
                                {{F_input_basic('number','','price','','form-control','','')}}
                            </div>
    
                            <div class="form-group" id="percent" style="display:none">
                                <label>Phân trăm giảm (ví dụ: 50)</label>
                                {{F_input_basic('number','','percent','','form-control','min="1" max="100"','')}}
                            </div>
                            <script>
                                $('#gift_type').change(function(){
                                    var gift_type = $('#gift_type').val();
                                    if(gift_type == 'price'){
                                        $('#menhgia').css('display','unset');
                                        $('#percent').css('display','none');
                                    }else if(gift_type == 'percent'){
                                        $('#percent').css('display','unset');
                                        $('#menhgia').css('display','none');
                                    }
                                });
                            </script>
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
                        <h3 class="box-title">Danh sách mã giảm giá</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>TT</th>
                                <th>Tên</th>
                                <th>Mã giảm</th>
                                <th class="text-center">Thể loại</th>
                                <th class="text-center">Thời hạn</th>
                                <th class="text-center">Số lần</th>
                                <th class="text-center">id</th>
                                <th class="text-center"></th>
                            </tr>
                            @if(count($gift_code) != 0)
                            @foreach($gift_code as $key => $val)
                            <tr>
                                <td class="">{{$key+1}}</td>
                                <!-- cot tieu de -->
                                <td class="">
                                    @if($val -> one_time == 'on')
                                        <a href="{{asset('admin/gift_code/list/'.$val->id)}}">
                                            {{$val->name}}
                                        </a>
                                    @else 
                                        {{$val->name}}
                                    @endif
                                </td>
                                <td class="">
                                    {{$val->code}}
                                </td>
                                <!-- gia -->
                                <td class="text-center">
                                    @if($val->type == 'price') Mệnh giá : {{$val->price}} đ @elseif($val->type == 'percent') Phần trăm : {{$val->percent}} % @endif
                                </td>
                                <td class="text-center">@if($val->deadline != ''){{ date_format(date_create($val->deadline),'d-m-Y') }} @endif</td>
                                <td class="text-center">
                                    @if($val -> one_time == 'on')
                                        1 lần
                                    @else
                                        Nhiều lần
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
                                                    <b>Thông tin xóa: </b> {{$val -> name}}
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
                                    <!-- sua  -->
                                    <a href="" data-toggle="modal" data-target="#call_edit_{{$val -> id}}">
                                        <i class="fa fa-edit text-primary"></i>
                                    </a>
                                    <div class="modal fade" id="call_edit_{{$val -> id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalCenterTitle"><i
                                                            class="text-danger fa fa-edit"></i> Sửa mã giảm giá</h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <form action="{{asset('admin/gift_code/edit/'.$val->id)}}" method="POST"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <div class="form-group">
                                                            <label>Tên</label>
                                                                {{F_input_basic('text',$val->name,'name','','form-control','required','')}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mã giảm giá</label>
                                                            {{F_input_basic('text',$val->code,'code','','form-control','required','')}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Loại</label>
                                                            <select name="type" id="gift_type_{{$val->id}}" class="form-control">
                                                                <option value="price" @if($val->type == 'price') selected @endif>Giảm theo mệnh giá</option>
                                                                <option value="percent" @if($val->type == 'percent') selected @endif>Giảm theo phần trăm</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Số lần</label>
                                                            <select name="one_time" class="form-control">
                                                                <option value="" @if($val->one_time != 'on') selected @endif>Nhiều lần</option>
                                                                <option value="on" @if($val->one_time == 'on') selected @endif>1 Lần</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Thời hạn</label>
                                                            <input type="text" class="form-control" id="deadline_{{$val->id}}" name="deadline" value="@if($val->deadline != ''){{ date_format(date_create($val->deadline),'d-m-Y') }} @endif" autocomplete="off">
                                                            <script>
                                                                $('#deadline_{{$val->id}}').datepicker({
                                                                    autoclose: true,
                                                                    format: 'd-m-yyyy'
                                                                })
                                                            </script>
                                                        </div>

                                                        <div class="form-group" id="menhgia_{{$val->id}}" style="@if($val->type == 'percent') display:none @endif">
                                                            <label>Mệnh giá giảm (ví dụ: 100000)</label>
                                                            {{F_input_basic('number',$val->price,'price','','form-control','','')}}
                                                        </div>
                                
                                                        <div class="form-group" id="percent_{{$val->id}}" style="@if($val->type == 'price') display:none @endif">
                                                            <label>Phân trăm giảm (ví dụ: 50)</label>
                                                            {{F_input_basic('number',$val->percent,'percent','','form-control','min="1" max="100"','')}}
                                                        </div>
                                                        <script>
                                                            $('#gift_type_{{$val->id}}').change(function(){
                                                                var gift_type = $('#gift_type_{{$val->id}}').val();
                                                                if(gift_type == 'price'){
                                                                    $('#menhgia_{{$val->id}}').css('display','unset');
                                                                    $('#percent_{{$val->id}}').css('display','none');
                                                                }else if(gift_type == 'percent'){
                                                                    $('#percent_{{$val->id}}').css('display','unset');
                                                                    $('#menhgia_{{$val->id}}').css('display','none');
                                                                }
                                                            });
                                                        </script>
                                                        <div class="modal-footer">
                                                            <a href="{{asset('admin/gift_code/del/'.$val->id)}}"
                                                                class="btn btn-sm btn-warning"> Xóa</a>
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Đóng</button>
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary">Lưu</button>
                                                        </div>
                                                    </form>
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
                        {{$gift_code->appends(request()->input()) ->links()}}
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
