<?php 
//hien thi input 
function F_input_basic($type,$value,$name,$id,$class,$att,$place){
   echo '<input type="'.$type.'" value="'.$value.'" name="'.$name.'" '.(($id != '')? 'id="'.$id.'"':'').' class="'.$class.'" placeholder="'.$place.'"  '.$att.'>';
}

// hien thi textarea 
function F_input_textarea($value,$name,$id,$class,$att,$place){
   echo '<textarea  name="'.$name.'" id="'.$id.'" class="'.$class.'" placeholder="'.$place.'"  '.$att.'>'.$value.'</textarea>';
}

//hien thi mau sac
function F_input_color($value,$name,$id,$class,$att){
   ?>
      <div class="input-group">
         <div class="input-group-prepend">
               <div class="input-group-text" style="background-color:<?php echo $value ?>" id="review_<?php echo $id ?>"> </div>
         </div>
         <input type="text" value="<?php echo $value ?>" id="color_<?php echo $id ?>" onchange="ChangeColor<?php echo $id ?>()" class="<?php echo $class ?>" name="<?php echo $name ?>" autocomplete="off" <?php echo $att ?>>
      </div>
    
      <script>
         $('#color_<?php echo $id ?>').colorpicker()
         function ChangeColor<?php echo $id ?>(){
               document.getElementById("review_<?php echo $id ?>").style.backgroundColor = document.getElementById("color_<?php echo $id ?>").value;
               
         }
         
      </script>
   <?php
}
// '.(($id != '')? 'id="3232"':'').'
// kieu hiên thi 
function F_select_style($value,$name,$id,$class,$att){
   ?>
      <select class="<?php echo $class ?>" name="<?php echo $name ?>" <?php echo $att ?> id="new_basic">
         <option value="text" id="new_basic_text" <?php if($value == 'text'){ echo 'selected';} ?> >Text</option>
         <option value="textarea" <?php if($value == 'textarea'){ echo 'selected';} ?>>Textarea</option>
         <option value="editor" <?php if($value == 'editor'){ echo 'selected';} ?>>Editor</option>
         <option value="email" <?php if($value == 'email'){ echo 'selected';} ?>>Email</option>
         <option value="a" <?php if($value == 'a'){ echo 'selected';} ?>>Link</option>
         <option value="number" <?php if($value == 'number'){ echo 'selected';} ?>>Số</option>
         <option value="img" <?php if($value == 'img'){ echo 'selected';} ?>>Hình ảnh</option>
         <option value="video_youtube" <?php if($value == 'video_youtube'){ echo 'selected';} ?>>Video Yotube</option>
         <option value="checkbox" <?php if($value == 'checkbox'){ echo 'selected';} ?>>Checkbox</option>
         <option value="select" <?php if($value == 'select'){ echo 'selected';} ?>>Select</option>
         <option value="color" <?php if($value == 'color'){ echo 'selected';} ?>>Màu sắc</option>
         <option value="time" <?php if($value == 'time'){ echo 'selected';} ?>>Giờ</option>
         <option value="date" <?php if($value == 'date'){ echo 'selected';} ?>>Ngày</option>
         <option value="money" <?php if($value == 'money'){ echo 'selected';} ?>>Tiền tệ</option>
         <option value="search" <?php if($value == 'search'){ echo 'selected';} ?>>Tìm kiếm</option>
      </select>

   <?php
}

