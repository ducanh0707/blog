<div class="modal fade" id="new_cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/cat/new')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới danh mục</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                      Tiếng việt
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                      Tiếng anh
                  </a>
                </li>
               
            </ul>
            {{-- tieng anh  --}}
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- ten danh muc -->
                            <div class="form-group">
                                    <label for="name_cat">Tên danh mục</label>
                                    <input type="text" class="form-control" id="name" placeholder="Bạn điền tên danh mục" name="name" onkeyup="ChangeToSlug_cat();" value="{{old('name')}}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="name_cat_seo">Mô tả ngắn</label>
                                    <textarea class="form-control" name="des">{{old('des')}}</textarea>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <!-- tiêu đề SEO -->
                            <div class="form-group">
                                <label for="name_cat_seo">Tiêu đề SEO</label>
                                <input type="text" class="form-control" id="title_seo" placeholder="Bạn điền tiêu đề SEO" name="title_seo" value="{{old('title_seo')}}">
                            </div>
                            <!-- mô tả danh mục  -->
                            <div class="form-group">
                                <label>Mô tả danh mục (SEO - Meta Description)</label>
                                <textarea  class="form-control" id="des_seo" rows="3" name="des_seo" placeholder="Bạn điền mô tả danh mục (tối đa 325 ký tự)" >{{ old('des_seo')}}</textarea>
                            </div>
                            <!-- meta keyword-->
                            <div class="form-group">
                                <label for="name_cat">Keyword(SEO - Meta keyword)</label>
                                <input type="text" class="form-control" id="key_seo" placeholder="Bạn điền keyword, cách nhau dấu phẩy" name="key_seo" value="{{old('key_seo')}}">
                            </div>
                        </div>
                    </div>

                </div>
                {{-- tieng anh  --}}
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- ten danh muc -->
                            <div class="form-group">
                                    <label for="name_cat">Tên danh mục</label>
                                    <input type="text" class="form-control" placeholder="Bạn điền tên danh mục" name="name_en">
                                </div>
                                
                                <div class="form-group">
                                    <label for="name_cat_seo">Mô tả ngắn</label>
                                    <textarea class="form-control" name="des_en">{{old('des_en')}}</textarea>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <!-- tiêu đề SEO -->
                            <div class="form-group">
                                <label for="name_cat_seo">Tiêu đề SEO</label>
                                <input type="text" class="form-control"  placeholder="Bạn điền tiêu đề SEO" name="title_seo_en" value="{{old('title_seo_en')}}">
                            </div>
                            <!-- mô tả danh mục  -->
                            <div class="form-group">
                                <label>Mô tả danh mục (SEO - Meta Description)</label>
                                <textarea  class="form-control"  rows="3" name="des_seo_en" placeholder="Bạn điền mô tả danh mục (tối đa 325 ký tự)" >{{ old('des_seo_en')}}</textarea>
                            </div>
                            <!-- meta keyword-->
                            <div class="form-group">
                                <label for="name_cat">Keyword(SEO - Meta keyword)</label>
                                <input type="text" class="form-control"  placeholder="Bạn điền keyword, cách nhau dấu phẩy" name="key_seo_en" value="{{old('key_seo_en')}}">
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

            
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- URL danh muc -->
                            <div class="form-group">
                                <label for="url_cat">URL danh mục</label>
                                <input type="text" class="form-control" id="url" placeholder="URL danh mục" name="url" value="{{old('url')}}">
                            </div>
                            <script>
                                function ChangeToSlug_cat()
                                {
                                    var title, slug;
                                
                                    //Lấy text từ thẻ input title_meta
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
                                    //In slug ra textbox có id “name_meta”
                                    document.getElementById('url').value = slug;
                                }
                            </script>
                            <!-- danh mục cha -->
                            <div class="form-group">
                                <label for="parent_cat">Danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                <option selected value="0">Chọn danh mục cha</option>
                                <?php F_select_cat_multi_level($cat) ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name_cat_seo">Định danh danh mục</label>
                                <input type="text" class="form-control" name="type" value="{{old('type')}}">
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                             <!-- index-->
                            <div class="form-group">
                                <label for="index">Trạng thái index</label>
                                <select class="form-control" name="index_meta">
                                <option value="INDEX, FOLLOW">INDEX, FOLLOW</option>
                                <option value="NOINDEX, FOLLOW" >NOINDEX, FOLLOW</option>
                                <option value="INDEX, NOFOLLOW" >INDEX, NOFOLLOW</option>
                                <option value="NOINDEX, NOFOLLOW">NOINDEX, NOFOLLOW</option>
                                </select>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="multiple" name="canon" value="on">
                                <label class="form-check-label" for="multiple">Thêm thẻ Canonicalization (tránh trùng lặp nội dung)</label>
                            </div> 
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                {{F_input_image('','img','new_cat','source/cat')}}
                            </div> 
                        </div>
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
