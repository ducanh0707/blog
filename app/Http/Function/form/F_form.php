<?php
    function F_form($row){
        if($row->F_form){
            $form = $row->f_form;
        ?>
            <?php if($form->full_name == 'on'){ ?>
                <div class="col-md-12">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 full_name">
                </div>
            <?php } ?>
            <?php if($form->tel == 'on'){ ?>
                <div class="col-md-12">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 tel">
                </div>
            <?php } ?>
            <?php if($form->email == 'on'){ ?>
                <div class="col-md-12">
                    <label>Địa chỉ email</label>
                    <input type="text" class="form-control mb-2 mr-sm-2 email">
                </div>
            <?php } ?>
            <?php if($form->request == 'on'){ ?>    
                <div class="col-md-12">
                    <label>Yêu cầu</label>
                    <textarea class="form-control mb-2 mr-sm-2 request_i"></textarea>
                </div>
            <?php } ?>
            <?php if($form->care != '' or $form->care != null){
                echo '<div class="col-md-12">';
                $option = preg_split('/\r\n|[\r\n]/',$form->care);
                foreach($option as $key_o => $option_r){
            ?>
                <div class="form-check">
                    <input name="option" value="<?php echo $option_r; ?>" class="form-check-input care" type="checkbox" id="option_<?php echo $row->id.'_'.$key_o; ?>">
                    <label class="form-check-label" for="option_<?php echo $row->id.'_'.$key_o; ?>">
                        <?php echo $option_r; ?>
                    </label>
                </div>
            <?php } echo '</div>'; }?>     
            <div class="col-md-12 my-3">
                <button class="btn button_bg_gradient button_color_3 mb-2 w-100 font-weight-bold"  onclick="Mysend('<?php echo $row->id ?>')">Đăng ký ngay</button>
            </div>
               
            <script>
               
                
           
               function Mysend(row_id){
                    var full_name =  $('#form_'+row_id+' .full_name').val(); if(full_name == ''){alert('Bạn chưa điền "Họ và tên"'); return false;}
                    var email =  $('#form_'+row_id+' .email').val();
                    var tel =  $('#form_'+row_id+' .tel').val(); if(tel == ''){alert('Bạn chưa điền "Số điện thoại"'); return false;}
                    var request_i =  $('#form_'+row_id+' .request_i').val(); 
                    var token = '<?php echo csrf_token(); ?>';
                    var option = new Array();
                        $('#form_'+row_id+' input[name="option"]:checked').each(function() {
                            option.push(this.value);
                    });
                    var form_id = '<?php echo $form->id?>';
           
                    $.ajax({
                        type:'POST',
                        url: '<?php echo asset('/')."form/regis" ?>',
                        dataType: "json",
                        data: {form_id:form_id,full_name:full_name,tel:tel,email:email,request_i:request_i,option:option,_token:token},
                        success:function(data){
                            alert(data.success);
                        }
                    });
                    alert('Bạn đã gửi thành công');
                };
            </script>
        <?php
        }
    }


    function F_form_ngang($row){
        if($row->F_form->count()>0){
            $form = $row->f_form;
        ?>
                    <?php if($form->full_name == 'on'){ ?>
                        <div class="col-md">
                            <input type="text" class="form-control mb-2 mr-sm-2 full_name" placeholder="Họ và tên">
                        </div>
                    <?php } ?>
                    <?php if($form->tel == 'on'){ ?>
                        <div class="col-md">
                            <input type="text" class="form-control mb-2 mr-sm-2 tel" placeholder="Số điện thoại">
                        </div>
                    <?php } ?>
                    <?php if($form->email == 'on'){ ?>
                        <div class="col-md">
                            <input type="text" class="form-control mb-2 mr-sm-2 email" placeholder="Địa chỉ email">
                        </div>
                    <?php } ?>
                    <?php if($form->request == 'on'){ ?>    
                        <div class="col-md">
                            <label>Yêu cầu</label>
                            <textarea class="form-control mb-2 mr-sm-2 request_i"></textarea>
                        </div>
                    <?php } ?>
                    <?php if($form->care != '' or $form->care != null){
                        echo '<div class="col-md">';
                        $option = preg_split('/\r\n|[\r\n]/',$form->care);
                        foreach($option as $key_o => $option_r){
                    ?>
                        <div class="form-check">
                           <input name="option" value="<?php echo $option_r; ?>" class="form-check-input care" type="checkbox" id="option_<?php echo $row->id.'_'.$key_o; ?>">
                           <label class="form-check-label" for="option_<?php echo $row->id.'_'.$key_o; ?>">
                              <?php echo $option_r; ?>
                           </label>
                        </div>
                    <?php } echo '</div>'; }?>     
                    <div class="col-md">
                        <button class="btn btn button_bg_gradient button_color_3 mb-2 w-100 font-weight-bold mb-2 w-100" onclick="Mysend('<?php echo $row->id ?>')"">Đăng ký ngay</button>
                    </div>
                   
            
            <script>         
                function Mysend(row_id){
                    var full_name =  $('#form_'+row_id+' .full_name').val(); if(full_name == ''){alert('Bạn chưa điền "Họ và tên"'); return false;}
                    var email =  $('#form_'+row_id+' .email').val();
                    var tel =  $('#form_'+row_id+' .tel').val(); if(tel == ''){alert('Bạn chưa điền "Số điện thoại"'); return false;}
                    var request_i =  $('#form_'+row_id+' .request_i').val(); 
                    var token = '<?php echo csrf_token(); ?>';
                    var option = new Array();
                        $('#form_'+row_id+' input[name="option"]:checked').each(function() {
                            option.push(this.value);
                    });
                    var form_id = '<?php echo $form->id?>';
           
                    $.ajax({
                        type:'POST',
                        url: '<?php echo asset('/')."form/regis" ?>',
                        dataType: "json",
                        data: {form_id:form_id,full_name:full_name,tel:tel,email:email,request_i:request_i,option:option,_token:token},
                        success:function(data){
                            alert(data.success);
                        }
                    });
                    alert('Bạn đã gửi thành công');
                };
            </script>
        <?php
        }
    }