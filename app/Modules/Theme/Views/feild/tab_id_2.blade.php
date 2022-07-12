<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn tab <a target="_blank" href="{{asset('admin/tab')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="tab_id_2">
          <option value="0">Trống</option>
          @foreach($tab_list as $tab_r_2)
             <option value="{{$tab_r_2 -> id}}" @if($row->tab_id == $tab_r_2 -> id) selected @endif>{{$tab_r_2 -> name}}</option>   
          @endforeach
       </select>
</div>