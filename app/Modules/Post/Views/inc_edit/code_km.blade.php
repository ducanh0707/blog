<div class="col-md-4">
    <label class="font-weight-bold"><i class="fas fa-qrcode"></i> Mã giảm giá</label> {{$post->code_km }}
    <select name="code_km" id="" class="form-control">
        <option value="">Trống</option>
        @foreach ($gift_code as $item)
            <option value="{{$item->id}}" @if($post->code_km == $item->id) selected @endif>{{$item->name}}</option>
        @endforeach
    </select>
</div>