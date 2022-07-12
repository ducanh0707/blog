
@extends('V_fontend.index')
@section('content')
<div class="container detail-news mt-3">
    @if(Session::get('lang') != 'vi')
        @php $lang = '_'.Session::get('lang'); @endphp
    @else
        @php  $lang =  ''; @endphp
    @endif
    @if(Session::get('lang') == '')
        @php Session::put(['lang' => 'vi']); @endphp
    @endif

    <div class='row justify-content-center'>
        <div class="col-md-8">
            <h1><?php if($post->{'title_'.Session::get('lang')} != ''){ echo $post->{'title_'.Session::get('lang') };}else{echo $post->title;} ?></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="post-content">
                <?php if($post->{'content_'.Session::get('lang')} != ''){ echo html_entity_decode($post->{'content_'.Session::get('lang')});}else{echo html_entity_decode($post->content);} ?>

                    <div class="slider-for">
                        @foreach($slide_list as $key_i => $img)
                            <img src="{{asset('source/post/'.$img->img)}}"  class=" ">    
                        @endforeach                     
                    </div>
                    <div class="slider-nav my-4">
                        @foreach($slide_list as $key_i => $img)
                            <img src="{{asset('source/post/'.$img->img)}}"  class=" ">    
                        @endforeach                     
                    </div>

            </div>
            {{-- <div class="post-relate mt-3">
                <h5>Bài viết liên quan</h5>
                @if(isset($post_relate))
                    <ul>
                        @foreach($post_relate as $post_r)
                            <li>
                                <a href="{{asset(Session::get('lang').'/'.$post_r->url.'.html')}}">
                                    {{$post_r->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div> --}}
        </div>

    </div>
</div>

@endsection('content')
