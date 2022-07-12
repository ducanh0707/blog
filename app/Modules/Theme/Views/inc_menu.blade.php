<ul class="list-group mt-2">
    <li class="list-group-item @if(Request::segment(3) == 'sidebar'){{'list-group-item-success'}} @endif">
       <a href="{{asset('admin/theme/sidebar/'.$sidebar_first_id)}}">Sửa sidebar</a>
    </li>
    <li class="list-group-item @if(Request::segment(3) == 'row'){{'list-group-item-success'}} @endif">
       <a href="{{asset('admin/theme/row/'.$row_first_id)}}">Sửa trang chủ</a>
    </li>
    {{-- <li class="list-group-item @if(Request::segment(3) == 'cat'){{'list-group-item-success'}} @endif">
       <a href="{{asset('admin/theme/cat')}}">Sửa trang danh mục</a>
    </li>
    <li class="list-group-item @if(Request::segment(3) == 'post'){{'list-group-item-success'}} @endif">
       <a href="{{asset('admin/theme/post')}}">Sửa trang bài viết</a>
    </li> --}}
    {{-- <li class="list-group-item @if(Request::segment(3) == 'style'){{'list-group-item-success'}} @endif">
       <a href="{{asset('admin/theme/style')}}">Sửa giao diện</a>
    </li> --}}
    <li class="list-group-item @if(Request::segment(3) == 'info'){{'list-group-item-success'}} @endif">
       <a href="{{asset('admin/theme/info')}}">Cài đặt website</a>
    </li>
 </ul>