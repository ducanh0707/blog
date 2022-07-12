<div class="sidebar_menu_{{$sidebar_r->id}}">
    <div class="sidebar_title">
        <h5>
            <?php if($sidebar_r->{'name_'.Session::get('lang')} != ''){ echo $sidebar_r->{'name_'.Session::get('lang') };}else{echo $sidebar_r->name;} ?>
        </h5>
    </div>
    <div class="sidebar_menu_ul">
        <ul class="menu_sidebar_{{$sidebar_r->id}}">
            {{FF_nav_list($sidebar_r->f_menu_type->f_menu)}}
        </ul>
    </div>
</div>
