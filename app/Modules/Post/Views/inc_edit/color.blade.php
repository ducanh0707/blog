<div class="col-md-4">
    <label class="font-weight-bold"><i class="fas fa-palette"></i> Màu sắc</label>
    <select name="color" id="" class="form-control">
        <option value="">Trống</option>
        <option value="black" @if($post->color == 'black') selected @endif>Đen</option>
        <option value="white" @if($post->color == 'white') selected @endif>Trắng</option>
        <option value="red" @if($post->color == 'red') selected @endif>Đỏ</option>
        <option value="pink" @if($post->color == 'pink') selected @endif>Hồng</option>
        <option value="yellow" @if($post->color == 'yellow') selected @endif>Vàng</option>
        <option value="green" @if($post->color == 'green') selected @endif>Xanh lá cây</option>
        <option value="blue" @if($post->color == 'blue') selected @endif>Xanh dương</option>
        <option value="purle" @if($post->color == 'purle') selected @endif>Tím</option>
        <option value="brown" @if($post->color == 'brown') selected @endif>Nâu</option>
        <option value="orange" @if($post->color == 'orange') selected @endif>Cam</option>
    </select>
</div>