<br />
<div class="col-md-12">
    <div class="form-group">
        <label class="font-weight-bold"><i class="fas fa-info-circle"></i> Chỉ số</label>
        <textarea class="form-control" id="edit_index_product" rows="3" name="index_product">{{$post->index_product}}</textarea>
        <script>
            tinymce.init({
            editor_selector : "mceEditor",
            selector: '#edit_index_product',height: 400,
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
    </div>
</div>