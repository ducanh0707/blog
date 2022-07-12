@extends('V_fontend.index')
@section('content')
<div id="cat" class="mt-5">
    <div class="container">
        
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Tìm kiếm: {{$key}}</h1>
            </div>
        </div>
        <div class="row">
            @foreach($post_list as $product)
                <div class="product_mod col-md-4 mt-4 col-6">
                    @include('V_fontend/home/inc/mod_product')
                </div>
            @endforeach
        </div>
   
    </div>
</div>


@endsection('content')
