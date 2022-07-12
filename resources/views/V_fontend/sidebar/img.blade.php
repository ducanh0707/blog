<a href="{{$sidebar_r->link}}">
    @if($sidebar_r->img != '' or $sidebar_r->img != null)
        <img src="{{asset('/source/theme/'.$sidebar_r->img)}}" class="w-100">
    @else
        <img src="{{asset('upload/theme/noimg.jpg')}}" class="w-100">
    @endif
</a>