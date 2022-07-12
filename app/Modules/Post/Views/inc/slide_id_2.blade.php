<div class="col-md-12">
    <hr>
    <div class="form-group">
        <label><i class="fab fa-youtube"></i> Link Video Youtube thực tế<a target="_blank" href="https://youtube.com"> video youtube</a></label>
        <input type="text" class="form-control" name="video_2" >
    </div>
 </div>
<div class="col-md-12 py-3">
    <div>
        <label class="font-weight-bold"><i class="fas fa-images"></i> slide  thực tế</label> <br>
        <label>Thêm nhiều ảnh bằng cách bôi đen</label> <br>
        <div class="slide_2_post gallery_2" style=""></div>
        <div class="input-group mb-2">
            <input type="file" multiple id="gallery_2-photo-add_2-2" name="slide_2[]" class="form-control pb-1">
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
                $('#gallery_2-photo-add_2-2').val('');
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
                $('#gallery_2-photo-add_2-2').on('change', function() {
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
                $('#add_2_slide_2').append('<div class="input-group slide_2 mb-2 slide_2_'+key+'"><input type="file"multiple id="gallery_2-photo-add_2-2"name="slide_2[]"class="form-control pb-1"><div class="input-group-prepend"><div class="input-group-text"><span data-row="slide_2_'+key+'" id="xoa_2"class="xoa_2_it text-danger cursor"><i class="fa fa-trash"></i></span></div></div></div>');
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