   <div class="col-md-12">
     <!-- thong bao thanh cong -->
     @if(session('alert'))
       <div class="alert alert-success">
         {{session('alert')}}
       </div>
     @endif
     @if(session('alert_error'))
       <div class="alert alert-danger">
         {{session('alert_error')}}
       </div>
     @endif
     <!-- thong bao loi -->
     @if(count($errors) > 0)
        <div class="alert alert-danger">
           @foreach($errors -> all () as $errors_r)
              {{$errors_r}} <br>
           @endforeach
        </div>
     @endif
   </div>
