<?php 
   function F_select_list_post($meta){
      $list = App\Http\Model\M_list::where('parent_id',$meta ->list_id)->get();
      foreach($list as $list_r){
   ?>
      <option value="<?php echo $list_r  ->id ?>"><?php echo $list_r -> name ?></option>
   <?php
   }
}
function F_radio_list_post($meta){
   $list = App\Http\Model\M_list::where('parent_id',$meta -> list_id)->get();
   foreach($list as $list_r){
?>
   <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" name="meta_text[<?php echo  $meta -> id ?>]" id="meta_<?php echo  $meta -> id ?>_<?php echo  $list_r ->id ?>" value="<?php echo  $list_r ->id ?>" class="custom-control-input <?php echo  $list_r -> css_class ?>" <?php echo  $list_r -> vali ?> <?php echo  $list_r -> required ?> >
      <label class="custom-control-label" for="meta_<?php echo  $meta -> id ?>_<?php echo  $list_r ->id ?>"><?php echo  $list_r -> name ?></label>
   </div>
   <?php
   }
}

function F_checkbox_list_post($meta){
   $list = App\Http\Model\M_list::where('parent_id',$meta -> list_id)->get();
   foreach($list as $list_r){
?>
   <label class="ml-2">
      <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
         <input type="checkbox" class="minimal" name="meta_text[<?php echo $meta -> id ?>][]" value="<?php echo $list_r ->id ?>">
         <?php echo $list_r -> name ?>
      </div>
   </label>
   <?php
   }
}

///chinh sua 
   function F_select_list_post_edit($meta,$post){
      $list = App\Http\Model\M_list::where('parent_id',$meta ->list_id)->get();
      $value = App\Http\Model\M_post_value::where('meta_id',$meta ->id)->where('post_id',$post -> id)->first();
      foreach($list as $list_r){
   ?>
      <option value="<?php echo $list_r  ->id ; ?>" <?php if(isset($value)){if($value -> value == $list_r  ->id){ echo 'selected'; }} ?>><?php echo $list_r -> name ?></option>
   <?php
   }
}

function F_radio_list_post_edit($meta,$post){
   $list = App\Http\Model\M_list::where('parent_id',$meta -> list_id)->get();
   $value = App\Http\Model\M_post_value::where('meta_id',$meta ->id)->where('post_id',$post -> id)->first();
   foreach($list as $list_r){
?>
   <div class="custom-control custom-radio custom-control-inline">
      <input type="radio"  name="meta_text[<?php echo  $meta -> id ?>]" <?php if(isset($value)){if($value -> value == $list_r -> id){echo 'checked';}} ?> id="meta_<?php echo  $list_r -> id ?>_<?php echo  $list_r ->id ?>" value="<?php echo  $list_r ->id ?>" class="custom-control-input <?php echo  $list_r -> css_class ?>" <?php echo  $list_r -> vali ?> <?php echo  $list_r -> required ?> >
      <label class="custom-control-label" for="meta_<?php echo  $list_r -> id ?>_<?php echo  $list_r ->id ?>"><?php echo  $list_r -> name ?></label>
   </div>
   <?php
   }
}

function F_checkbox_list_post_edit($meta,$post){
   $list = App\Http\Model\M_list::where('parent_id',$meta -> list_id)->get();
   $value = App\Http\Model\M_post_value::where('meta_id',$meta ->id)->where('post_id',$post -> id)->first();
   foreach($list as $list_r){
?>
   <label class="ml-2">
      <div class="icheckbox_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
         <input type="checkbox" class="minimal" name="meta_text[<?php echo $meta -> id ?>][]"  <?php if(isset($value)){foreach(json_decode($value -> value) as $val){if($val == $list_r -> id){echo 'checked';}}} ?> value="<?php echo $list_r ->id ?>">
         <?php echo $list_r -> name ?>
      </div>
   </label>
   <?php
   }
}