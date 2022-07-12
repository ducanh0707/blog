<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn form đăng ký <a target="_blank" href="{{asset('admin/form')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
    <select class="form-control" name="form_id_2">
       <option value="0">Trống</option>
       @foreach($form_list_2 as $form_edit_2)
          <option value="{{$form_edit_2 -> id}}" @if($form_edit_2->id == $row->form_id ) selected @endif>{{$form_edit_2 -> name}}</option>   
       @endforeach
    </select>
</div>