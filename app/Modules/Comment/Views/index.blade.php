@extends('V_backend.index')
@section('content')
<div class="content-wrapper">
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Bình luận </h3>
                        <div class="box-tools">
                            
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <form action="{{asset('admin/comment/action')}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <table class="table table-hover">
                                <tr>
                                    <th scope="col" width="1%"><input type="checkbox" value="" onClick="toggle(this)"></th>
                                    <th>Ảnh</th>
                                    <th>Thông tin</th>
                                    <th>Nội dung</th>
                                    <th class="text-center">Ngày</th>
                                    <th class="text-center"></th>
                                    <th class="text-center">ID</th>
                                </tr>
                                @if(count($comment_list) != 0)
                                @foreach($comment_list as $key => $val)
                                <tr>
                                    <td><input type="checkbox" value="{{$val->id}}" name="check[]"></td>
                                    <!-- cot anh dai dien -->
                                    <td class="">
                                        @if($val->img)
                                        <img width="30px" src="{{asset('/source/comment/'.$val->img)}}" />
                                        @else
                                        <img width="30px" src="{{asset('upload/theme/noimg.jpg')}}" />
                                        @endif
                                    </td>
                                    <td>
                                        <b>Họ tên:</b> {{$val->name}} <br>
                                        <b>Email:</b> {{$val->email}} <br>
                                        <b>Điện thoại:</b> {{$val->tel}} <br>
                                        @if($val->review == 1)
                                            <i class="fas fa-star text-warning"></i><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> 
                                        @elseif($val->review == 2)
                                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                        @elseif($val->review == 3)
                                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                                        @elseif($val->review == 4)
                                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star"></i>
                                        @elseif($val->review == 5)
                                            <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i> <i class="fas fa-star text-warning"></i>
                                        @endif
                                    </td>
                                    <!-- cot tieu de -->
                                    <td class="">
                                        {{$val->content}}
                                    </td>
                                    <!-- cot ngay dang  -->
                                    <td class="text-center">
                                        <?php 
                                        $date = date_create($val -> created_at);
                                        echo date_format($date,'d/m/Y').'<br />';
                                        echo date_format($date,'H:i:s');
                                    ?>
                                    </td>
                                    <td class="text-center">
                                        <!-- cot  trang thai  -->
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
                                                        <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> Bạn có chắc chắn muốn xóa?</h5>
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
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                                        <a href="<?php echo url()->current().'/del/'.$val->id; ?>" role="button" class="btn btn-danger">Ok Xóa</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- sua  --}}
                                        <a href="" data-toggle="modal" data-target="#call_edit" id="edit_comment_{{$val->id}}">
                                            <i class="fa fa-edit text-primary"></i>
                                        </a>    
                                        <script>
                                            $('#edit_comment_{{$val->id}}').click(function(){
                                                $('#c_name').val('{{$val->name}}');
                                                $('#c_tel').val('{{$val->tel}}');
                                                $('#c_email').val('{{$val->email}}');
                                                $('#c_content').val('{{$val->content}}');
                                                $('#c_review').val('{{$val->review}}');
                                                var img = '{{$val->img}}';
                                                if(img != ''){
                                                    $('#img-previewedit_comment').attr('src','{{asset("source/comment/".$val->img)}}');
                                                    $('#img-currentedit_comment').css('display','unset');
                                                    $('#button-del-edit_comment').css('display','unset');
                                                }
                                                $('#c_form').attr('action','{{asset("admin/comment/edit/".$val->id)}}');
                                            });
                                        </script>
                                        {{-- xem  --}}
                                        <a target="_blank" href="{{asset($val->f_post-> f_cat -> first()->url.'/'.$val->f_post->url.'.html')}}">Xem</a>
                                    </td>
                                    <td class="text-center">{{$val-> id}}</td>
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
                            <!-- nut submit -->
                            <button type="submit" class="btn btn-sm btn-light" name="action" value="del">
                                Xóa lựa chọn
                            </button>
                            <button type="submit" class="btn btn-sm btn-light" name="action" value="status">
                                Thay đổi trạng thái
                            </button>
                        </form>
                    </div>
                    {{-- popup sua  --}}
                    <div class="modal fade" id="call_edit" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form action="" method="POST" enctype="multipart/form-data" id="c_form">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><i class="fa fa-edit text-primary"></i> Sửa bình luận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <div class="form-group row">
                                            <div class="col-md-6 mt-2">
                                                <label>Họ tên</label>
                                                <input class="form-control" type="text" name="name" id="c_name">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="email" id="c_email">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label>Điện thoại</label>
                                                <input class="form-control" type="text" name="tel" id="c_tel">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label>Đánh giá</label>
                                                <select name="review" class="form-control" id="c_review">
                                                    <option value="1">1 sao</option>
                                                    <option value="2">2 sao</option>
                                                    <option value="3">3 sao</option>
                                                    <option value="4">4 sao</option>
                                                    <option value="5">5 sao</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <label>Nội dung</label>
                                                <textarea class="form-control" name="content" id="c_content"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <label>Hình ảnh</label><br>
                                                    <?php F_input_image('','img','edit_comment','') ?>
                                                </div> 
                                             </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-primary">Sửa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{$comment_list->appends(request()->input()) ->links()}}
                    </div>
                    <script language="JavaScript">
                        function toggle(source) {
                            checkboxes = document.getElementsByName('check[]');
                            for (var i = 0, n = checkboxes.length; i < n; i++) {
                                checkboxes[i].checked = source.checked;
                            }
                        }

                    </script>
                </div>

                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
