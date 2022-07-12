<div class="product_mod_box">
        <div class="img_product">
            <a href="{{asset(Session::get('lang').'/'.$post->url.'.html')}}">
                <img class="w-100" src="{{asset('source/post/'.$post->img)}}" alt="{{$post->title}}">
            </a>
        </div>
        <div class="price_product">
            <div>
                <a href="{{asset(Session::get('lang').'/'.$post->url.'.html')}}">
                    <?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?>
                </a>
            </div>
        </div>
</div>
