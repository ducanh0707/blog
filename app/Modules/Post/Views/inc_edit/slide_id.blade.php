<div class="col-md-12 py-3">
        <div>
            <label class="font-weight-bold"><i class="fas fa-images"></i> Slide</label> <br>
            <div class="slide_edit" id="sortable">
                @foreach($post->f_slide as $img_s)
                    <div class="slide_mod slide_mod_{{$img_s->id}} ui-state-default" id="item_{{$img_s->id}}" {{$img_s->orderby}}>
                        <img src="{{asset('source/post/'.$img_s->img)}}" height="50px">
                        <span class="cursor xoa_se" data-slideid="{{$img_s->id}}"><i class="fa fa-trash text-danger"></i></span>
                    </div>
                @endforeach

                <script>
                    //xoa anh
                    $('.xoa_se').click(function(){
                        var post_type = '{{$post_type->url}}';
                        var img_id = $(this).data('slideid');
                        $.get("{{asset('admin/post')}}/"+post_type+"/del_slide/"+img_id,function(data){
                            $('.slide_mod_'+img_id).remove();
                        });
                    });
                </script>
            </div>
            <script>
                $(function () {
                    $("#sortable").sortable({
                        update: function (event, ui) {
                            var data = $(this).sortable('serialize');
                            var token = '{{ csrf_token() }}';
                            var post_type = '{{$post_type->url}}';
                            // ajax 
                            $.ajax({
                                type: "POST",
                                url: '{{asset('')}}admin/post/'+post_type+'/slide_order',
                                dataType: "json",
                                data: {
                                    data: data,
                                    _token: token
                                },
                            });
                        }
                    });
                    $("#sortable").disableSelection();
                });

            </script>
            <div style="clear:both"></div>
            <label>Thêm nhiều ảnh bằng cách bôi đen</label> <br>
            <div class="slide_post gallery" style=""></div>
            <div class="input-group mb-2">
                <input type="file" multiple id="gallery-photo-add" name="slide[]" class="form-control pb-1">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span id="xoa" class="xoa_it" class="text-danger cursor" style="display:none"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
            
        </div>

        <div id="add_slide"> </div>
        <div class="text-right">
            <span href="#" class="btn btn-sm btn-primary cursor" id="add">Thêm</span>
        </div>

            <script>
                $('#xoa').click(function(){
                    $('#gallery-photo-add').val('');
                    $('.gallery').empty();
                    $('#xoa').css('display','none');
                });
                $(function() {
                    var imagesPreview = function(input, placeToInsertImagePreview) {
                        if (input.files) {
                            var filesAmount = input.files.length;
                            for (i = 0; i < filesAmount; i++) {
                                var reader = new FileReader();
                                reader.onload = function(event) {
                                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                }
                                reader.readAsDataURL(input.files[i]);
                            }
                        }
                    };
                    $('#gallery-photo-add').on('change', function() {
                        $('.gallery').empty();
                        $('#xoa').css('display','unset');
                        imagesPreview(this, 'div.gallery');
                    });
                });

                // them anh 
                $('#add').click(function(e){
                    e.preventDefault();
                    var count = $('.slide').length;
                    var key = count + 1;
                    $('#add_slide').append('<div class="input-group slide mb-2 slide_'+key+'"><input type="file"multiple id="gallery-photo-add"name="slide[]"class="form-control pb-1"><div class="input-group-prepend"><div class="input-group-text"><span data-row="slide_'+key+'" id="xoa"class="xoa_it text-danger cursor"><i class="fa fa-trash"></i></span></div></div></div>');
                });
                //xoa truong vua them
                $('#add_slide').on('click', '.xoa_it',function(e){
                    e.preventDefault();
                    var it = $(this).data('row');
                    $('.'+it).remove();
                });
               
            </script>
</div>
{{-- @include('Post::inc_edit/slide_id_2') --}}