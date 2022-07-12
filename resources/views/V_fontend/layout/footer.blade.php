<section class="footer" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="img_logo text-center">
                    <img src="{{asset('source/theme/'.$row->img_2)}}" alt="">
                </div>
                {{-- mang xa hoi  --}}
                <div class="social text-center mt-5">
                    @if($row->icon_text != '' or $row->icon_text != null)
                    @php $t=0; @endphp
                    
                    @if(json_decode($row->icon_text))
                            @foreach(json_decode($row->icon_text) as $key_it => $it)
                                @php $t++; @endphp
                                <span class="hotine @if($t > 1){{'borderLeft'}}@endif">
                                    <a href="<?php if($it->{'text'.$lang} != ''){ echo $it->{'text'.$lang };}else{echo $it->text;} ?>">
                                        <?php echo html_entity_decode($it->icon) ?> 
                                    </a>
                                    
                                </span>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="footer-address mt-3">
                        <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-email text-right  mt-3">
                        <?php if($row->{'title_2'.$lang} != ''){ echo $row->{'title_2'.$lang };}else{echo $row->title_2;} ?>
                </div>
            </div>
        
        </div>
    </div>
</section>

<style>
    .footer{
        background-image:url('{{asset('source/theme/'.$row->img)}}');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>