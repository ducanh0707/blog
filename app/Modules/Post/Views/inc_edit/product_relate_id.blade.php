<div class="col-md-12 py-3">
    <div>
        <label class="font-weight-bold"><i class="fas fa-shopping-basket"></i> Sản phẩm  bán kèm</label> <br>
        <div class="product_edit">
            @if(isset($post->product_relate))
                @if(is_array(json_decode($post->product_relate)))
                    @foreach(json_decode($post->product_relate) as $product_e)
                        <div class="product_mod product_mod_{{$product_e}}">
                            <?php $post_rea = App\Http\Model\M_post::find($product_e) ?>
                            {{$post_rea->title}}
                            <span class="cursor xoa_fe" data-productid="{{$product_e}}"><i class="fa fa-trash text-danger"></i></span>
                        </div>
                    @endforeach
                    <script>
                        //xoa anh
                        $('.xoa_fe').click(function(){
                            var post_type = '{{$post_type->url}}';
                            var post_id = '{{$post->id}}';
                            var product_id = $(this).data('productid');
                            $.get("{{asset('admin/post')}}/"+post_type+"/del_product_relate/"+post_id+"/"+product_id,function(data){
                                $('.product_mod_'+product_id).remove();
                            });
                        });
                    </script>
                @endif
            @endif
        </div>

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