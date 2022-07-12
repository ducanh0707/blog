<?php 


//new
function F_select_cat_multi_level($data,$parent = 0,$str = ""){
    foreach ($data as $key => $val){
      $id_cat = $val -> id; 
      $name = $val -> name;
      if($val -> parent_id == $parent){
?>
      <option value="<?php echo $id_cat ?>"><?php echo '--'.$str.$name ?></option>
<?php
         F_select_cat_multi_level($data, $id_cat,$str."--- ");
      }//end if parent
   }//end foreach data
}//end funciton

function F_select_cat_in_menu($data,$parent = 0,$str = ""){
   foreach ($data as $key => $val){
     $id_cat = $val -> id; 
     $name = $val -> name;
     if($val -> parent_id == $parent){
?>
     <option data-name="<?php echo $val->name ?>" value="<?php echo $val->url  ?>"><?php echo '--'.$str.$name ?></option>
<?php
        F_select_cat_in_menu($data, $id_cat,$str."--- ");
     }//end if parent
  }//end foreach data
}//end funciton

function F_select_cat_edit_in_row($data,$cat,$parent = 0,$str = ""){
   foreach ($data as $key => $val){
      $id_cat = $val -> id; 
      $name = $val -> name;
      if($val -> parent_id == $parent){
?>
   <option value="<?php echo $id_cat ?>" <?php if($cat == $id_cat){echo 'selected ';} ?>><?php echo $str.$name ?></option>
<?php
      F_select_cat_edit_in_row($data,$cat, $id_cat,$str."--- ");
      
   }//end if parent
}//end foreach data
}//end funcito



//edit
function F_select_cat_multi_level_EDIT($data,$cat,$val_current,$parent = 0,$str = ""){
      foreach ($data as $key => $val){
         $id_cat = $val -> id; 
         $name = $val -> name;
         if($val -> parent_id == $parent){
         if(count($val_current->f_child) >0){
            $id_arr = $val_current->f_child->pluck('id')->toArray();
         }else{
            $id_arr = array();
         }         
?>
      <option value="<?php echo $id_cat ?>" <?php if($cat == $id_cat){echo 'selected '; }  if(is_array($id_arr)){ if(in_array($id_cat,$id_arr)){ echo ' disabled';}}?>><?php echo $str.$name ?></option>
<?php
      if($id_cat == $cat){
         F_select_cat_multi_level_EDIT($data,$cat,$val_current, $id_cat,$str."--- ");
      }
      else{
         F_select_cat_multi_level_EDIT($data,$cat,$val_current, $id_cat,$str."--- ");
      }
         
      }//end if parent
   }//end foreach data
}//end funcito