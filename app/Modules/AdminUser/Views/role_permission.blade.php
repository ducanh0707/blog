@extends('V_backend.index')
@section('content')
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Danh sách quyền
         <a href="{{asset('admin/user')}}" class="btn btn-light btn-sm">Quay lại</a>
      </h1>

    </section>
      @include('V_backend/alert')
   <!-- Main content -->
   <section class="content">
      <div class="box">
         <div class="box-body p-4">
 
            {{-- web  --}}
            <div class="row mt-4">
               <ul class="list-group">
                  @if($permission -> count() != 0)
                  @php $i = 0; @endphp
                     @foreach($permission as $key => $val)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                 {{$val -> title}}
                                 <span class="ml-3 cursor">
                                    @if(isset($val -> f_role ->where('type_id',$user_type_id)-> first()->id))
                                       @if($val -> f_role ->where('type_id',$user_type_id)-> first()->id)
                                          <a id="a-{{$val->id}}" class="on" onclick="permission({{$val->id}},'web')">
                                             <i id="permi_{{$val ->id}}" class="fa fa-toggle-on text-success"></i>
                                          </a>
                                       @endif
                                    @else
                                       <a id="a-{{$val->id}}" class="off" onclick="permission({{$val->id,'web'}})" >
                                          <i id="permi_{{$val ->id}}" class="fa fa-toggle-off text-dark"></i>
                                       </a>
                                    @endif
                                 </span>
                              
                              <script>
                                 function permission(id,type)
                                 {
                                    let a = $('#a-' + id);
                                    let status = a.attr('class');
                                    console.log(status);
                                    if(status == 'on'){
                                       $('#permi_' + id).attr('class', 'fa fa-toggle-off text-dark');
                                       a.removeClass('on');
                                       a.attr('class', 'off');
                                    }else{
                                       $('#permi_'+ id).attr('class', 'fa fa-toggle-on text-success');
                                       a.removeClass('off');
                                       a.attr('class', 'on');
                                    }
                                    $.get("{{asset('')}}"+"admin/user/role/{{$user_type_id}}/permission/add/"+id+"/"+type);
                                 }
                              </script>
                        </li>
                        @php $i++; @endphp
                        @if($i % 10 == 0 && $i != count($permission)) </ul><ul> @endif
                     @endforeach
                  @endif
                  
               </ul>
            </div>

            
         </div>
      </div>

   </section>
</div>
@endsection