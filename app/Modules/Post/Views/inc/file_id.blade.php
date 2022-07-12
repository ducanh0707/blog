<hr>
<div class="col-md-12 py-3">
    <div>
        <label class="font-weight-bold"><i class="fas fa-images"></i> File tài liệu</label> <br>
        <div class="input-group mb-2">
            <input type="file"  name="file[]" id="filef" class="form-control pb-1">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span id="xoaf" class="text-danger cursor"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>
        
    </div>

    <div id="add_file"> </div>
    <div class="text-right">
        <span href="#" class="btn btn-sm btn-primary cursor" id="addf">Thêm</span>
    </div>

        <script>
            $('#xoaf').click(function(){
                $('#filef').val('');
            });
            // them anh 
            $('#addf').click(function(e){
                e.preventDefault();
                var count = $('.file').length;
                var key = count + 1;
                $('#add_file').append('<div class="input-group file mb-2 file_'+key+'"><input type="file" name="file[]"class="form-control pb-1"><div class="input-group-prepend"><div class="input-group-text"><span data-row="file_'+key+'" id="xoaf"class="xoa_itf text-danger cursor"><i class="fa fa-trash"></i></span></div></div></div>');
            });
            //xoa truong vua them
            $('#add_file').on('click', '.xoa_itf',function(e){
                e.preventDefault();
                var it = $(this).data('row');
                $('.'+it).remove();
            });
           
        </script>

</div>