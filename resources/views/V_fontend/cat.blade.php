@extends('V_fontend.index')
@section('content')
<div id="cat" class="mt-5">
    @if(Session::get('lang') != 'vi')
        @php $lang = '_'.Session::get('lang'); @endphp
    @else
        @php  $lang =  ''; @endphp
    @endif
    @if(Session::get('lang') == '')
        @php Session::put(['lang' => 'vi']); @endphp
    @endif
 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php if($cat->{'name_'.Session::get('lang')} != ''){ echo $cat->{'name_'.Session::get('lang') };}else{echo $cat->name;} ?></h1>
            </div>
            <div class="col-md-12">
                @include('V_backend/alert')
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    @foreach($post_list as $product)
                        <div class="col-md-3 my-2">
                            @include('V_fontend/mod_product_doc')
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-footer clearfix">
                            {{$post_list->appends(request()->input()) ->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
   
    </div>
</div>


@endsection('content')
