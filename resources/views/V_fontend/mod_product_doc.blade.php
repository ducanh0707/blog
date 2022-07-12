<div class="product_mod_box cursor">
    
    <div class="img_product">
        <a href="{{asset(Session::get('lang').'/'.$product->url.'.html')}}"><img class="w-100" src="{{asset('source/post/'.$product->img)}}" alt="{{$product->title}}"></a>
    </div>
    <div class="title_product">
        <a class="text-black" href="{{asset(Session::get('lang').'/'.$product->url.'.html')}}"><?php if($product->{'title'.$lang} != ''){ echo $product->{'title'.$lang };}else{echo $product->title;} ?></a>
    </div>
    
</div>

