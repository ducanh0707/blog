<div class="col-md-12 py-3">
        <div>
            <label class="font-weight-bold"><i class="fas fa-images"></i> Slide</label> <br>
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

{{-- @include('Post::inc/slide_id_2') --}}