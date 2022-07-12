<form action="{{asset('form/regis')}}" method="post">
    @csrf
    <input type="hidden" name="link" value="{{url()->current()}}">
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <div class="order text-left">
        <div class="row">
            <div class="col-md-12">
                <h3>{{trans('messages.Liên hệ')}}</h3>
            </div>
        </div>
        <div class="row my-1 ">
            <div class="col-md-3">
                <div class="order_item font-weight-bold">
                    {{trans('messages.Họ tên')}}
                </div>
            </div>
            <div class="col-md-9">
                <div class="order_input">
                    <input type="text" name="email" class="form-control form-control-sm" required>
                </div>
            </div>
        </div>
        {{-- email --}}
        <div class="row my-1">
            <div class="col-md-3">
                <div class="order_item font-weight-bold">
                    {{trans('messages.Email')}}
                </div>
            </div>
            <div class="col-md-9">
                <div class="order_input">
                    <input type="text" name="name" class="form-control form-control-sm" required>
                </div>
            </div>
         
        </div>
        {{-- tel  --}}
        <div class="row my-1">
            <div class="col-md-3">
                <div class="order_item font-weight-bold">
                    {{trans('messages.Điện thoại')}}
                </div>
            </div>
            <div class="col-md-9">
                <div class="order_input">
                    <input type="text" name="tel" class="form-control form-control-sm" required>
                </div>
            </div>
         
        </div>
        
     
        {{-- Other Request --}}
        <div class="row my-1">
            <div class="col-md-3">
                <div class="order_item font-weight-bold">
                    {{trans('messages.Nội dung')}}
                </div>
            </div>

            <div class="col-md-9">
                <div class="order_input">
                    <textarea class="form-control form-control-sm" name="content"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Gửi</button>
            </div>
        </div>
    </div>
</form>