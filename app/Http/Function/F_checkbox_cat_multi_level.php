<?php
function F_checkbox_cat_multi_level($cat,$post, $parent = 0,$str = ""){
      foreach ($cat as $key => $val){
         $name = $val["name"];
         if($val["parent_id"] == $parent){

?>   
        <div class="form-check">
            <?php echo $str; ?>
            <input <?php if(isset($post->f_cat)){foreach($post->f_cat as $cat_id){ if($cat_id->id == $val -> id){echo 'checked';}}} ?>
               type="checkbox" 
               class="form-check-input" 
               id="for-<?php echo $val -> id ?>" 
               value="<?php echo$val -> id ?>" 
               name="cat[]">
            <label class="form-check-label" for="for-<?php echo$val -> id ?>" style="font-weight: unset !important;"><?php echo $name; ?></label>
         </div>   
<?php  
            F_checkbox_cat_multi_level($cat,$post, $val -> id,$str."&nbsp&nbsp&nbsp&nbsp");
         } //endif parent
      }// end foreach
   }//end funcition
