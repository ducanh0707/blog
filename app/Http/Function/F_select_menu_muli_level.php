<?php

//hien thi select menu da cap cap dung trog them moi menu
function F_select_menu_muli_level($data,$parent = 0,$str = ""){
   foreach ($data as $key => $val){
      $id_menu = $val["id"]; 
      $name = $val["name"];
      $type_menu  = $val["menu_type"];
      if($val["parent_id"] == $parent){
?>
      <option value="<?php echo $id_menu ?>">
      	<?php 
            echo $str;
            if($type_menu == 'cat'){
               echo $val-> f_cat -> name;
            }elseif($type_menu == 'custome'){
               echo $val-> name;
            }elseif($type_menu == 'post'){
                if($val-> name != ''){
                  echo $val-> name;
               }else{
                  echo $val-> f_post -> title;
               }
            }
         ?>
      </option>  
<?php
         F_select_menu_muli_level($data, $id_menu,$str."&nbsp--- ");
      }//end if parent
   }//end foreach data
}//end funcito
