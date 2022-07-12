<div class="modal fade" id="popup_upload_text_image" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
       <div class="modal-header">
          <h6 class="modal-title" id="exampleModalCenterTitle">Thêm ảnh slide text</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <form action="" name="form-example-1" id="form_upload_text_image" enctype="multipart/form-data" method="post">
                @csrf
                <div class="fom-control row">
                    <div class="col-md-12">
                        <label  class="font-weight-bold">Chọn 1 ảnh</label><br>
                        <input type="file" name="files" id="files" placeholder="Choose files">
                    </div> 
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Tiêu đề 1</label>
                        <textarea type="text" name="title_one" id="title_one"  class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Tiêu đề 2</label>
                        <textarea type="text" name="title_two" id="title_two"  class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="font-weight-bold">Vị trí chữ</label>
                        <select class="form-control" name="position" id="position">
                                <option value="center">Ở giữa</option>
                                <option value="left">Bên trái</option>
                                <option value="right">Bên phải</option>
                        </select>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="font-weight-bold">Khoảng cách bên trên</label>
                        <select class="form-control" name="top" id="top">
                                <option value="10%">10%</option>
                                <option value="20%">20%</option>
                                <option value="30%">30%</option>
                                <option value="40%">40%</option>
                                <option value="50%">50%</option>
                                <option value="60%">60%</option>
                                <option value="70%">70%</option>
                                <option value="80%">80%</option>
                                <option value="90%">90%</option>
                                <option value="10%">10%</option>
                             
                        </select>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary cursor">Gửi ảnh</button>
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
    $('#form_upload_text_image').on('submit', function (event) {

    // Stop propagation
    event.preventDefault();
    event.stopPropagation();

        var formData = new FormData(this);
        formData.append('files', $('input[type=file]')[0].files[0]); 
        
        var title_one = $('#title_one').val();
        var title_two = $('#title_two').val();
        var top = $('#top').val();
        var position = $('#position').val();
        var count_file = $("input:file", this)[0].files.length;
        if(count_file != 1){
            alert('Bạn chỉ được chọn 1 ảnh'); return false;
        }

        var id_ti = '<?php echo md5(uniqid(rand(), true)) ?>';
      
        $.ajax({
        type:'POST',
            url: '{{asset("admin/post/bai-viet/image_upload_text_image")}}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
          
            success: (data) => {
                this.reset();
                alert('Bạn đã upload ảnh thành công');
                // tinymce.activeEditor.execCommand('mceInsertContent', false, '<table class="w_text_image '+id_ti+'_table" width="100%" style="width:100%"><tr><td><div class="text_image"><div class="text_image_title '+id_ti+'" style="text-align:'+position+';top:'+top+'"><div class="text_image_title_one"><h2>'+title_one+'</h2></div><div class="text_image_title_two"><p>'+title_two+'</p></div></div><div class="text_image_img">'+data+'</div></div> <script>$(function(){var hieghtThreshold = $(".'+id_ti+'").offset().top;var hieghtThreshold_end  = $(".'+id_ti+'").offset().top - $(".'+id_ti+'").height()-400 ;$(window).scroll(function() {var scroll = $(window).scrollTop();if (scroll >= hieghtThreshold_end && scroll <=  hieghtThreshold){$(".'+id_ti+'").css("opacity","1") ; $(".'+id_ti+'").addClass("animate__animated animate__fadeInUp");}});})</'+'script></td></tr><table><br/>');
                tinymce.activeEditor.execCommand('mceInsertContent', false, '<table class="w_text_image '+id_ti+'_table" width="100%" style="width:100%"><tr><td><div class="text_image"><div class="text_image_title" style="text-align:'+position+';top:'+top+'"><div class="text_image_title_one  '+id_ti+'_1"><h2>'+title_one+'</h2></div><div class="text_image_title_two  '+id_ti+'_2"><p>'+title_two+'</p></div></div><div class="text_image_img">'+data+'</div></div> <script> $(".text_image").title_ami("'+id_ti+'");</'+'script></td></tr><table><br/>');
                    $('#popup_upload_text_image').modal('hide');    

            },
            error: function(data){
                alert(data.responseJSON.errors.files[0]);
                console.log(data.responseJSON.errors);
            }
        });
    });
   //add image 
       
    

</script>
