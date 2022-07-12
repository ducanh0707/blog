  {{-- gia tri   --}}
  <input type="hidden" name="type" value="custome">
  <div class="row mt-3">
     <div class="col-md-8">
            @if(isset($row->feild))
               @if($row->feild)
                  @foreach(json_decode($row->feild) as $feild)
                        @include('Theme::feild/'.$feild)
                  @endforeach
               @endif
            @else
               Bạn chưa chọn trường cho hàng này
            @endif
     </div>
     {{-- kieu dang  --}}
     <div class="col-md-4">
         @include('Theme::inc/inc_row_input_right')
     </div>
  </div>