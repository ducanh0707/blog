@if(isset($sidebar_r->f_cat->name))
    <div class="sidebar_title text-center">
        {{$sidebar_r->f_cat->name}}
    </div>
    
    @if(isset($sidebar_r->f_cat->f_post))
        @foreach($sidebar_r->f_cat->f_post as $key_p => $post)
            @if($key_p+1 <= $sidebar_r->count_post)
                <div class="sidebar_post_mod">
                    <div class="row">
                        <div class="col-4">
                            <div class="sidebar_post">
                                <a href="{{$post->link}}">
                                    @if($post->img != '' or $post->img != null)
                                        <img src="{{asset('/source/post/'.$post->img)}}" class="w-100">
                                    @else
                                        <img src="{{asset('upload/theme/noimg.jpg')}}" class="w-100">
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="sidebar_post_title">
                                <a href="{{$post->link}}">
                                    {{$post->title}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        Bạn chưa chọn danh mục sidebar
    @endif
@else
    Bạn chưa chọn danh mục sidebar
@endif