function F_select_col_bootstrap($value,$name,$id,$class,$att,$display){
   ?>
      <select class="<?php echo $class ?>" id="<?php echo $id ?>" name="<?php echo $name ?>" <?php echo $att ?>>
            <option value="">Trống</option>
            <option value="<?php echo $display.'-12' ?>" <?php if($value == $display.'-12') { echo 'selected';} ?>>12/12 phần</option>
            <option value="<?php echo $display.'-11' ?>" <?php if($value == $display.'-11') { echo 'selected';} ?>>11/12 phần </option>
            <option value="<?php echo $display.'-10' ?>" <?php if($value == $display.'-10') { echo 'selected';} ?>>10/12 phần </option>
            <option value="<?php echo $display.'-9' ?>" <?php if($value == $display.'-9') { echo 'selected';} ?>>9/12 phần </option>
            <option value="<?php echo $display.'-8' ?>" <?php if($value == $display.'-8') { echo 'selected';} ?>>8/12 phần </option>
            <option value="<?php echo $display.'-7' ?>" <?php if($value == $display.'-7') { echo 'selected';} ?>>7/12 phần </option>
            <option value="<?php echo $display.'-6' ?>" <?php if($value == $display.'-6') { echo 'selected';} ?>>6/12 phần </option>
            <option value="<?php echo $display.'-5' ?>" <?php if($value == $display.'-5') { echo 'selected';} ?>>5/12 phần </option>
            <option value="<?php echo $display.'-4' ?>" <?php if($value == $display.'-4') { echo 'selected';} ?>>4/12 phần</option>
            <option value="<?php echo $display.'-3' ?>" <?php if($value == $display.'-3') { echo 'selected';} ?>>3/12 phần</option>
            <option value="<?php echo $display.'-2' ?>" <?php if($value == $display.'-2') { echo 'selected';} ?>>2/12 phần</option>
            <option value="<?php echo $display.'-1' ?>" <?php if($value == $display.'-1') { echo 'selected';} ?>>1/12 phần</option>
        </select>
   <?php
}
function F_select_effect($value,$name,$id,$class,$att){
   ?>
      <select class="<?php echo $class ?>" name="<?php echo $name ?>" <?php echo $att ?>>
       <option value="">Trống</option>
         <optgroup label="Gây chú ý (Attention Seekers)">
            <option value="bounce" <?php if($value == 'bounce') { echo 'selected';} ?>>bounce</option>
            <option value="flash" <?php if($value == 'flash') { echo 'selected';} ?>>flash</option>
            <option value="pulse" <?php if($value == 'pulse') { echo 'selected';} ?>>pulse</option>
            <option value="rubberBand" <?php if($value == 'rubberBand') { echo 'selected';} ?>>rubberBand</option>
            <option value="shake" <?php if($value == 'shake') { echo 'selected';} ?>>shake</option>
            <option value="swing" <?php if($value == 'swing') { echo 'selected';} ?>>swing</option>
            <option value="tada" <?php if($value == 'tada') { echo 'selected';} ?>>tada</option>
            <option value="wobble" <?php if($value == 'wobble') { echo 'selected';} ?>>wobble</option>
            <option value="jello" <?php if($value == 'jello') { echo 'selected';} ?>>jello</option>
            <option value="heartBeat" <?php if($value == 'heartBeat') { echo 'selected';} ?>>heartBeat</option>
         </optgroup>

         <optgroup label="Xuất hiện (Bouncing Entrances)">
            <option value="bounceIn" <?php if($value == 'bounceIn') { echo 'selected';} ?>>bounceIn</option>
            <option value="bounceInDown" <?php if($value == 'bounceInDown') { echo 'selected';} ?>>bounceInDown</option>
            <option value="bounceInLeft" <?php if($value == 'bounceInLeft') { echo 'selected';} ?>>bounceInLeft</option>
            <option value="bounceInRight" <?php if($value == 'bounceInRight') { echo 'selected';} ?>>bounceInRight</option>
            <option value="bounceInUp" <?php if($value == 'bounceInUp') { echo 'selected';} ?>>bounceInUp</option>
         </optgroup>

         <!-- <optgroup label="Ẩn đi (Bouncing Exits)">
            <option value="bounceOut" <?php if($value == 'bounceOut') { echo 'selected';} ?>>bounceOut</option>
            <option value="bounceOutDown" <?php if($value == 'bounceOutDown') { echo 'selected';} ?>>bounceOutDown</option>
            <option value="bounceOutLeft" <?php if($value == 'bounceOutLeft') { echo 'selected';} ?>>bounceOutLeft</option>
            <option value="bounceOutRight" <?php if($value == 'bounceOutRight') { echo 'selected';} ?>>bounceOutRight</option>
            <option value="bounceOutUp" <?php if($value == 'bounceOutUp') { echo 'selected';} ?>>bounceOutUp</option>
         </optgroup> -->

         <optgroup label="Xuất hiện rõ dần (Fading Entrances)">
            <option value="fadeIn" <?php if($value == 'fadeIn') { echo 'selected';} ?>>fadeIn</option>
            <option value="fadeInDown" <?php if($value == 'fadeInDown') { echo 'selected';} ?>>fadeInDown</option>
            <option value="fadeInDownBig" <?php if($value == 'fadeInDownBig') { echo 'selected';} ?>>fadeInDownBig</option>
            <option value="fadeInLeft" <?php if($value == 'fadeInLeft') { echo 'selected';} ?>>fadeInLeft</option>
            <option value="fadeInLeftBig" <?php if($value == 'fadeInLeftBig') { echo 'selected';} ?>>fadeInLeftBig</option>
            <option value="fadeInRight" <?php if($value == 'fadeInRight') { echo 'selected';} ?>>fadeInRight</option>
            <option value="fadeInRightBig" <?php if($value == 'fadeInRightBig') { echo 'selected';} ?>>fadeInRightBig</option>
            <option value="fadeInUp" <?php if($value == 'fadeInUp') { echo 'selected';} ?>>fadeInUp</option>
            <option value="fadeInUpBig" <?php if($value == 'fadeInUpBig') { echo 'selected';} ?>>fadeInUpBig</option>
         </optgroup>

         <!-- <optgroup label="Ẩn đi mờ hiện (Fading Exits)">
            <option value="fadeOut" <?php if($value == 'fadeOut') { echo 'selected';} ?>>fadeOut</option>
            <option value="fadeOutDown" <?php if($value == 'fadeOutDown') { echo 'selected';} ?>>fadeOutDown</option>
            <option value="fadeOutDownBig" <?php if($value == 'fadeOutDownBig') { echo 'selected';} ?>>fadeOutDownBig</option>
            <option value="fadeOutLeft" <?php if($value == 'fadeOutLeft') { echo 'selected';} ?>>fadeOutLeft</option>
            <option value="fadeOutLeftBig" <?php if($value == 'fadeOutLeftBig') { echo 'selected';} ?>>fadeOutLeftBig</option>
            <option value="fadeOutRight" <?php if($value == 'fadeOutRight') { echo 'selected';} ?>>fadeOutRight</option>
            <option value="fadeOutRightBig" <?php if($value == 'fadeOutRightBig') { echo 'selected';} ?>>fadeOutRightBig</option>
            <option value="fadeOutUp" <?php if($value == 'fadeOutUp') { echo 'selected';} ?>>fadeOutUp</option>
            <option value="fadeOutUpBig" <?php if($value == 'fadeOutUpBig') { echo 'selected';} ?>>fadeOutUpBig</option>
         </optgroup> -->

         <optgroup label="Lật mặt (Flippers)">
            <option value="flip" <?php if($value == 'flip') { echo 'selected';} ?>>flip</option>
            <option value="flipInX" <?php if($value == 'flipInX') { echo 'selected';} ?>>flipInX</option>
            <option value="flipInY" <?php if($value == 'flipInY') { echo 'selected';} ?>>flipInY</option>
            <option value="flipOutX" <?php if($value == 'flipOutX') { echo 'selected';} ?>>flipOutX</option>
            <option value="flipOutY" <?php if($value == 'flipOutY') { echo 'selected';} ?>>flipOutY</option>
         </optgroup>

         <optgroup label="Nghiêng (Lightspeed)">
            <option value="lightSpeedIn" <?php if($value == 'lightSpeedIn') { echo 'selected';} ?>>lightSpeedIn</option>
            <option value="lightSpeedOut" <?php if($value == 'lightSpeedOut') { echo 'selected';} ?>>lightSpeedOut</option>
         </optgroup>

         <optgroup label="Xuất hiện xoay (Rotating Entrances)">
            <option value="rotateIn" <?php if($value == 'rotateIn') { echo 'selected';} ?>>rotateIn</option>
            <option value="rotateInDownLeft" <?php if($value == 'rotateInDownLeft') { echo 'selected';} ?>>rotateInDownLeft</option>
            <option value="rotateInDownRight" <?php if($value == 'rotateInDownRight') { echo 'selected';} ?>>rotateInDownRight</option>
            <option value="rotateInUpLeft" <?php if($value == 'rotateInUpLeft') { echo 'selected';} ?>>rotateInUpLeft</option>
            <option value="rotateInUpRight" <?php if($value == 'rotateInUpRight') { echo 'selected';} ?>>rotateInUpRight</option>
         </optgroup>

         <!-- <optgroup label="Ẩn đi xoay (Rotating Exits)">
            <option value="rotateOut" <?php if($value == 'rotateOut') { echo 'selected';} ?>>rotateOut</option>
            <option value="rotateOutDownLeft" <?php if($value == 'rotateOutDownLeft') { echo 'selected';} ?>>rotateOutDownLeft</option>
            <option value="rotateOutDownRight" <?php if($value == 'rotateOutDownRight') { echo 'selected';} ?>>rotateOutDownRight</option>
            <option value="rotateOutUpLeft" <?php if($value == 'rotateOutUpLeft') { echo 'selected';} ?>>rotateOutUpLeft</option>
            <option value="rotateOutUpRight" <?php if($value == 'rotateOutUpRight') { echo 'selected';} ?>>rotateOutUpRight</option>
         </optgroup> -->

         <optgroup label="Xuất hiện trượt (Sliding Entrances)">
            <option value="slideInUp" <?php if($value == 'slideInUp') { echo 'selected';} ?>>slideInUp</option>
            <option value="slideInDown" <?php if($value == 'slideInDown') { echo 'selected';} ?>>slideInDown</option>
            <option value="slideInLeft" <?php if($value == 'slideInLeft') { echo 'selected';} ?>>slideInLeft</option>
            <option value="slideInRight" <?php if($value == 'slideInRight') { echo 'selected';} ?>>slideInRight</option>

         </optgroup>

         <!-- <optgroup label="Ẩn đi (Sliding Exits)">
            <option value="slideOutUp" <?php if($value == 'slideOutUp') { echo 'selected';} ?>>slideOutUp</option>
            <option value="slideOutDown" <?php if($value == 'slideOutDown') { echo 'selected';} ?>>slideOutDown</option>
            <option value="slideOutLeft" <?php if($value == 'slideOutLeft') { echo 'selected';} ?>>slideOutLeft</option>
            <option value="slideOutRight" <?php if($value == 'slideOutRight') { echo 'selected';} ?>>slideOutRight</option>
         </optgroup> -->
         
         <optgroup label="Xuất hiện phóng to (Zoom Entrances)">
            <option value="zoomIn" <?php if($value == 'zoomIn') { echo 'selected';} ?>>zoomIn</option>
            <option value="zoomInDown" <?php if($value == 'zoomInDown') { echo 'selected';} ?>>zoomInDown</option>
            <option value="zoomInLeft" <?php if($value == 'zoomInLeft') { echo 'selected';} ?>>zoomInLeft</option>
            <option value="zoomInRight" <?php if($value == 'zoomInRight') { echo 'selected';} ?>>zoomInRight</option>
            <option value="zoomInUp" <?php if($value == 'zoomInUp') { echo 'selected';} ?>>zoomInUp</option>
         </optgroup>
         
         <!-- <optgroup label="Ẩn đi (Zoom Exits)">
            <option value="zoomOut" <?php if($value == 'zoomOut') { echo 'selected';} ?>>zoomOut</option>
            <option value="zoomOutDown" <?php if($value == 'zoomOutDown') { echo 'selected';} ?>>zoomOutDown</option>
            <option value="zoomOutLeft" <?php if($value == 'zoomOutLeft') { echo 'selected';} ?>>zoomOutLeft</option>
            <option value="zoomOutRight" <?php if($value == 'zoomOutRight') { echo 'selected';} ?>>zoomOutRight</option>
            <option value="zoomOutUp" <?php if($value == 'zoomOutUp') { echo 'selected';} ?>>zoomOutUp</option>
         </optgroup> -->

         <optgroup label="Đặc biệt (Specials)">
            <option value="hinge" <?php if($value == 'hinge') { echo 'selected';} ?>>hinge</option>
            <option value="jackInTheBox" <?php if($value == 'jackInTheBox') { echo 'selected';} ?>>jackInTheBox</option>
            <option value="rollIn" <?php if($value == 'rollIn') { echo 'selected';} ?>>rollIn</option>
            <option value="rollOut" <?php if($value == 'rollOut') { echo 'selected';} ?>>rollOut</option>
         </optgroup>
      </select>
        
   <?php
}

