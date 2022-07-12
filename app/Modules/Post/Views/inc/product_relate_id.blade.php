<div class="col-md-12 py-3">
    <div>
        
        <label class="font-weight-bold"><i class="fas fa-shopping-basket"></i> Sản phẩm  bán kèm</label> <br>
        <div id="post_list_add"></div>
        <input class="form-control" type="type" id="search" placeholder="Gõ tên sản phẩm">
        <div id="post_list">

        </div>
        <script>
            
            $('#search').on('keyup',function(){
                var post_type = '{{$post_type->url}}';
                var key =   $(this).val();
                if(key != ''){
                    $.get("{{asset('admin/post')}}/"+post_type+"/search/"+key,function(data){
                        $("#post_list").html(data);
                        $('.select_post').click(function(e){
                            e.preventDefault();
                            var post_id = $(this).data('postid');
                            var post_title = $(this).data('posttitle');
                            
                            $('#post_list_add').append('<div class="post_del'+post_id+'">'+post_title+'<span class="text-danger cursor xoapost" data-row="post_del'+post_id+'"> X</span><input type="hidden" name="product_relate[]" value="'+post_id+'"></di>');
                        });
                         //xoa truong vua them
                        $('#post_list_add').on('click', '.xoapost',function(e){
                            e.preventDefault();
                            var it = $(this).data('row');
                            $('.'+it).remove();
                        });
                    });
                }else{
                    $('#post_list').empty();
                }
            });
        </script>
    </div>
</div>