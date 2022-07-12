@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <a href="{{asset('admin/theme')}}" class="btn btn-primary btn-sm" >Quay lại</a>
         <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#post_type_new">Thêm mới</button>
         
         <form action="{{asset('admin/post_type/new')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="modal fade" id="post_type_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới thể loại</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                     </button>
                     </div>
                     <div class="modal-body text-left">
                           <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Tên thể loại</label>
                                             {{F_input_basic('text','','name','','form-control','','')}}
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Url</label>
                                             {{F_input_basic('text','','url','','form-control','','')}}
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Biểu tượng <a href="https://fontawesome.com/" target="_blank">Lấy mã</a></label>
                                             {{F_input_basic('text','','icon','','form-control','','')}}
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_content" value="content">
                                       <label class="form-check-label" for="f_content">Nội dung</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_des" value="des">
                                       <label class="form-check-label" for="f_des">Mô tả</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_video" value="video">
                                       <label class="form-check-label" for="f_video">Video</label>
                                    </div>
                                 </div>   
                                 <div class="col-md-3">
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_price" value="price">
                                       <label class="form-check-label" for="f_price">Giá</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_price_km" value="price_km">
                                       <label class="form-check-label" for="f_price_km">Giá khuyến mại</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_code_km" value="code_km">
                                       <label class="form-check-label" for="f_code_km">Mã khuyến mại</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_code_product" value="code_product" >
                                       <label class="form-check-label" for="f_code_product">Mã sản phẩm</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_index_product" value="index_product" >
                                       <label class="form-check-label" for="f_index_product">Chỉ số sản phẩm</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_color" value="color">
                                       <label class="form-check-label" for="f_color">Màu sắc</label>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_view" value="view">
                                       <label class="form-check-label" for="f_view">Lượt xem</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_review" value="review">
                                       <label class="form-check-label" for="f_review">Đánh giá (review)</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_orderby" value="orderby">
                                       <label class="form-check-label" for="f_orderby">Sắp xếp thứ tự</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_chinhsach" value="chinhsach">
                                       <label class="form-check-label" for="f_chinhsach">Chính sách</label>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_slide_id" value="slide_id">
                                       <label class="form-check-label" for="f_slide_id">Slide</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_file_id" value="file_id">
                                       <label class="form-check-label" for="f_file_id">File tài liệu</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_product_relate_id" value="product_relate_id">
                                       <label class="form-check-label" for="f_product_relate_id">Sản phẩm liên quan</label>
                                    </div>
                                    <div class="form-check">
                                       <input class="form-check-input" name="feild[]" type="checkbox" id="f_comment" value="comment" >
                                       <label class="form-check-label" for="f_comment">Bình luận</label>
                                    </div>
                                 </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                              <button type="submit" class="btn btn-primary">Gửi</button>
                           </div>     
                     </div> <!-- dong the modal -body -->
                  </div>
               </div>
            </div>
         </form>
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title">Danh sách thể loại bài viết</h3>
            </div>
            <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                  <tr>
                     <th>Tên</th>
                     <th>URL</th>
                     <th class="text-center">Trường</th>
                     <th class="text-center">Biểu tượng</th>
                     <th class="text-center">id</th>
                     <th class="text-center"></th>
                  </tr>
                  @if(count($post_type) != 0)
                     @foreach($post_type as $key => $val)
                        <tr>
                           <!-- cot tieu de -->
                           <td class="">
                              {{$val->name}}
                           </td>
                           <td class="">
                              {{$val->url}}
                           </td>
                           <!-- link  -->
                           <td  class="text-center">
                              @if(isset($val->feild))
                                 @foreach(json_decode($val->feild) as $key =>  $feild)
                                    @if($key >0), @endif {{$feild}}
                                 @endforeach
                              @endif
                           </td>
                           <td  class="text-center">
                              <?php echo html_entity_decode($val->icon) ?>
                           </td>
                           <!-- id  -->
                           <td  class="text-center">
                              {{$val -> id}}
                           </td>
                           <td  class="text-center">
                           
                              <!-- xoa -->
                              <a  href="" data-toggle="modal" data-target="#call_del_{{$val -> id}}">
                                 <i class="fa fa-trash text-danger"></i>
                              </a>
                              <div class="modal fade" id="call_del_{{$val -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> Bạn có chắc chắn muốn xóa?</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                          <!-- id thuoc tinh -->
                                          <b>Thông tin xóa: </b> {{$val -> name}}
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                          <a href="<?php echo url()->current().'/del/'.$val->id; ?>" role="button" class="btn btn-danger">Ok Xóa</a>
                                       </div>
                                    </div>
                                 </div>    
                              </div>
                              <!-- sua  -->
                              <a  href="" data-toggle="modal" data-target="#call_edit_{{$val -> id}}">
                                 <i class="fa fa-edit text-primary"></i>
                              </a>
                              <div class="modal fade" id="call_edit_{{$val -> id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">   
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h6 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-edit"></i> Sửa thể loại</h6>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                          </button>
                                       </div>
                                       <div class="modal-body text-left">
                                          <form action="{{asset('admin/post_type/edit/'.$val->id)}}" method="POST" enctype="multipart/form-data">
                                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <div class="form-group">
                                                      <label>Tên thể loại</label>
                                                         {{F_input_basic('text',$val->name,'name','','form-control','','')}}
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                   <div class="form-group">
                                                      <label>Url</label>
                                                         {{F_input_basic('text',$val->url,'url','','form-control','','')}}
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <div class="form-group">Biểu tượng <?php echo html_entity_decode($val->icon) ?> <a href="https://fontawesome.com/" target="_blank">Lấy mã</a></label>
                                                         {{F_input_basic('text',htmlentities($val->icon),'icon','','form-control','','')}}
                                                   </div>
                                                   
                                                </div>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_content_{{$val->id}}" value="content"  @if(is_array(json_decode($val->feild))) @if(in_array('content',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_content_{{$val->id}}">Nội dung</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_des_{{$val->id}}" value="des" @if(is_array(json_decode($val->feild))) @if(in_array('des',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_des_{{$val->id}}">Mô tả</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_video{{$val->id}}" value="video" @if(is_array(json_decode($val->feild))) @if(in_array('video',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_video{{$val->id}}">Video</label>
                                                </div>
                                             </div>   
                                             <div class="col-md-3">
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_price_{{$val->id}}" value="price" @if(is_array(json_decode($val->feild))) @if(in_array('price',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_price_{{$val->id}}">Giá</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_price_km_{{$val->id}}" value="price_km" @if(is_array(json_decode($val->feild))) @if(in_array('price_km',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_price_km_{{$val->id}}">Giá khuyến mại</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_code_km_{{$val->id}}" value="code_km" @if(is_array(json_decode($val->feild))) @if(in_array('code_km',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_code_km_{{$val->id}}">Mã khuyến mại</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_code_product_{{$val->id}}" value="code_product" @if(is_array(json_decode($val->feild))) @if(in_array('code_product',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_code_product_{{$val->id}}">Mã sản phẩm</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_index_product_{{$val->id}}" value="index_product" @if(is_array(json_decode($val->feild))) @if(in_array('index_product',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_index_product_{{$val->id}}">Chỉ số sản phẩm</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_color_{{$val->id}}" value="color" @if(is_array(json_decode($val->feild))) @if(in_array('color',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_color_{{$val->id}}">Màu sắc</label>
                                                </div>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_view_{{$val->id}}" value="view" @if(is_array(json_decode($val->feild))) @if(in_array('view',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_view_{{$val->id}}">Lượt xem</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_review_{{$val->id}}" value="review" @if(is_array(json_decode($val->feild))) @if(in_array('review',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_review_{{$val->id}}">Đánh giá (review)</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_orderby_{{$val->id}}" value="orderby" @if(is_array(json_decode($val->feild))) @if(in_array('orderby',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_orderby_{{$val->id}}">Sắp xếp thứ tự</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_chinhsach" value="chinhsach" @if(is_array(json_decode($val->feild))) @if(in_array('chinhsach',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_chinhsach">Chính sách</label>
                                                </div>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_slide_id_{{$val->id}}" value="slide_id" @if(is_array(json_decode($val->feild))) @if(in_array('slide_id',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_slide_id_{{$val->id}}">Slide</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_file_id_{{$val->id}}" value="file_id" @if(is_array(json_decode($val->feild))) @if(in_array('file_id',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_file_id_{{$val->id}}">File tài liệu</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_product_relate_id_{{$val->id}}" value="product_relate_id" @if(is_array(json_decode($val->feild))) @if(in_array('product_relate_id',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_product_relate_id_{{$val->id}}">Sản phẩm liên quan</label>
                                                </div>
                                                <div class="form-check">
                                                   <input class="form-check-input" name="feild[]" type="checkbox" id="fe_comment_{{$val->id}}" value="comment" @if(is_array(json_decode($val->feild))) @if(in_array('comment',json_decode($val->feild))) checked @endif @endif>
                                                   <label class="form-check-label" for="fe_comment_{{$val->id}}">Bình luận</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="modal-footer">
                                             <a href="{{asset('admin/post_type/del/'.$val->id)}}" class="btn btn-sm btn-warning"> Xóa</a> 
                                             <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                             <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                          </div>
                                       </form>
                                    </div>
                                 </div>    
                              </div>
                           </td>
                        </tr>
                     @endforeach   
                  @else
                     <tr>
                        <td colspan="9" class="text-center">
                           <h6>Không có bài viết đủ điều kiện lọc</h6>
                        </td>
                     </tr>
                  @endif
               </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               {{$post_type->appends(request()->input()) ->links()}}
            </div>
          </div>
  
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection