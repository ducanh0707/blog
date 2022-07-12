<?php

//hien thi select list da cap cap dung trog them moi list
function F_select_list_muli_level($data,$parent = 0,$str = ""){
   foreach ($data as $key => $val){
      $id_list = $val["id"]; 
      $name = $val["name"];
      $type_list  = $val["list_type"];
      if($val["parent_id"] == $parent){
?>
      <option value="<?php echo $id_list ?>">
      	<?php 
            echo $str;
            echo $val-> name;
         ?>
      </option>  
<?php
         F_select_list_muli_level($data, $id_list,$str."&nbsp--- ");
      }//end if parent
   }//end foreach data
}//end funcito
