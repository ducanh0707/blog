<?php
session_start();
?>
<section id="chitiet_product_produce" class="bg-blue text-white py-3">
    <div class="container">
        <div class="row d-block d-md-none">
            <div class="col-md-12">
                <h1 class="product_name text-white">{{$post->title}}</h1>   
            </div>
        </div>
        <div class="row mb-2">
            <div class='col-md-6'>
                <div id="carousel" class="carousel slide thum" data-ride="carousel" >
                    
                    <div class="carousel-inner"  style="height: 400px; display: flex; align-items: center; background-color: #f3f3f3;">
                        @if($post->img != '')
                            <div class="carousel-item active">
                                <img src="{{asset('source/post/'.$post->img)}}" class="d-block w-100">
                            </div>
                        @endif
                        @foreach($slide_list as $key_i => $img)
                            <div class="carousel-item @if($post->img == '') @if($key_i == 0) active @endif  @endif">
                                <img src="{{asset('source/post/'.$img->img)}}" class="d-block w-100" alt="{{$img->des}}">
                            </div>
                        @endforeach 
                        @if($post->video != '')
                            <div class="carousel-item">
                                <?php echo html_entity_decode($post->video) ?>
                            </div>
                        @endif 
                    </div>
                    <ol class="carousel-indicators" style="position: unset !important;">
                        @if($post->img != '')
                            <li style=" width: 60px !important;" data-target="#carousel" data-slide-to="0" class="active">
                                <img src="{{asset('source/post/'.$post->img)}}" class="d-block w-100" style="height: 50px !important; width: 50px !important;">
                            </li>
                        @endif
                        @foreach($slide_list as $key_d => $dot)
                            <li style=" width: 60px !important;" data-target="#carousel" data-slide-to="@if($post->video == ''){{$key_d}}@else{{$key_d+1}}@endif" class="@if($post->video == '') @if($key_d == 0) active @endif @endif">
                                <img src="{{asset('source/post/'.$dot->img)}}" class="d-block" style="height: 50px !important; width: 50px !important;">
                            </li>
                        @endforeach
                        @if($post->video != '')
                            <li style=" width: 60px !important;" data-target="#carousel" data-slide-to="{{count($slide_list)+1}}" >
                                <img src="{{asset('source/theme/novideo.jpg')}}" class="d-block w-100" style="height: 50px !important; width: 50px !important;">
                            </li>
                        @endif
                    </ol>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
               
            </div>
            <div class='col-md-6'>
                <h1 class="product_name d-none d-md-block">
                    <?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?>
                </h1>
            
                
                <div class='description-product-produce'>
                    <?php if($post->{'des'.$lang} != ''){ echo html_entity_decode($post->{'des'.$lang });}else{echo html_entity_decode($post->des);} ?>
                  
                </div>
                <div class="des_file">
                    <div>
                        @if($post->f_file)
                            @foreach($post->f_file as $key => $file)
                                <a class="btn btn-warning btn-sm" href="{{asset('source/post/'.$file->name)}}">
                                    @if($key == 0)
                                        {{trans('messages.Catalogue')}}
                                    @elseif($key == 1)
                                        {{trans('messages.Bản vẽ')}}
                                    @else
                                        {{trans('messages.Tài liệu')}}  
                                    @endif
                                        
                                        
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center mt-2">
                        <button type="button" data-toggle="modal" data-target="#order_{{$post->id}}" class="w-100 add_cart button-add-to-cart btn btn-danger" >
                            {{trans('messages.Liên hệ')}}
                        </button>
                    </div>
                    @php $product = $post @endphp
                    @include('V_fontend/mod_order_popup')
                </div>
            </div>

        </div>
    </div>
</section>