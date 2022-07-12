<div class="col-md-12">
    <div class="form-group">
        <label><i class="fa fa-align-justify"></i> Mô tả</label>
        <textarea type="textarea" id="post_edit_des" class="form-control" name="des"><?php echo e($post->des); ?></textarea>
    </div>
    <script>
        tinymce.init({
        editor_selector : "mceEditor",
        selector: '#post_edit_des',height: 400,
        relative_urls:false,
        remove_script_host:false,
        noneditable_noneditable_class: 'fa',
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code emoticons",
        image_advtab: true ,
        language: 'vi_VN',
        font_formats: 'Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',

        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code noneditable"
        ],
        fontsize_formats: '8pt 9pt 10pt 11pt 12pt 13p 14px 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 23pt 24pt',
        contextmenu: "image | inserttable | bold italic | fontsizest | align | removeformat | link unlink",
        rel_list: [
            {title: 'follow', value: 'follow'},
            {title: 'nofollow', value: 'nofollow'}
            ],
        extended_valid_elements: 'span[*]',
        image_advtab: true,

        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
            ],
        external_filemanager_path:"<?php echo asset('') ?>/filemanager/",
        filemanager_title:"Upload hình ảnh" ,
        filemanager_access_key:"NqHqdtye76t1K" ,
        external_plugins: { "filemanager" : "<?php echo asset('') ?>/filemanager/plugin.min.js"},
        
        });

    </script>

    <div>
        <div class="text-right">
            <a  data-toggle="collapse" href="#lang_des" role="button" aria-expanded="false" aria-controls="lang_des">
                Thêm ngôn ngữ
            </a>
        </div>
        <div class="collapse multi-collapse" id="lang_des">
            <div class="form-group">
                <label class="font-weight-bold"> Mô tả tiếng anh</label>
                <textarea class="form-control" id="des_en" rows="3" name="des_en"><?php echo e($post->des_en); ?></textarea>
                <?php echo e(F_tinymce('des_en')); ?>

            </div>
           
        </div>
    </div>
 </div><?php /**PATH /home/webux/domains/auth.webux.vn/public_html/app/Modules/Post/Views/inc_edit/des.blade.php ENDPATH**/ ?>