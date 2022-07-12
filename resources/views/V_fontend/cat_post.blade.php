@extends('V_fontend.index')
@section('content') 

<!-- Main Wrapper -->
<div class="main" role="main">
	<!-- UI Hero -->
	<div class="ui-hero hero-center hero-lg ui-tilt ui-gradient-webbox">
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                <!-- Heading -->
                <h1 class="heading">
                    {{$cat->name}}
                </h1>

                </div>
            </div>
            <div class="row mt-3">
                @if(isset($post_list))
                @foreach($post_list as $post)
                   <div class="col-md-3 col-6">
                      <div class="theme_mod">
                         <div class="theme_mod_img ui-card demo-card shadow-md" data-target="{{asset('demo/'.$post -> url.'/'.$post -> id.'/list')}}">
                            @if($post -> img != '')
                               <img class="w-100" src="{{asset('upload/domain/'.$post -> img)}}" alt="Giao diện website {{$post -> title}}" class="img-responsive" data-uhd="" style="transition-duration: 5s;"/>
                            @else
                               <img class="w-100" src="{{asset('upload/theme/notheme.jpg')}}" alt="Giao diện website {{$post -> title}}" class="img-responsive" data-uhd="" style="transition-duration: 5s;"/>
                            @endif
                         </div>
                         
                         <div class="m-2">
                            <div class="theme_mod_title">
                               <b  class="text-dark"><a class="text-dark" href="{{$post->url}}"> {{$post -> title}}</a></b>
                            </div>

                         </div>
                         
                      </div>
                   </div>
                @endforeach
                @endif
             </div>
		</div><!-- .container -->
	</div><!-- .ui-hero -->
</div><!-- .main -->   

@endsection('content')