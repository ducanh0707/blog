<div class="form-group">
    <label>Cột 1</label>
    <select class="form-control form-control-sm" id="" name="col_1">
        <option value="">Trống</option>
        <option value="col-md-12" @if($row->col_1 == 'col-md-12') selected @endif>12/12 phần</option>
        <option value="col-md-11" @if($row->col_1 == 'col-md-11') selected @endif>11/12 phần </option>
        <option value="col-md-10" @if($row->col_1 == 'col-md-10') selected @endif>10/12 phần </option>
        <option value="col-md-9" @if($row->col_1 == 'col-md-9') selected @endif>9/12 phần </option>
        <option value="col-md-8" @if($row->col_1 == 'col-md-8') selected @endif>8/12 phần </option>
        <option value="col-md-7" @if($row->col_1 == 'col-md-7') selected @endif>7/12 phần </option>
        <option value="col-md-6" @if($row->col_1 == 'col-md-6') selected @endif>6/12 phần </option>
        <option value="col-md-5" @if($row->col_1 == 'col-md-5') selected @endif>5/12 phần </option>
        <option value="col-md-4" @if($row->col_1 == 'col-md-4') selected @endif>4/12 phần</option>
        <option value="col-md-3" @if($row->col_1 == 'col-md-3') selected @endif>3/12 phần</option>
        <option value="col-md-2" @if($row->col_1 == 'col-md-2') selected @endif>2/12 phần</option>
        <option value="col-md-1" @if($row->col_1 == 'col-md-1') selected @endif>1/12 phần</option>
    </select>
</div>