<div class="form-group">
    <label> Màu nền</label>
    <select class="form-control" name="bg">
        <option value="" @if($row->bg == '') selected @endif>Trống</option>
        <option value="bg_color" @if($row->bg == 'bg_color') selected @endif>Màu nền 1 màu</option>
        <option value="bg_gradient" @if($row->bg == 'bg_gradient') selected @endif>Màu nền chuyển 2 màu</option>
        <option value="bg_img" @if($row->bg == 'bg_img') selected @endif>Hình ảnh nền</option>
        <option value="bg_color bg_img_2" @if($row->bg == 'bg_color bg_img_2') selected @endif>Màu và hình họa tiết</option>
        <option value="bg_img_2 bg_img_2_left_top" @if($row->bg == 'bg_img_2 bg_img_2_left_top') selected @endif>Hình họa tiết (Bên trái góc trên)</option>
        <option value="bg_img_2 bg_img_2_left_bottom" @if($row->bg == 'bg_img_2 bg_img_2_left_bottom') selected @endif>Hình họa tiết (Bên trái góc dưới)</option>
        <option value="bg_img_2 bg_img_2_right_top" @if($row->bg == 'bg_img_2 bg_img_2_right_top') selected @endif>Hình họa tiết (Bên phải góc trên)</option>
        <option value="bg_img_2 bg_img_2_right_bottom" @if($row->bg == 'bg_img_2 bg_img_2_right_bottom') selected @endif>Hình họa tiết (Bên phải góc dưới)</option>
        <option value="bg_img_2 bg_img_2_center_top" @if($row->bg == 'bg_img_2 bg_img_2_center_top') selected @endif>Hình họa tiết (Ở giữa bên trên)</option>
        <option value="bg_img_2 bg_img_2_center_bottom" @if($row->bg == 'bg_img_2 bg_img_2_center_bottom') selected @endif>Hình họa tiết (Ở giữa bên dưới)</option>
    </select>
</div>