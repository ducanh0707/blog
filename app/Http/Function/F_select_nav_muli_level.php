<?php

//hien thi select nav da cap cap dung trog them moi nav
function F_select_nav_muli_level($data,$parent = 0,$str = ""){
   foreach ($data as $key => $val){
      $id_nav = $val -> id; 
      $name = $val -> name;
      $type_nav  = $val -> theme_menu_type;
      if($val -> parent_id == $parent){
?>
      <option value="<?php echo $id_nav ?>">
      	<?php 
            echo $str;
            echo $name;
         ?>
      </option>  
<?php
         F_select_nav_muli_level($data, $id_nav,$str."&nbsp--- ");
      }//end if parent
   }//end foreach data
}//end funcito
