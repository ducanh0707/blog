<div class="form-group">
    <label><i class="fa fa-columns"></i> Chọn slide <a target="_blank" href="{{asset('admin/slide')}}"><i class="fa fa-chevron-circle-right"></i></a></label>
       <select class="form-control" name="slide_id_2">
          <option value="0">Trống</option>
          @foreach($slide_list as $slide_2)
             <option value="{{$slide_2 -> id}}" @if($row->slide_id == $slide_2->id) selected @endif>{{$slide_2 -> name}}</option>   
          @endforeach
       </select>
 </div>