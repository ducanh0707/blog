@extends('V_fontend.index')
@section('content')
    @foreach($row_body as $row)
        <section id="{{$row->style}}" class="{{$row->style}}">
            @if(Session::get('lang') != 'vi')
                @php 
                    $lang = '_'.Session::get('lang');
                @endphp
            @else
                @php  $lang =  ''; @endphp
            @endif

            @if(Session::get('lang') == '')
                @php Session::put(['lang' => 'vi']); @endphp
            @endif
            @include('V_fontend/home/'.$row->style)
               
        </section>
    @endforeach

@endsection('content')
