<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <title>{{$title}}</title>
   <meta name="description" content="{{$des}}" />
   <meta name="keywords" content="{{$key}}" />

   <meta property="og:title" content="{{$title}}" />
   <meta property="og:description" content="{{$des}}" />
   <meta property="og:image" content="" />
   <meta property="og:image:width" content="630"/>
    <meta property="og:image:height" content="315"/>
   <meta content="{{$index_meta}}" name="robots" />
   <meta name="copyright" content="" />
   <meta name="author" content="" />
   <meta http-equiv="audience" content="General" />
   <meta name="resource-type" content="Document" />
   <meta name="distribution" content="Global" />
   <meta name="revisit-after" content="1 days" />
   <meta name="generator" content="" />
   <meta property="og:site_name" content="Thiết kế wwebsite" />
   <meta property="og:type" content="website" />
   <meta property="og:locale" content="vi_VN" />

   <script src="{{asset('style/fontend/js/jquery-3.3.1.min.js')}}"></script>
   <!-- giao dien -->
   <link rel="stylesheet"  href="{{ asset('style/fontend/css/applify.min.css') }}">
   <link rel="stylesheet" href="{{ asset('style/fontend/css/style.css') }}">
   
   <script src="{{ asset('style/fontend/bootstrap-4-3-1/js/popper.min.js') }}"></script>
   <link rel="stylesheet" href="{{ asset('style/fontend/select_search/bootstrap-select.css') }}">
   <script src="{{asset('style/fontend/money/simple.money.format.js')}}"></script>
   
</head>
<body class="coming-soon ui-transparent-nav" >
      @include('V_fontend/V_layout/menu')
      @yield('content')
      @include('V_fontend/V_layout/footer')
   <script src="{{asset('style/fontend/icon/icon.js')}}"></script>
   <script src="{{asset('style/fontend/bootstrap-4-3-1/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('style/fontend/js/form-validator.min.js')}}"></script>
  
   <script src="{{asset('style/fontend/select_search/bootstrap-select.js')}}"></script>
   <script src="{{asset('style/fontend/js/applify.js')}}"></script>
   {{-- js menu  --}}
   <script>
      $(document).ready(function () {
         $('.navbar .dropdown-item').on('click', function (e) {
            var $el = $(this).children('.dropdown-toggle');
            var $parent = $el.offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');

            if (!$parent.parent().hasClass('navbar-nav')) {
               if ($parent.hasClass('show')) {
                  $parent.removeClass('show');
                  $el.next().removeClass('show');
                  $el.next().css({"top": -999, "left": -999});
               } else {
                  $parent.parent().find('.show').removeClass('show');
                  $parent.addClass('show');
                  $el.next().addClass('show');
                  $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
               }
               e.preventDefault();
               e.stopPropagation();
            }
         });

         $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
            $(this).find('li.dropdown').removeClass('show open');
            $(this).find('ul.dropdown-menu').removeClass('show open');
         });

         });

   </script>
</body>
</html>