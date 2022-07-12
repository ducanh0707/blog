
<div class="container">
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            {{FF_nav_multi_level_a($row->f_menu)}}
            <?php
                $url_ex = explode('/',request()->path());
            
                if(count($url_ex) == 1){
                    $url = '/home';
                }else{
                    $url =  substr(request()->path(),2);
                }
            ?>

            <a href="{{asset('changeLanguage/vi'.$url)}}" id="" class="p-2 link-secondary">
                <img src="{{asset('upload/theme/vietnam.png')}}"> Tiếng Việt
            </a>
            <a href="{{asset('changeLanguage/en'.$url)}}" id="" class="p-2 link-secondary">
                <img src="{{asset('upload/theme/english.png')}}"> English
            </a>
        </nav>
    </div>
</div>
<style>
    .link-secondary{
        font-family: '';
        font-size: 14px;
        text-transform: uppercase;
        font-weight: bold;
        color: #333;
        margin: 2px 5px;
    }
    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }
    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
</style>