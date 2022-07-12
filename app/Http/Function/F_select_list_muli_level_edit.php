<?php

//hien thi select list da cap cap dung trog them moi list
function F_select_list_muli_level_edit($data,$list,$parent = 0,$str = ""){
   foreach ($data as $val){
      $id_list = $val["id"]; 
      if($val["parent_id"] == $parent){
?>
      <option value="<?php echo $id_list;  ?>" <?php if(isset($list -> id)){if($list -> id == $id_list){echo 'selected ';}} ?>>
      	<?php 
            echo $str;
            echo $val-> name;
         ?>
      </option>  
<?php
      F_select_list_muli_level_edit($data,$list,$id_list,$str."&nbsp--- ");

      }//end if parent
   }//end foreach data
}//end funcito
