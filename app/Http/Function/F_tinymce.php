<?php

function F_tinymce($id){
?>
<script>
    tinymce.init({
        editor_selector: "mceEditor",
        selector: '#<?php echo $id ?>',
        height: 400,
        relative_urls: false,
        remove_script_host: false,
        noneditable_noneditable_class: 'fa',
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code emoticons noneditable",
        image_advtab: true,
        language: 'vi_VN',
        font_formats: 'Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
        extended_valid_elements: 'span[*]',
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code noneditable",
        ],
        rel_list: [{
                title: 'follow',
                value: 'follow'
            },
            {
                title: 'nofollow',
                value: 'nofollow'
            }
        ],
        extended_valid_elements: "span[*]",
        image_advtab: true,
        external_filemanager_path: "<?php echo asset('') ?>/filemanager/",
        filemanager_title: "Upload hình ảnh",
        filemanager_access_key: "NqHqdtye76t1K",
        external_plugins: {
            "filemanager": "<?php echo asset('') ?>/filemanager/plugin.min.js"
        },
        
    });

</script>
<?php
}
