@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">

    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title mb-3">Cài đặt mail</h3>
               <br>
               <a class="btn btn-sm btn-primary" href="{{asset('admin/order')}}">Quay lại</a>
               <a class="btn btn-sm btn-danger" href="{{asset('admin/order/resetMail')}}">Reset tất cả mail</a>
            </div>
          
            <div class="box-body">
                <form action="{{asset('admin/order/mailConfig')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="font-weight-bold">Bật/ tắt gửi mail</label>
                            <select name="mailSendStatus" class="form-control">
                                <option value="on" @if($mailSendStatus->value == 'on') selected @endif>Bật</option>
                                <option value="off" @if($mailSendStatus->value == 'off') selected @endif>Tắt</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Địa chỉ email</label>
                            <input name="mailAddress" class="form-control" value="{{$mailAddress->value}}">
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Mật khẩu email</label>
                            <input name="mailPass" class="form-control" value="{{$mailPass->value}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tiêu đề</label>
                        <input name="mailTitle" class="form-control" value="{{$mailTitle->value}}">
                        
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nội dung mail</label>
                        <textarea name="mailContent" class="form-control" id="mailContent">{{$mailConfig->value}}</textarea>
                        {{F_tinymce('mailContent')}}
                    </div>
                   
                    <div class="form-group">
                        <button class="btn btn-primary">Gửi</button>
                    </div>
               </form>
            </div>
          
          </div>
  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection