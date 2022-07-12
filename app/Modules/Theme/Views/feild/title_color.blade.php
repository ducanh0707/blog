<div class="form-group">
    <label> Màu tiêu đề và mô tả</label>
    <select class="form-control" name="title_color">
        <option value="">Mặc định</option>
        <option value="color_dark" @if($row->title_color == 'color_dark') selected @endif>Màu tối (màu 1)</option>
        <option value="color_gradient" @if($row->title_color == 'color_gradient') selected @endif>Màu chuyển 2 màu (màu 2)</option>
        <option value="color_light" @if($row->title_color == 'color_light') selected @endif>Màu sáng (màu 3)</option>
    </select>
</div>