<div class="col-md-12">
    <hr>
    <div class="form-group">
        <label><i class="fab fa-youtube"></i> Link Video Youtube thực tế<a target="_blank" href="https://youtube.com"> video youtube</a></label>
        <input type="text" class="form-control" name="video_2"  maxlength="1000" value="<?php echo $post->video_2 ?>">
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                if($post->video_2 != ''){
                    $url = $post->video_2;
                    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                    ?>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php if(isset($my_array_of_vars['v'])){echo $my_array_of_vars['v'];} ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php
                } 
            ?> 
        </div>
    </div>
 </div>
<div class="col-md-12 py-3">
    <div>
        <label class="font-weight-bold"><i class="fas fa-images"></i> slide thực tế</label> <br>
        <div class="slide_2_edit" id="sortable_2">
            @foreach($post->f_slide_2 as $img_s)
                <div class="slide_2_mod slide_2_mod_{{$img_s->id}} ui-state-default" id="item_{{$img_s->id}}" {{$img_s->orderby}}>
                    <img src="{{asset('source/post/'.$img_s->img)}}" height="50px">
                    <span class="cursor xoa_2_se_2" data-slide_2id="{{$img_s->id}}"><i class="fa fa-trash text-danger"></i></span>
                </div>
            @endforeach

            <script>
                //xoa_2 anh
                $('.xoa_2_se_2').click(function(){
                    var post_type = '{{$post_type->url}}_2';
                    var img_id = $(this).data('slide_2id');
                    $.get("{{asset('admin/post')}}/"+post_type+"/del_slide/"+img_id,function(data){
                        $('.slide_2_mod_'+img_id).remove();
                    });
                });
            </script>
        </div>
        <script>
            $(function () {
                $("#sortable_2").sortable({
                    update: function (event, ui) {
                        var data = $(this).sortable('serialize');
                        var token = '{{ csrf_token() }}';
                        var post_type = '{{$post_type->url}}_2';
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
                $("#sortable_2").disableSelection();
            });

        </script>
        <div style="clear:both"></div>
        <label>Thêm nhiều ảnh bằng cách bôi đen</label> <br>
        <div class="slide_2_post gallery_2" style=""></div>
        <div class="input-group mb-2">
            <input type="file" multiple id="gallery_2-photo-add_2" name="slide_2[]" class="form-control pb-1">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span id="xoa_2" class="xoa_2_it" class="text-danger cursor" style="display:none"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
        
    </div>

    <div id="add_2_slide_2"> </div>
    <div class="text-right">
        <span href="#" class="btn btn-sm btn-primary cursor" id="add_2">Thêm</span>
    </div>

        <script>
            $('#xoa_2').click(function(){
                $('#gallery_2-photo-add_2').val('');
                $('.gallery_2').empty();
                $('#xoa_2').css('display','none');
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
                $('#gallery_2-photo-add_2').on('change', function() {
                    $('.gallery_2').empty();
                    $('#xoa_2').css('display','unset');
                    imagesPreview(this, 'div.gallery_2');
                });
            });

            // them anh 
            $('#add_2').click(function(e){
                e.preventDefault();
                var count = $('.slide_2').length;
                var key = count + 1;
                $('#add_2_slide_2').append('<div class="input-group slide_2 mb-2 slide_2_'+key+'"><input type="file"multiple id="gallery_2-photo-add_2"name="slide_2[]"class="form-control pb-1"><div class="input-group-prepend"><div class="input-group-text"><span data-row="slide_2_'+key+'" id="xoa_2"class="xoa_2_it text-danger cursor"><i class="fa fa-trash"></i></span></div></div></div>');
            });
            //xoa_2 truong vua them
            $('#add_2_slide_2').on('click', '.xoa_2_it',function(e){
                e.preventDefault();
                var it = $(this).data('row');
                $('.'+it).remove();
            });
           
        </script>
    <hr>
</div>