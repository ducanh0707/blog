    <br />
<div class="col-md-12">
    <div class="form-group">
        <label class="font-weight-bold"><i class="fas fa-edit"></i> Nội dung</label>
        <textarea class="form-control" id="post_edit" rows="3" name="content">{{$post->content}}</textarea>
        <script>
            tinymce.init({
                editor_selector : "mceEditor",
                selector: '#post_edit',height: 500,
                relative_urls:false,
                extended_valid_elements: 'script[language|type|src]',
               
                toolbar1: "undo redo | insert | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "fontsizeselect| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code emoticons | webux_upload",

                powerpaste_allow_local_images: true,
                powerpaste_word_import: true,
                powerpaste_html_import: 'prompt',
                paste_data_images: true,
                image_advtab: true ,
                language: 'vi_VN',
                font_formats: 'Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',

                plugins: [
                        "image advlist autolink link image lists charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking fullscreen",
                        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code noneditable code"
                ],
            
                contextmenu: "paste copy cut | image | inserttable | bold italic | fontsizes | align | removeformat | link unlink",
                table_class_list: [
                    {title: 'Mặc định', value: 'mac_dinh'},
                    {title: 'Respon_right', value: 'respon_mo'},
                ],
                table_default_attributes: {
                    class: 'mac_dinh'
                },
                rel_list: [
                    {title: 'follow', value: 'follow'},
                    {title: 'nofollow', value: 'nofollow'}
                    ],
        
                image_advtab: true,
                fontsize_formats: '8pt 9pt 10pt 11pt 12pt 13p 14px 15pt 16pt 17pt 18pt 19pt 20pt 21pt 22pt 23pt 24pt',
                templates: [
                    { title: 'Test template 1', content: 'Test 1' },
                    { title: 'Test template 2', content: 'Test 2' }
                    ],
                external_filemanager_path:"<?php echo asset('') ?>filemanager/",
                filemanager_title:"Upload hình ảnh" ,
                filemanager_access_key:"NqHqdtye76t1K" ,
                external_plugins: { "filemanager" : "<?php echo asset('') ?>filemanager/plugin.min.js"},
               

                
            });

        </script>

<div>
    <div class="text-right">
        <a  data-toggle="collapse" href="#lang_content" role="button" aria-expanded="false" aria-controls="lang_content">
            Thêm ngôn ngữ
        </a>
    </div>
    <div class="collapse multi-collapse" id="lang_content">
        <div class="form-group">
            <label class="font-weight-bold"> Nội dung tiếng anh</label>
            <textarea class="form-control" id="content_en" rows="3" name="content_en">{{$post->content_en}}</textarea>
            {{ F_tinymce('content_en')}}
        </div>
       
    </div>
</div>
    </div>
</div>