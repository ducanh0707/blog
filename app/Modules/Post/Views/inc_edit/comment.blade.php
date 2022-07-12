<div class="col-md-4">
    <label class="font-weight-bold"><i class="fas fa-comments"></i> Bình luận</label>
    <select name="comment" id="" class="form-control">
        <option value="on" @if($post->comment == 'on') selected @endif>Bật</option>
        <option value="off" @if($post->comment == 'off') selected @endif>Tắt</option>
    </select>
</div>