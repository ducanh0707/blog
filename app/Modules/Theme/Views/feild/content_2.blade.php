<div class="form-group">
    <label class="font-weight-bold"> Nội dung 2</label>
    <textarea class="form-control" id="edit_content_2" name="content_2">{{$row->content_2}}</textarea>
    {{ F_tinymce('edit_content_2')}}
 </div>

 <div class="form-group">
    <label class="font-weight-bold"> Nội dung 2 tiếng anh</label>
    <textarea class="form-control" id="edit_content_2_en" name="content_2_en">{{$row->content_2_en}}</textarea>
    {{ F_tinymce('edit_content_2_en')}}
 </div>
