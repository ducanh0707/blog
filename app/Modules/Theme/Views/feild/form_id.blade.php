<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn form đăng ký <a target="_blank" href="{{asset('admin/form')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
    <select class="form-control" name="form_id">
       <option value="0">Trống</option>
       @foreach($form_list as $form_edit)
          <option value="{{$form_edit -> id}}" @if($form_edit->id == $row->form_id ) selected @endif>{{$form_edit -> name}}</option>   
       @endforeach
    </select>
</div>