<?php

//hien thi select menu da cap cap dung trog them moi menu
function F_select_menu_muli_level_edit($data,$menu,$parent = 0,$str = "", $disa = ""){
   foreach ($data as $val){
      $id_menu = $val["id"]; 
      $type_menu  = $val["menu_type"];
      if($val["parent_id"] == $parent){
?>
      <option value="<?php echo $id_menu ?>" <?php if($menu -> parent_id == $id_menu){echo 'selected ';} echo $disa;  if($menu->id  == $id_menu){ echo 'disabled';}  ?>>
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
         if($menu->id  == $id_menu){
           F_select_menu_muli_level_edit($data,$menu, $id_menu, $str."&nbsp--- ", $disa."disabled");
            }
         else{
           F_select_menu_muli_level_edit($data,$menu,$id_menu,$str."&nbsp--- ", $disa);
         }

      }//end if parent
   }//end foreach data
}//end funcito
