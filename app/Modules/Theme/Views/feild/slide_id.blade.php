<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn slide <a target="_blank" href="{{asset('admin/slide')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="slide_id">
          <option value="0">Trống</option>
          @foreach($slide_list as $slide)
             <option value="{{$slide -> id}}" @if($row->slide_id == $slide->id) selected @endif>{{$slide -> name}}</option>   
          @endforeach
       </select>
 </div>