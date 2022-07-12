<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn tab <a target="_blank" href="{{asset('admin/tab')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="tab_id">
          <option value="0">Trống</option>
          @foreach($tab_list as $tab_r)
             <option value="{{$tab_r -> id}}" @if($row->tab_id == $tab_r -> id) selected @endif>{{$tab_r -> name}}</option>   
          @endforeach
       </select>
</div>