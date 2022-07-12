<div class="sidebar">
   @foreach($sidebar as $sidebar_r)
        <div class="sidebar{{$sidebar_r->id}}">
            <div class="sidebar_content">
                @include('V_fontend/sidebar/'.$sidebar_r->type)
            </div>
        </div>
    @endforeach
</div>