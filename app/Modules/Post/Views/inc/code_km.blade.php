<div class="col-md-4">
    <label class="font-weight-bold"><i class="fas fa-qrcode"></i> Mã giảm giá</label>
    <select name="code_km" id="" class="form-control">
        <option value="">Trống</option>
        @foreach ($gift_code as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>