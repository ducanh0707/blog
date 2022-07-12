<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn menu <a target="_blank" href="{{asset('admin/menu/0')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="menu_id">
          <option value="0">Trống</option>
          @foreach($menu_list as $menu_r)
             <option value="{{$menu_r -> id}}" @if($menu_r->id == $row->menu_id ) selected @endif>{{$menu_r -> name}}</option>   
          @endforeach
       </select>
</div>