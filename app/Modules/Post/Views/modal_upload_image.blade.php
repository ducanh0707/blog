<div class="modal fade" id="popup_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
       <div class="modal-header">
          <h6 class="modal-title" id="exampleModalCenterTitle">Thêm ảnh slide</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <form action="" name="form-example-1" id="form_upload" enctype="multipart/form-data" method="post">
                @csrf
                <div class="fom-control row">
                    <div class="col-md-12">
                        <label  class="font-weight-bold">Chọn 2 ảnh (Giữ shift để chọn 2 ảnh)</label><br>
                        <input type="file" name="files[]" id="files" placeholder="Choose files" multiple >
                    </div> 
                    <div class="col-md-6 mt-2">
                        <label class="font-weight-bold">Tên ảnh 1</label>
                        <input type="text" id="text_one"  class="form-control" >
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="font-weight-bold">Tên ảnh 2</label>
                        <input type="text" name="text_two" id="text_two"  class="form-control" >
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary cursor" id="send_img">Gửi ảnh</button>
                </div>   
            </form>
          </div> <!-- dong the modal -body -->
       </div>
    </div>
 </div>
 <script>
    var _token = $('input[name=_token]').val();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': _token
        }
     });
    $('#form_upload').on('submit', function (event) {

    // Stop propagation
    event.preventDefault();
    event.stopPropagation();

        var formData = new FormData(this);
        let TotalFiles = $('#files')[0].files.length; //Total files
        let files = $('#files')[0];
        for (let i = 0; i < TotalFiles; i++) {
            formData.append('files' + i, files.files[i]);
        }
        var count_file = $("input:file", this)[0].files.length;
        var text_one = $('#text_one').val();
        var text_two = $('#text_two').val();
     
        if(count_file != 2){
            alert('Bạn chỉ được chọn 2 ảnh'); return false;
        }
        
        formData.append('TotalFiles', TotalFiles);
        $.ajax({
        type:'POST',
            url: '{{asset("admin/post/bai-viet/image_upload")}}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (data) => {
                this.reset();
                alert('Bạn đã upload ảnh thành công');

                tinymce.activeEditor.execCommand('mceInsertContent', false, '<table width="100%" style="width:100%"><tr><td><div id="beer_slider" class="beer-slider" data-beer-label="'+text_one+'">'+data+'</div></td></tr><table><br/>');
                    $('#popup_upload').modal('hide');    
            },
            error: function(data){
                alert(data.responseJSON.errors.files[0]);
                console.log(data.responseJSON.errors);
            }
        });
    });

</script>

{{-- <table width="100%" style="width:100%"><tr><td>
<div id="beer_slider" class="beer-slider" data-beer-label="before">
    
    <img src="/vankyo/public/source/post/man-hold-beer-after1logo.jpeg" alt="Original man holding beer" />
    <div class="beer-reveal" data-beer-label="after"><img src="/vankyo/public/source/post/man-hold-beer-after1logo.jpeg" alt="Processed with logo and Lightroom presets" /></div>
    </div>
</td></tr><table><br/> --}}