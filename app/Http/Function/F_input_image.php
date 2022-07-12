function F_input_image($value,$name,$id,$folder){
   ?>
      <div id="img-current_bg<?php echo $id ?>">
         <div class="button-del_bg" id="button-del_bg-<?php echo $id ?>">
            <i class="fa fa-times-circle"></i>
         </div>
         <?php if($value != " "){ ?>
            <img width="138px" id="img-preview<?php echo $id ?>" src="<?php echo $folder.'/'.$value ?>"/>
         <?php } ?>
      </div>
      <div class="">
         <input type="file" name="<?php echo $name ?>" id="file_img<?php echo $id ?>">
         <input type="hidden" name="del_img_bg" id="del_img_bg_<?php echo $id ?>">
      </div>
      <script>
         function readURL<?php echo $id ?>(input) {
            if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                  $('#img-preview<?php echo $id ?>').attr('src', e.target.result);
               }
               reader.readAsDataURL(input.files[0]);
            }
         }
         var meta_val = '<?php echo $value ?>';
         if(meta_val == ''){
            $('#img-current_bg<?php echo $id ?>').css('display','none');
            $('#button-del_bg-<?php echo $id ?>').css('display','none');
         }
         $("#file_img<?php echo $id ?>").change(function() {
            readURL<?php echo $id ?>(this);
            $('#button-del_bg-<?php echo $id ?>').css('display','block');
            $('#img-current_bg<?php echo $id ?>').css('display','unset');
         });
         // js xoa anh va chen value on vao input delimg
         $("#button-del_bg-<?php echo $id ?>").click(function(){
            // anh div hinh anh
            $('#img-current_bg<?php echo $id ?>').css('display','none');
            $('#del_img_bg_<?php echo $id ?>').attr('value','del_img_bg');
         });
      </script>
   <?php
}