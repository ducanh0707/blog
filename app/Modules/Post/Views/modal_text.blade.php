<div class="modal fade" id="popup_text" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
       <div class="modal-header">
          <h6 class="modal-title" id="exampleModalCenterTitle">Thêm chữ chạy</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <form action="" name="form-example-1" id="form_text" enctype="multipart/form-data" method="post">
                @csrf
                <div class="fom-control row">
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Tiêu đề 1</label>
                        <textarea type="text" name="title_1" id="title_1"  class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Tiêu đề 2</label>
                        <textarea type="text" name="title_2" id="title_2"  class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Mô tả</label>
                        <textarea type="text" name="des" id="des"  class="form-control"></textarea>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary cursor">Lưu</button>
                </div>   
            </form>
          </div> <!-- dong the modal -body -->
       </div>
    </div>
 </div>
 <script>
    $('#form_text').on('submit', function (event) {

        // Stop propagation
        event.preventDefault();
        event.stopPropagation();

        var text_1 = $('#title_1').val();
        var text_2 = $('#title_2').val();
        var des = $('#des').val();
        var id_ti = '<?php echo md5(uniqid(rand(), true)) ?>';
        tinymce.activeEditor.execCommand('mceInsertContent', false, '<table width="100%" style="width:100%" class="table_upload_text '+id_ti+'_table"> <tr> <td> <div class="upload_text '+id_ti+'"> <h2 class="upload_text_one '+id_ti+'_1">'+text_1+'</h2> <h2 class="upload_text_two '+id_ti+'_2">'+text_2+'</h2> <p class="upload_text_three '+id_ti+'_3">'+des+'</p>  </div> <script>$(".table_upload_text").title_text("'+id_ti+'");</'+'script></td> </tr> </table>');
        $('#popup_text').modal('hide');  
    });

</script>
