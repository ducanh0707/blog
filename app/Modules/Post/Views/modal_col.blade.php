<div class="modal fade" id="popup_col" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
       <div class="modal-header">
          <h6 class="modal-title" id="exampleModalCenterTitle">Thêm cột</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <div class="modal-body">
            <form action="" name="form-example-1" id="form_col" enctype="multipart/form-data" method="post">
                @csrf
                <div class="fom-control row">
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Nội dung 1</label>
                        <textarea type="text" name="content_1" id="content_1"  class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Nội dung 2</label>
                        <textarea type="text" name="content_2" id="content_2"  class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label class="font-weight-bold">Nội dung 3</label>
                        <textarea type="text" name="content_3" id="content_3"  class="form-control"></textarea>
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
    $('#form_col').on('submit', function (event) {

        // Stop propagation
        event.preventDefault();
        event.stopPropagation();

        var content_1 = $('#content_1').val();
        var content_2 = $('#content_2').val();
        var content_3 = $('#content_3').val();
        var id_ti = '<?php echo md5(uniqid(rand(), true)) ?>';
        // tinymce.activeEditor.execCommand('mceInsertContent', false, '<table width="100%"style="width:100%"class="table_upload_col '+id_ti+'_table"><tr><td><div class="upload_col '+id_ti+'"><div class="row"><div class="col-md-4"><div class="col_mod">'+content_1+'</div></div><div class="col-md-4"><div class="col_mod">'+content_2+'</div></div><div class="col-md-4"><div class="col_mod">'+content_3+'</div></div></div></div></td></tr></table>');
        tinymce.activeEditor.execCommand('mceInsertContent', false, '<table width="100%"><tr><td><div class="div_upload_col"><table width="100%" style="width:100%" class="mac_dinh table_upload_col '+id_ti+'_table"> <tr> <td style="width:33%"> <div class="col_mod">'+content_1+'</div> </td> <td style="width:34%"> <div class="col_mod">'+content_2+'</div> </td> <td style="width:33%"> <div class="col_mod">'+content_3+'</div> </td> </tr> </table></div></td></tr></table>');
        $('#popup_col').modal('hide');  
    });

</script>
