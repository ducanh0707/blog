<div class="page_header">
    <div class="container">
        <div class="crum py-2">
            <span><a href="{{asset('')}}">{{trans('messages.Trang chủ')}}</a></span> > <span><a href="{{asset(Session::get('lang').'/'.$post->url.'.html')}}"><?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?></a></span>
        </div>
    </div>
</div>