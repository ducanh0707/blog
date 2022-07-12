<div class="modal fade" id="new_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/user/'.$type_id.'/new')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới tài khoản</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6">
                  <!-- tên đây đủ -->
                  <div class="form-group">
                        <label>Họ tên(*)</label>
                        <input type="text" class="form-control" id="name" placeholder="Họ tên" name="name" value="{{old('name')}}" onkeyup="ChangeToSlug();">
                     </div>
                     <!-- so dien thoai -->
                     <div class="form-group">
                           <label>Số điện thoại (*)</label>
                           <input type="text" class="form-control" placeholder="Điện thoại" name="tel" value="{{old('tel')}}" required>
                        </div>
                     <!-- email thanh vien -->
                     <div class="form-group">
                        <label>Email của bạn</label>
                        <input type="email" class="form-control" placeholder="Email thành viên" name="email" value="{{old('email')}}" required>
                     </div>                    
                     <!-- Mat khau  -->
                     <div class="form-group">
                        <label>Mật khẩu(*)</label>
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password">
                     </div>
                     <!-- nhap lai mat khau -->
                     <div class="form-group">
                        <label>Nhập lại mật khẩu(*)</label>
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_again">
                     </div>
               </div>
               <div class="col-md-6">
                     
                     <!-- url -->
                     <div class="form-group">
                        <label>URL(không trùng với thành viên khác)</label>
                        <input type="text" class="form-control" id="url" placeholder="URL" name="url" value="{{old('url')}}">
                     </div>
                     <script>
                        function ChangeToSlug()
                        {
                           var title, slug;
                         
                           //Lấy text từ thẻ input title_news
                           title = document.getElementById("name").value;
                         
                           //Đổi chữ hoa thành chữ thường
                           slug = title.toLowerCase();
                         
                           //Đổi ký tự có dấu thành không dấu
                           slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                           slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                           slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                           slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                           slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                           slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                           slug = slug.replace(/đ/gi, 'd');
                           //Xóa các ký tự đặt biệt
                           slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                           //Đổi khoảng trắng thành ký tự gạch ngang
                           slug = slug.replace(/ /gi, "-");
                           //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                           //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                           slug = slug.replace(/\-\-\-\-\-/gi, '-');
                           slug = slug.replace(/\-\-\-\-/gi, '-');
                           slug = slug.replace(/\-\-\-/gi, '-');
                           slug = slug.replace(/\-\-/gi, '-');
                           //Xóa các ký tự gạch ngang ở đầu và cuối
                           slug = '@' + slug + '@';
                           slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                           //In slug ra textbox có id “url_news”
                           document.getElementById('url').value = slug;
                        }
                        </script>
                      <!-- anh dại diện  -->
                      <div class="form-group">
                        <b>Trạng thái: </b>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="on" checked>
                            <label class="form-check-label" for="inlineRadio1">Công khai</label>
                        </div>
                     
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="off">
                          <label class="form-check-label" for="inlineRadio2">Khóa</label>
                        </div>
                     </div> 
                     <div class="form-group">
                        <label>Ảnh đại diện</label>
                        {{F_input_image('','img','new_user','upload/user')}}
                     </div> 
               </div>
            </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
           <button type="submit" class="btn btn-primary">Gửi</button>
         </div>
       </div>
   
   </div>
   </form>
</div>
