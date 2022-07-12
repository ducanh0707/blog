<?php

//hien thi o bang danh sach menu
function FF_nav_multi_level($menu, $parent = 0,$sub=0){
   if(Session::get('lang') != 'vi'){
      $name = 'name_'.Session::get('lang');
   }else{
      $name =  'name';
   }
   if(isset($menu)){
      foreach ($menu as $key => $val){
         $id_nav = $val->id;
         if($parent == $val->parent_id){
?>
            <li id="<?php echo $val->id_li ?>" class="<?php if(count($val ->f_parent) > 0){echo 'dropdown-item';}else{echo 'nav-item ';} echo $val-> class_li; if(count($val ->f_child) > 0){echo ' dropdown';}?>">
                <a href="<?php echo asset(Session::get('lang').'/'.$val->url) ?>" id="<?php if(count($val ->f_child) > 0){echo 'dropdown'.$val->id;} ?>" class="nav-link <?php echo $val-> class_a;if(count($val ->f_child) > 0){echo 'dropdown-toggle';} ?>" <?php if(count($val ->f_child) > 0){echo 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';} echo $val->attri; ?> >
                    <?php if($val-> icon != ''){echo $val-> icon.' ';} if($val->  img != ''){echo '<img src="'.asset('source/menu/'.$val->img).'" > ';}  echo $val ->{$name} ?>
                </a>
                <?php
                    if(count($val ->f_child) > 0){
                    ?>
                        <ul class="dropdown-menu" aria-labelledby="<?php if(count($val ->f_child) > 0){echo 'dropdown'.$val->id;} ?>">
                            <?php echo FF_nav_multi_level($menu,$id_nav,$sub++) ?>
                        </ul>
                    <?php
                    }
                ?>
            </li>
<?php
         }
      }//end if parent
   }//end foreach data
}//end 

function FF_nav_list($menu, $parent = 0,$sub=0){
   if(isset($menu)){
      foreach ($menu as $key => $val){
?>
         <li id="<?php echo $val->id_li ?>" class="<?php echo $val-> class_li; ?>">
            <a href="<?php echo asset(Session::get('lang').'/'.$val->url) ?>" id="<?php echo $val-> id_a;?>" class="<?php echo $val-> class_a;?>">
               <?php if($val-> icon != ''){echo $val-> icon.' ';}
                  if($val->{'name_'.Session::get('lang')} != ''){ echo $val->{'name_'.Session::get('lang') };}else{echo $val->name;}
               ?>
            </a>
         </li>
<?php
      }//end if parent
   }//end foreach data
}//end 
