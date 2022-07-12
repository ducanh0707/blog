<header class="main-header">
    <!-- Logo -->
    <a href="{{asset('')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
         <img src="{{asset('upload/theme/icon.png')}}" height="30px">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
         <img src="{{asset('upload/theme/logo-top.png')}}" height="30px">
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
         <nav class="my-2 my-md-0 mr-md-3">
            <div class="btn-group px-2">
               @if(isset($web_id))
                  <a class="mx-2 text-white" href="{{'http://'.$web->domain}}" target="_blank">
                     {{$web->domain}}
                  </a>
                  <a class="text-white">
                     {{$web->f_user -> email}}
                  </a>
               @endif
            </div>
            <div class="btn-group px-2">
               @if(Auth::user()->user_type_id == 1 or Auth::user()->user_type_id == 2)
                  <a href="#" class="text-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class=" fa fa-bell"></i> {{count(Auth::user()->f_user_noti)}}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                     @foreach(Auth::user()->f_user_noti as $_noti_r)
                        <a href="@if($_noti_r->type == 'form') {{asset('admin/regis/'.$_noti_r->form_id.'/info')}} @endif" class="dropdown-item text-sm" id="alert_{{$_noti_r->id}}">
                           <?php echo html_entity_decode($_noti_r->noti) ?>
                        </a>
                     @endforeach
                  </div>
               @else
                  @if(isset($web_id))
                     <?php
                        $web = App\Http\Model\M_domain::where('id',$web_id)->first();
                        $user_noti = DB::connection($web -> data)->table('user_noti')->where('view','off')->get();
                     ?>
                     <a href="#" class="text-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class=" fa fa-bell"></i> {{count($user_noti)}}
                     </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        @if(count($user_noti) >0)
                           @foreach($user_noti as $_noti_r)
                              <a href="@if($_noti_r->type == 'form') {{asset('admin/web/'.$web_id.'/form/'.$_noti_r->form_id.'/contact')}} @endif" class="dropdown-item text-sm" id="alert_{{$_noti_r->id}}">
                                 <?php echo html_entity_decode($_noti_r->noti) ?>
                              </a>
                           @endforeach
                        @else 
                           <a class="dropdown-item text-sm">
                              Trống
                           </a>   
                        @endif
                     </div>
                  @endif
               @endif
            </div>
            <!-- user -->
            <div class="btn-group px-2">
               @if(Auth::user()->avatar !='')
                  <img class="mr-2" height="20px" src="{{asset('upload/user/'.Auth::user()->avatar)}}"> 
               @endif
               <a href="#" class="text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo Auth::user()->name ?>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                 
                  <a href="" class="dropdown-item">Cá nhân</a>
                  <a href="{{asset('admin/logout')}}" class="dropdown-item">Thoát</a>
               </div>
               
            </div>
         </nav>
      </div>
    </nav>
</header>