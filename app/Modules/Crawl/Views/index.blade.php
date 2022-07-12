@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title">Công cụ Crawl bài viết trên website <a href="https://ivankyo.com/" target="_blank">ivankyo</a></h3>
            </div>
            <div class="box-body table-responsive no-padding">
                <form action="{{asset('admin/crawl')}}" method="get">
                    <div class="form-group">
                       <div class="form-group">Link bài viết </label>
                            <input type="type" class="form-control" name="link" value="@if($link) {{$link}} @endif">
                       </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn btn-primary">Lấy dữ liệu</button>
                    </div>
                </form>

                <div>
                    @if($link)
                        @include('Crawl::simple_html_dom')
                        <?php
                            $arrContextOptions=array(
                                "ssl"=>array(
                                    "verify_peer"=>false,
                                    "verify_peer_name"=>false,
                                    ),
                                    'http' => array(
                                    'header' => array(
                                    'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36',
                                    'cookie: ASP.NET_SessionId=aochch451ekbvv45azmmx13h; ignoredmember=; _ga=GA1.3.1624511905.1587654517; _gid=GA1.3.823068817.1588177831'
                                    ),
                                ),
                            );
                            $html = file_get_html($link, false, stream_context_create($arrContextOptions));
                            $title = $html -> find('h1.product_name',0)->plaintext;
                            $des = $html -> find('.description',0);
                            $content = $html -> find('.product-details',0);
                            
                        ?>
                    
                        <form action="{{asset('admin/crawl/new')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <div class="form-group">Id bài viết cần sửa (Tạo mới thì để trống) </label>
                                <input type="type" class="form-control" name="post_id" value="">
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="type" class="form-control" name="title" value="{{$title}}">
                            </div>
                            {{-- <div class="form-group">
                                <select name="cat_id" id="" class="form-control">
                                    @foreach ($cat_list as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label>Mô tả</label>
                                 <textarea name="des" id="des">{{$des}}</textarea>
                                {{F_tinymce('des')}}
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                 <textarea name="content" id="content">{{$content}}</textarea>
                                {{F_tinymce('content')}}
                            </div>
                            <div class="form-group">
                                <label>Video (mã nhúng yotube)</label>
                                <textarea name="video" id="content" class="form-control">{{old('video')}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>File tài liệu</label>
                                <input type="type" class="form-control" name="file" value="">
                            </div>
                            <div class="form-group">
                                <label>Slide (mỗi tên ảnh 1 dòng)</label>
                                <textarea name="slide" id="content" class="form-control">{{old('slide')}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>  
          </div>
  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
