<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Tối ưu SEO</h3>
    </div>
    <div class="box-body">
        <div class="form-group google_snipet" style="padding: 10px; background-color: #f0f0f1; border-radius: 5px;">
            <div class=""><span class="google_url">{{asset($post->url)}}</span></div>
            <div class="" style="color: #2330ab;font-size: 20px;">
                <span class="google_title">
                    @if($post->title_seo == '')
                    {{$post->title}}
                    @else
                    {{$post->title_seo}}
                    @endif
                </span>
            </div>
            <div class=""><span class="google_des">{{$post->des_seo}}</span></div>
        </div>
        <!-- tieu de bài viết  -->
        <div class="form-group">
            <label>Tiêu đề SEO </label>
            <input type="text" id="seo_title" class="form-control" name="title_seo" value="{{$post-> title_seo}}">
            <div>
                <div class="text-right">
                    <a data-toggle="collapse" href="#title_seo" role="button" aria-expanded="false"
                        aria-controls="title_seo">
                        Thêm ngôn ngữ
                    </a>
                </div>
                <div class="collapse multi-collapse" id="title_seo">
                    <div class="form-group">
                        <label>Tiêu đề SEO tiếng anh</label>
                        <input type="text" class="form-control" value="{{$post->title_seo_en}}" name="title_seo_en" >
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- mô tả bài viết  -->
        <div class="form-group">
            <label>Mô tả bài viết (SEO - Meta Description)</label>
            <textarea id="seo_des" class="form-control" rows="3" name="des_seo">{{$post-> des_seo}}</textarea>
            <div>
               <div class="text-right">
                   <a  data-toggle="collapse" href="#des_seo" role="button" aria-expanded="false" aria-controls="des_seo">
                       Thêm ngôn ngữ
                   </a>
               </div>
               <div class="collapse multi-collapse" id="des_seo">
                   <div class="form-group">
                       <label>Mô tả bài viết tiếng anh</label>
                       <textarea  class="form-control" rows="3" name="des_seo_en">{{$post-> des_seo_en}}</textarea>
                   </div>
                  
               </div>
           </div>
        </div>
        <!-- meta keyword bài viết  -->
        <div class="form-group">
            <label>Keywords (SEO - Meta keyword, mỗi keyword cách nhau dấu phẩy)</label>
            <input type="text" class="form-control" rows="3" name="key_seo" value="{{$post -> key_seo}}">
            <div>
               <div class="text-right">
                   <a  data-toggle="collapse" href="#key_seo" role="button" aria-expanded="false" aria-controls="key_seo">
                       Thêm ngôn ngữ
                   </a>
               </div>
               <div class="collapse multi-collapse" id="key_seo">
                   <div class="form-group">
                       <label>Keywords tiếng anh</label>
                       <input type="text" class="form-control" rows="3" name="key_seo_en"  value="{{$post -> key_seo_en}}">
                   </div>
                  
               </div>
           </div>
        </div>
        <!-- index-->
        <div class="form-group">
            <label for="index">Trạng thái index</label>
            <select class="form-control" name="index_meta">
                <option value="INDEX, FOLLOW" @if($post->index_meta == 'INDEX, FOLLOW'){{'selected'}}@endif>INDEX,
                    FOLLOW</option>
                <option value="NOINDEX, FOLLOW" @if($post->index_meta == 'NOINDEX, FOLLOW'){{'selected'}}@endif>NOINDEX,
                    FOLLOW</option>
                <option value="INDEX, NOFOLLOW" @if($post->index_meta == 'INDEX, NOFOLLOW'){{'selected'}}@endif>INDEX,
                    NOFOLLOW</option>
                <option value="NOINDEX, NOFOLLOW" @if($post->index_meta == 'NOINDEX,
                    NOFOLLOW'){{'selected'}}@endif>NOINDEX, NOFOLLOW</option>
            </select>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="multiple" name="canon" value="on" @if($post -> canon ==
            'on'){{'checked'}}@endif>
            <label class="form-check-label" for="multiple">Thêm thẻ Canonicalization (tránh trùng lặp nội dung)</label>
        </div>
    </div>
    <script>
        //title 
        $('#seo_title').keyup(function () {
            var google_title = this.value;
            var title_count = this.value.length;
            $('#count_title').html(title_count);
            var title = $('#title_post').val();
            if (google_title == '') {
                $('.google_title').html(title);
            } else {
                $('.google_title').html(google_title);
            }
            if (title_count <= 60) {
                $('#seo_title').addClass('border-success');
            } else if (title_count > 60 && title_count <= 70) {
                $('#seo_title').addClass('border-warning');
            } else {
                $('#seo_title').addClass('border-danger');
            }
        });

        $('#seo_des').keyup(function () {
            var google_des = this.value;
            var des_count = this.value.length;
            $('#count_des').html(des_count);
            $('.google_des').html(google_des);
            if (des_count <= 215) {
                $('#seo_des').addClass('border-success');
            } else if (des_count > 215 && des_count <= 250) {
                $('#seo_des').addClass('border-warning');
            } else {
                $('#seo_des').addClass('border-danger');
            }
        });

    </script>
</div>