// form upload anh
function F_input_image($value,$name,$id,$folder){
   ?>
      <div id="img-current<?php echo $id ?>">
         <div class="button-del" id="button-del-<?php echo $id ?>">
            <i class="fa fa-times-circle"></i>
         </div>
         <?php if($value != " "){ ?>
            <img width="138px" id="img-preview<?php echo $id ?>" src="<?php echo $folder.'/'.$value ?>"/>
         <?php } ?>
      </div>
      <div class="">
         <input type="file" name="<?php echo $name ?>" id="file_img<?php echo $id ?>">
         <input type="hidden" name="del_img" id="del_img_<?php echo $id ?>">
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
            $('#img-current<?php echo $id ?>').css('display','none');
            $('#button-del-<?php echo $id ?>').css('display','none');
         }
         $("#file_img<?php echo $id ?>").change(function() {
            readURL<?php echo $id ?>(this);
            $('#button-del-<?php echo $id ?>').css('display','block');
            $('#img-current<?php echo $id ?>').css('display','unset');
         });
         // js xoa anh va chen value on vao input delimg
         $("#button-del-<?php echo $id ?>").click(function(){
            // anh div hinh anh
            $('#img-current<?php echo $id ?>').css('display','none');
            $('#del_img_<?php echo $id ?>').attr('value','del_img');
         });
      </script>
   <?php
}


