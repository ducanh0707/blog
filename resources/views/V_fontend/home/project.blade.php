<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="projectSlider slider-project ">
                @foreach($row->F_cat_post_id->f_post as $key => $post)
                    <div class="du_an_mod">
                        <div class="du_an_img">
                            <a href="{{asset(Session::get('lang').'/'.$post->url.'.html')}}"><img src="{{asset('source/post/'.$post->img)}}" class="w-100"></a>
                        </div>
                        <div class="du_an_title_des ">
                            <div class="du_an_title font-weight-bold py-2">
                                <a href="{{asset(Session::get('lang').'/'.$post->url.'.html')}}">
                                    <?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?>
                                </a>
                            </div>
                        
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
 
</div>

  