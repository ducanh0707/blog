<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
         <!-- trang chu -->
            <li class="<?php if(Request::segment(2) == 'dashboard'){echo 'active';} ?>">
               <a href="{{asset('admin/dashboard')}}">
                  <i class="fa fa-home"></i> <span>Trang chủ</span>
               </a>
            </li>
            
            @can('post_view')
               @foreach($_post_type as $post_type_r)
                  <li class="<?php if(Request::segment(4) == 'post'){echo 'active';} ?>">
                     <a href="{{asset('admin/post/'.$post_type_r -> url)}}">
                        <?php echo html_entity_decode($post_type_r->icon) ?> <span>{{$post_type_r -> name}}</span>
                     </a>
                  </li>
               @endforeach
            @endcan
           
            @can('cat_view')
               <li class="<?php if(Request::segment(4) == 'cat'){echo 'active';} ?>">
                  <a href="{{asset('admin/cat')}}">
                     <i class="fab fa-buffer"></i> <span>Danh mục</span>
                  </a>
               </li>
            @endcan 
            @can('order_view')
               <li class="<?php if(Request::segment(4) == 'order'){echo 'active';} ?>">
                  <a href="{{asset('admin/order')}}">
                     <i class="fas fa-file-invoice-dollar"></i> <span>Đơn hàng</span>
                  </a>
               </li>
            @endcan    

            @can('admin_user_view')
               <li class="<?php if(Request::segment(2) == 'user'){echo 'active';} ?>">
                  <a href="{{asset('admin/user/')}}">
                     <i class="fa fa-user"></i> <span>Thành viên</span>
                  </a>
               </li>
            @endcan

            <li class="treeview <?php if( Request::segment(2) == 'gift'){echo 'active';} ?>">
               <a href="#">
                  <i class="fa fa-palette"></i> <span>Giao diện website</span>
                  <span class="pull-right-container"><i class="fa fa-arrow-circle-down pull-right"></i></span>
               </a>
               <ul class="treeview-menu">
                  @can('theme_view')
                     <li class="<?php if(Request::segment(4) == 'theme'){echo 'active';} ?>">
                        <a href="{{asset('admin/theme/info')}}">
                           <i class="fa fa-palette text-danger"></i> <span>Sửa giao diện</span>
                        </a>
                     </li>
                  @endcan
                  @can('menu_view')
                     <li class="<?php if(Request::segment(4) == 'menu'){echo 'active';} ?>">
                        <a href="{{asset('admin/menu/0')}}">
                           <i class="fa fa-list"></i> <span>Menu</span>
                        </a>
                     </li>
                  @endcan   
                  @can('slide_view')
                     <li class="<?php if(Request::segment(4) == 'slide'){echo 'active';} ?>">
                        <a href="{{asset('admin/slide')}}">
                           <i class="fa fa-photo-video"></i> <span>Slide</span>
                        </a>
                     </li>
                  @endcan   
                  @can('button_ring_view')
                     <li class="<?php if(Request::segment(4) == 'button_ring'){echo 'active';} ?>">
                        <a href="{{asset('admin/button_ring')}}">
                           <i class="fa fa-satellite-dish"></i> <span>Nút bấm liên hệ</span>
                        </a>
                     </li>
                  @endcan
                  @can('popup_view')
                     <li class="<?php if(Request::segment(4) == 'popup'){echo 'active';} ?>">
                        <a href="{{asset('admin/popup')}}">
                           <i class="fa fa-clone"></i> <span>Popup tự động</span>
                        </a>
                     </li>
                  @endcan
               </ul>
            </li>



            <li class="treeview <?php if(Request::segment(2) == 'post_type' or  Request::segment(2) == 'file' or Request::segment(2) == 'tab' or Request::segment(2) == 'popup_regis' or Request::segment(2) == 'popup' or Request::segment(2) == 'button_ring'){echo 'active';} ?>">
               <a href="#">
                  <i class="fa fa-cog"></i> <span>Chức năng website</span>
                  <span class="pull-right-container"><i class="fa fa-arrow-circle-down pull-right"></i></span>
               </a>
               <ul class="treeview-menu">
                  
                  @can('popup_regis_view')
                     <li class="<?php if(Request::segment(4) == 'popup_regis'){echo 'active';} ?>">
                        <a href="{{asset('admin/popup_regis')}}">
                           <i class="fa fa-comment-alt"></i> <span>Popup khách hàng</span>
                        </a>
                     </li>
                  @endcan
                  @can('tab_view')
                     <li class="<?php if(Request::segment(4) == 'tab'){echo 'active';} ?>">
                        <a href="{{asset('admin/tab')}}">
                           <i class="fa fa-indent"></i> <span>Tab nội dung</span>
                        </a>
                     </li>
                  @endcan 
                  
                  @can('post_type_view')
                     <li class="<?php if(Request::segment(4) == 'post_type'){echo 'active';} ?>">
                        <a href="{{asset('admin/post_type')}}">
                           <i class="fa fa-folder-plus"></i> <span>Thể loại post</span>
                        </a>
                     </li>
                  @endcan
                 
               </ul>
            </li>
         
      </ul>
   </section>
</aside>
