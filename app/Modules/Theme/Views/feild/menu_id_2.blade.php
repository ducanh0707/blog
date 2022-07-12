<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn menu 2 <a target="_blank" href="{{asset('admin/menu/0')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="menu_id_2">
          <option value="0">Trống</option>
          @foreach($menu_list as $menu_r_2)
             <option value="{{$menu_r_2 -> id}}" @if($menu_r_2->id == $row->menu_id_2 ) selected @endif>{{$menu_r_2 -> name}}</option>   
          @endforeach
       </select>
</div>