<section class="doi_tac">
    <div class="container">
        <div class="row">
            <div class="col-md-12   my-3">
                
                <h2 class="sectionTitle text-center">
                    <div>
                        <?php if($row->{'title'.$lang} != ''){ echo $row->{'title'.$lang };}else{echo $row->title;} ?>
                    </div>
                    <img src="{{asset('upload/theme/doitac.png')}}" alt="">
                </h2>
            </div>
    
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="partnerSlider slider-project ">
                    @foreach($row->F_slide_img->where('status','on') as $key_i => $img)
                        <div class="partner-img">
                            <img src="{{asset('source/slide/'.$img->img)}}" class="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>