<?php 

///chinh sua 
   function F_select_list_theme_edit($meta,$theme){
      $list = App\Http\Model\M_list::where('parent_id',$meta ->list_id)->get();
      $value = App\Http\Model\M_theme_meta::where('id',$meta ->id)->where('theme_id',$theme -> id)->first();
      foreach($list as $list_r){
   ?>
      <option value="<?php echo $list_r  ->id ; ?>" <?php if(isset($value)){if($value -> val == $list_r  ->id){ echo 'selected'; }} ?>><?php echo $list_r -> name ?></option>
   <?php
   }
}

function F_radio_list_theme_edit($meta,$theme){
   $list = App\Http\Model\M_list::where('parent_id',$meta -> list_id)->get();
   $value = App\Http\Model\M_theme_meta::where('id',$meta ->id)->where('theme_id',$theme -> id)->first();
   foreach($list as $list_r){
?>
   <div class="custom-control custom-radio custom-control-inline">
      <input type="radio"  name="meta_text[<?php echo  $meta -> id ?>]" <?php if(isset($value)){if($value -> val== $list_r -> id){echo 'checked';}} ?> id="meta_<?php echo  $list_r -> id ?>_<?php echo  $list_r ->id ?>" value="<?php echo  $list_r ->id ?>" class="custom-control-input <?php echo  $list_r -> css_class ?>" <?php echo  $list_r -> vali ?> <?php echo  $list_r -> required ?> >
      <label class="custom-control-label" for="meta_<?php echo  $list_r -> id ?>_<?php echo  $list_r ->id ?>"><?php echo  $list_r -> name ?></label>
   </div>
   <?php
   }
}

function F_checkbox_list_theme_edit($meta,$theme){
   $list = App\Http\Model\M_list::where('parent_id',$meta -> list_id)->get();
   $value = App\Http\Model\M_theme_meta::where('id',$meta ->id)->where('theme_id',$theme -> id)->first();
   foreach($list as $list_r){
?>
   <label class="ml-2">
      <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
         <input type="checkbox" class="minimal" name="meta_array[<?php echo $meta -> id ?>][]"  <?php if($value -> val != ''){foreach(json_decode($value -> val) as $val){if($val == $list_r -> id){echo 'checked';}}} ?> value="<?php echo $list_r ->id ?>">
         <?php echo $list_r -> name ?>
      </div>
   </label>
   <?php
   }
}