<div class="form-group">
    <label>Ẩn/hiện trên thiết bị</label>
    <select class="form-control" name="display">
        <option value="">Hiển thị tất cả</option>
        <option value="d-none d-sm-block d-md-block d-lg-block d-xl-block" @if($row->display == 'd-none d-sm-block d-md-block d-lg-block d-xl-block') selected @endif>Ẩn trên điện thoại</option>
        <option value="d-none d-sm-none d-md-block d-lg-block d-xl-block" @if($row->display == 'd-none d-sm-none d-md-block d-lg-block d-xl-block') selected @endif>Ẩn trên điện thoại, máy tính bảng</option>
        <option value="d-sm-none d-md-none d-lg-none d-xl-none" @if($row->display == 'd-sm-none d-md-none d-lg-none d-xl-none') selected @endif>Ẩn trên máy tính, máy tính bảng</option>
        <option value="d-md-none d-lg-none d-xl-none" @if($row->display == 'd-md-none d-lg-none d-xl-none') selected @endif>Ẩn trên máy tính</option>
        <option value="d-none" @if($row->display == 'd-none') selected @endif>Ẩn tất cả</option>
    </select>
</div>