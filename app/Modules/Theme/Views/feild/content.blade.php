<div class="form-group">
    <label class="font-weight-bold"> Nội dung</label>
    <textarea class="form-control" id="edit_content" name="content">{{$row->content}}</textarea>
    {{ F_tinymce('edit_content')}}
 </div>

 <div class="form-group">
    <label class="font-weight-bold"> Nội dung tiếng anh</label>
    <textarea class="form-control" id="edit_content_en" name="content_en">{{$row->content_en}}</textarea>
    {{ F_tinymce('edit_content_en')}}
 </div>
