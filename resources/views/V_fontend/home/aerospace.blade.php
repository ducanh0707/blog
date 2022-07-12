
<div class="aero">
    <div class="aero_content postion-br">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="text-right ">
                        <div class="intro_title  text-white">
                            <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?>
                        </div>
                        <div class="aero_des text-white">
                            <?php if($row->{'des'.$lang} != ''){ echo $row->{'des'.$lang };}else{echo $row->des;} ?>
                        </div>
                        <div class="intro_link">
                            <span class="lear-more bg-yellow p-2 px-3 mr-3">
                                <a href="{{$row->link}}">{{trans('messages.lear more')}}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black">
        <div class="aero_video">
            <img  class="w-100" src="{{asset('source/theme/'.$row->img)}}">
        </div>
    </div>
</div>