function F_input_image_2($value,$name,$id,$folder){
   ?>
      <div id="img-current_2<?php echo $id ?>">
         <div class="button-del_2" id="button-del_2-<?php echo $id ?>">
            <i class="fa fa-times-circle"></i>
         </div>
         <?php if($value != " "){ ?>
            <img width="138px" id="img-preview_2<?php echo $id ?>" src="<?php echo $folder.'/'.$value ?>"/>
         <?php } ?>
      </div>
      <div class="">
         <input type="file" name="<?php echo $name ?>" id="file_img_2<?php echo $id ?>">
         <input type="hidden" name="del_img_2" id="del_img_2_<?php echo $id ?>">
      </div>
      <script>
         function readURL<?php echo $id ?>(input) {
            if (input.files && input.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                  $('#img-preview_2<?php echo $id ?>').attr('src', e.target.result);
               }
               reader.readAsDataURL(input.files[0]);
            }
         }
         var meta_val = '<?php echo $value ?>';
         if(meta_val == ''){
            $('#img-current_2<?php echo $id ?>').css('display','none');
            $('#button-del_2-<?php echo $id ?>').css('display','none');
         }
         $("#file_img_2<?php echo $id ?>").change(function() {
            readURL<?php echo $id ?>(this);
            $('#button-del_2-<?php echo $id ?>').css('display','block');
            $('#img-current_2<?php echo $id ?>').css('display','unset');
         });
         // js xoa anh va chen value on vao input delimg
         $("#button-del_2-<?php echo $id ?>").click(function(){
            // anh div hinh anh
            $('#img-current_2<?php echo $id ?>').css('display','none');
            $('#del_img_2_<?php echo $id ?>').attr('value','del_img_2');
         });
      </script>
   <?php
}

