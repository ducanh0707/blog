  
  <div>
        <label class="font-weight-bold"> Biểu tượng và tên <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank"> Lấy mã</a></label>
        <?php if($row->icon_text != '' or $row->icon_text != null): ?>
            <?php $t=0; ?>
            
            <?php if(json_decode($row->icon_text)): ?>
                <?php $__currentLoopData = json_decode($row->icon_text); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key_it => $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $t++; ?>
                    <div class="row icon_text icon_text_<?php echo e($t); ?>">
                        <div class="col-md-4">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text"><?php echo html_entity_decode($it->icon) ?></div>
                                    </div>
                                    <input type="text" class="form-control" name="icon_text[<?php echo e($t); ?>][icon]" value="<?php echo htmlentities($it->icon) ?>">
                                </div>
                        </div>
                        <div class="col-md-8 no-padding">
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" name="icon_text[<?php echo e($t); ?>][text]" value="<?php echo e($it->text); ?>">
                                    <input placeholder="Tiếng anh" type="text" class="form-control" name="icon_text[<?php echo e($t); ?>][text_en]" value="<?php if(isset($it->text_en)): ?><?php echo e($it->text_en); ?><?php endif; ?>">
                                    <div class="input-group-text">
                                        <span class="xoa_it" data-row="icon_text_<?php echo e($t); ?>"><i class="fa fa-trash text-danger cursor"></i> </span>  
                                    </div>
                                </div>
                        </div>                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php else: ?>
        <div class="row icon_text">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"></div>
                        </div>
                        <input type="text" class="form-control" name="icon_text[1][icon]" placeholder="Mã biểu tượng">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" class="form-control" name="icon_text[1][text]" placeholder="Tên">
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div id="add_icon_text">
        

        </div>
    </div>
    <div class="text-right">
        <span href="#" class="btn btn-sm btn-primary cursor" id="add">Thêm</span>
    </div>
<script>
    $('#add').click(function(e){
        e.preventDefault();
        var count = $('.icon_text').length;
        var key = count + 1;
        $('#add_icon_text').append('<div class="row icon_text icon_text_'+key+'"><div class="col-md-4"><div class="input-group mb-2"><div class="input-group-prepend"><div class="input-group-text"></div></div><input type="text"class="form-control"name="icon_text['+key+'][icon]"placeholder="Mã biểu tượng"></div></div><div class="col-md-8 no-padding"><div class="input-group-prepend"><input type="text"class="form-control"name="icon_text['+key+'][text]"placeholder="Tên"><div class="input-group-text"><span class="xoa_it"data-row="icon_text_'+key+'"><i class="fa fa-trash text-danger cursor"></i></span></div></div></div></div>');
    });
    //xoa truong vua them
    $('#add_icon_text').on('click', '.xoa_it',function(e){
        e.preventDefault();
        var it = $(this).data('row');
        $('.'+it).remove();
    });
    //xoa truong da co
    $('.xoa_it').click(function(){
        var it = $(this).data('row');
        $('.'+it).remove();
    });
</script><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Theme/Views/feild/icon_text.blade.php ENDPATH**/ ?>