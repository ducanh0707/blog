@extends('V_fontend.index')
@section('content')
<div id="san-pham" class="mt-4">
    @if(Session::get('lang') != 'vi')
        @php $lang = '_'.Session::get('lang'); @endphp
    @else
        @php  $lang =  ''; @endphp
    @endif
    @if(Session::get('lang') == '')
        @php Session::put(['lang' => 'vi']); @endphp
    @endif
    {{-- @include('V_fontend/san-pham/crum') --}}
    @include('V_fontend/san-pham/slide_info')

    @include('V_fontend/san-pham/content')

    {{-- @include('V_fontend/san-pham/relate') --}}
</div>
<script>
    $(document).ready(function(){
        $('.money').simpleMoneyFormat();
    });
</script>
@endsection('content')