function F_input_image_bg($value,$name,$id,$folder){
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


function F_input_image_admin($value,$name,$id,$folder){
   ?>
      <div id="img-current<?php echo $id ?>">
         <div class="button-del" id="button-del-<?php echo $id ?>">
            <i class="fa fa-times-circle"></i>
         </div>
         <?php if($value != " "){ ?>
            <img width="138px" id="img-preview<?php echo $id ?>" src="<?php echo $folder.'/'.$value ?>"/>
         <?php } ?>
      </div>
      <div class="">
         <input type="file" name="<?php echo $name ?>" id="file_img<?php echo $id ?>">
         <input type="hidden" name="del_img" id="del_img_<?php echo $id ?>">
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
            $('#img-current<?php echo $id ?>').css('display','none');
            $('#button-del-<?php echo $id ?>').css('display','none');
         }
         $("#file_img<?php echo $id ?>").change(function() {
            readURL<?php echo $id ?>(this);
            $('#button-del-<?php echo $id ?>').css('display','block');
            $('#img-current<?php echo $id ?>').css('display','unset');
         });
         // js xoa anh va chen value on vao input delimg
         $("#button-del-<?php echo $id ?>").click(function(){
            // anh div hinh anh
            $('#img-current<?php echo $id ?>').css('display','none');
            $('#del_img_<?php echo $id ?>').attr('value','del_img');
         });
      </script>
   <?php
}