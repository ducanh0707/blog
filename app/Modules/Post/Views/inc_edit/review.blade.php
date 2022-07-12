<div class="col-md-4">
    <label class="font-weight-bold"><i class="fas fa-star"></i> Đánh giá</label>
    <select name="review" id="" class="form-control">
        <option value="">Trống</option>
        <option value="1" @if($post->review == '1') selected @endif>1 sao</option>
        <option value="2" @if($post->review == '2') selected @endif>2 sao</option>
        <option value="3" @if($post->review == '3') selected @endif>3 sao</option>
        <option value="4" @if($post->review == '4') selected @endif>4 sao</option>
        <option value="5" @if($post->review == '5') selected @endif>5 sao</option>
    </select>
</div>