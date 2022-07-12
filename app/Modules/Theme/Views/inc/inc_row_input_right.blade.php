<div class="form-group">
    <label class="font-weight-bold"><i class="fa fa-id-card"></i> Tên hàng</label>
    <input type="text" class="form-control" name="name" value="{{$row->name}}" required>
 </div>
<div class="form-group">
    <label class="font-weight-bold"> Tên file (style)</label>
    <input type="text" class="form-control" name="style" value="{{$row->style}}" required>
 </div>
 <div class="form-group">
    <label><i class="fa fa-sliders-h"></i> Lề hàng</label>
    <select class="form-control" name="width">
        <option value="">Trống</option>
        <option value="container" @if($row->width == 'container') selected @endif>Có lề</option>
        <option value="container-fluid" @if($row->width == 'container-fluid') selected @endif>Không lề</option>
    </select>
</div>
<div class="form-group">
    <label> Vị trí</label>
    <select class="form-control" name="posion">
        <option value="head" @if($row->posion == 'head') selected @endif>Đầu website</option>
        <option value="body" @if($row->posion == 'body') selected @endif>Giữa website</option>
        <option value="footer" @if($row->posion == 'footer') selected @endif>Chân website</option>
    </select>
</div>

<p>
    <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Nâng cao
    </button>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="card card-body">
        <?php
        $feild_f2 = array(
            'icon_text' => 'Biểu tượng và tên',
            'title' => 'Tiêu đề',
            'title_2' => 'Tiêu đề 2',
            'title_color' => 'Màu tiêu đề',
            'des' => 'Mô tả',
            'des_2' => 'Mô tả 2',
            'img' => 'Hình ảnh',
            'img_2' => 'Hình ảnh 2',
            'bg' => 'Màu nền',
            'img_bg' => 'Hình nền',
            'link_img' => 'Link hình ảnh',
            'link_img_2' => 'Link hình ảnh 2',
            'link' => 'Link',
            'content' => 'Nội dung',
            'content_2' => 'Nội dung 2',
            'map_code' => 'Google Map',
            'map_code_2' => 'Google Map 2',
            'facebook_fanpage' => 'Facebook fanpage',
            'effect' => 'Hiệu ứng',
            'effect_2' => 'Hiệu ứng 2',
            'effect_3' => 'Hiệu ứng 3',
            'effect_4' => 'Hiệu ứng 4',
            'col_1' => 'Cột 1',
            'col_2' => 'Cột 2',
            'col_3' => 'Cột 3',
            'col_4' => 'Cột 4',
            'display' => 'Hiển thị',
            'menu_id' => 'Menu',
            'menu_id_2' => 'Menu 2',
            'slide_id' => 'Slide',
            'slide_id_2' => 'Slide 2',
            'form_id' => 'Form',
            'form_id_2' => 'Form 2',
            'tab_id' => 'Tab',
            'tab_id_2' => 'Tab 2',
            'cat_id' => 'Danh mục',
            'cat_id_2' => 'Danh mục 2',
            'cat_id_3' => 'Danh mục 3',
            'cat_id_4' => 'Danh mục 4',
            'cat_post_id' => 'Bài viết theo danh mục',
            'cat_post_id_2' => 'Bài viết theo danh mục 2',
            'cat_product_id' => 'Bài viết theo danh mục sản phẩm',
            'cat_product_id_2' => 'Bài viết theo danh mục sản phẩm 2',
            'cat_post_sub_id' => 'Bài viết theo danh mục con',
            'cat_post_sub_id_2' => 'Bài viết theo danh mục con 2',
            'cat_list_id' => 'Danh sách danh mục con',
            'cat_list_id' => 'Danh sách danh mục con',
            'cat_list_id_2' => 'Danh sách danh mục con 2',
        );
        foreach($feild_f2 as $key_2 => $feild_r){
            ?>
                <div class="form-check">
                    <input class="form-check-input" name="feild[]" type="checkbox" id="fe_{{$key_2}}" value="{{$key_2}}" @if(is_array(json_decode($row->feild)))  @if(in_array($key_2,json_decode($row->feild))) checked @endif @endif>
                    <label class="form-check-label" for="fe_{{$key_2}}">{{$feild_r}}</label>
                </div>
            <?php
        }
    ?>
    </div>
  </div>

