<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="content">
                <div class="name_company">
                    <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?>
                </div>
                <div class="detail_company">
                    <?php if($row->{'content'.$lang} != ''){ echo html_entity_decode($row->{'content'.$lang });}else{echo html_entity_decode($row->content);} ?>
                </div>
   
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="sidebar">
                <div class="sidebar_content">
                    <div class="sidebar_title text-left">
                        {{trans('messages.Tin tức')}}
                    </div>

                    <div class="sidebar_post_mod">
                        @foreach($row->F_cat_post_id->f_post as $key => $post)
                            @if($key < 5)
                                <div class="row my-2">
                                    <div class="col-4">
                                        <div class="sidebar_post">
                                            <a href="#">
                                                <img src="{{asset('source/post/'.$post->img)}}" class="w-100">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="sidebar_post_title">
                                            <a href="#">
                                                <?php if($post->{'title'.$lang} != ''){ echo $post->{'title'.$lang };}else{echo $post->title;} ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                   
                </div>
            </div>

        </div>
    </div>