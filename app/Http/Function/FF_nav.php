<?php

//hien thi o bang danh sach menu
function FF_nav_multi_level_a($menu, $parent = 0,$sub=0){
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
                <a href="<?php echo asset(Session::get('lang').'/'.$val->url) ?>" id="<?php if(count($val ->f_child) > 0){echo 'dropdown'.$val->id;} ?>" class="p-2 link-secondary <?php echo $val-> class_a;if(count($val ->f_child) > 0){echo 'dropdown-toggle';} ?>" <?php if(count($val ->f_child) > 0){echo 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';} echo $val->attri; ?> >
                    <?php if($val-> icon != ''){echo $val-> icon.' ';} if($val->  img != ''){echo '<img src="'.asset('source/menu/'.$val->img).'" > ';}  echo $val ->{$name} ?>
                </a>
                <?php
                    if(count($val ->f_child) > 0){
                        echo '<div class="submenu">';
                            echo '<div class="container">';
                                echo '<div class="row justify-content-center">';
                                    foreach($val ->f_child as $submenu){
                                        echo '<div class="col-md-3">';
                                            echo '<div class="col-sub mt-3 pt-3">';
                                                echo '<div class="col-sub-title  font-weight-bold py-2">';
                                                    echo '<a href="'.asset(Session::get('lang').'/'.$submenu->url).'">';
                                                      
                                                        echo  $submenu->{$name};
                                                    echo '</a>';
                                                echo '</div>';
                                                echo '<div class="col-sub-product">';
                                                    foreach($submenu->f_child as $product){
                                                        echo '<div class=" py-1">';
                                                            echo '<a href="'.asset(Session::get('lang').'/'.$product->url).'" class="text-dark">';
                                                                echo $product->{$name};
                                                            echo '</a>';
                                                        echo '</div>';
                                                    }
                                                    
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
           
<?php
         }
      }//end if parent
   }//end foreach data
}//end 
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
                        echo '<div class="submenu">';
                            echo '<div class="container">';
                                echo '<div class="row justify-content-center">';
                                    foreach($val ->f_child as $submenu){
                                        echo '<div class="col-md-3">';
                                            echo '<div class="col-sub mt-3 pt-3">';
                                                echo '<div class="col-sub-title  font-weight-bold py-2">';
                                                    echo '<a href="'.asset(Session::get('lang').'/'.$submenu->url).'">';
                                                      
                                                        echo  $submenu->{$name};
                                                    echo '</a>';
                                                echo '</div>';
                                                echo '<div class="col-sub-product">';
                                                    foreach($submenu->f_child as $product){
                                                        echo '<div class=" py-1">';
                                                            echo '<a href="'.asset(Session::get('lang').'/'.$product->url).'" class="text-dark">';
                                                                echo $product->{$name};
                                                            echo '</a>';
                                                        echo '</div>';
                                                    }
                                                    
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
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
