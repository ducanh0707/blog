@extends('V_backend.index')
@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="{{asset('admin/tab')}}" class="btn btn-primary btn-sm">Quay lại</a>
         <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tab_new">Thêm mới</button>
         <div class="modal fade" id="tab_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="exampleModalCenterTitle"> Thêm mới</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <form action="{{asset('admin/tab/'.$tab_id.'/item')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                           <div class="form-group">
                              <label class="font-weight-bold"> Tiêu đề</label>
                              <input name="title" class="form-control" required>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <!-- nut bam  -->
                                 <div class="form-group">
                                    <label class="font-weight-bold">Tên nút bấm</label>
                                    {{F_input_basic('text',$value = old('button'),'button','','form-control','','')}}    
                                 </div>
                              </div>

                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="font-weight-bold">Biểu tượng</label>
                                    {{F_input_basic('text',$value = old('icon'),'icon','','form-control','','')}}    
                                 </div>
                              </div>
                           </div>
                           {{-- chon loai  --}}
                           <div class="form-group">
                              <label class="font-weight-bold">Chọn loại tab</label><br>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" value="img" name="style" type="radio" id="r_tab_img">
                                 <label class="form-check-label" for="r_tab_img">Tab hình ảnh</label>
                               </div>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" value="content" name="style" type="radio" id="r_tab_content">
                                 <label class="form-check-label" for="r_tab_content">Tab nội dung</label>
                              </div>
                               <div class="form-check form-check-inline">
                                 <input class="form-check-input" value="imgmap" name="style" type="radio" id="r_tab_imgmap">
                                 <label class="form-check-label" for="r_tab_imgmap">Tab sơ đồ</label>
                               </div>
                           </div>
                       
                           {{-- content  --}}
                           <div class="form-group tab_content" style="display:none">
                              <textarea class="form-control" id="new" rows="3" name="content">{{old('content')}}</textarea>
                              <?php echo F_tinymce($id = 'new'); ?>
                           </div>
                           {{-- logo  --}}
                           <div class="form-group tab_img" style="display:none">
                              <label><i class="fa fa-image"></i> Ảnh nền</label>
                              {{F_input_image('','img','new_img_tab_item',asset('/source/tab/'))}}
                           </div>
                           <div class="form-group tab_imgmap">
                              <label class="font-weight-bold"> Mã nhúng sơ đồ</label>
                              {{F_input_textarea('','code','','form-control','','')}}
                           </div>
                           <script>
                              $('#r_tab_img').click(function(){
                                 $('.tab_img').css('display','');
                                 $('.tab_imgmap').css('display','none');
                                 $('.tab_content').css('display','none');
                              });

                              $('#r_tab_content').click(function(){
                                 $('.tab_img').css('display','none');
                                 $('.tab_imgmap').css('display','none');
                                 $('.tab_content').css('display','');
                              });

                              $('#r_tab_imgmap').click(function(){
                                 $('.tab_img').css('display','');
                                 $('.tab_imgmap').css('display','');
                                 $('.tab_content').css('display','none');
                              });

                           </script>
                           <div class="form-group">
                              <label class="font-weight-bold"> Mô tả</label>
                              {{F_input_textarea('','des','','form-control','','')}}
                           </div>
                           <!-- css class id  -->
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Class Css</label>
                                 {{F_input_basic('text',$value = old('css_class'),'css_class','','form-control','','')}}
                                 {{-- type, value, name, id,class , attri, placeholder --}}
                              </div>
                              <!-- css id -->
                              <div class="col-md-6">
                                 <label class="font-weight-bold">Id Css</label>
                                 {{F_input_basic('text',$value = old('css_id'),'css_id','','form-control','','')}}
                                 {{-- type, value, name, id,class , attri, placeholder --}}
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                           <button type="submit" class="btn btn-sm btn-primary">Thêm mới</button>
                        </div>
                     </form>
                  </div> <!-- dong the modal -body -->
               </div>
            </div>
         </div>
    </section>
    @include('V_backend/alert')
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
               <h3 class="box-title">Danh sách tab {{$tab->name}}</h3>
            </div>
            <div class="box-body table-responsive no-padding">
               <table class="table table-hover">
                  <thead>
                     <tr >
                        <th width="20px"><span class="MoveMeta cursor text-primary"><i class="fa fa-arrows-alt"></i></span></th>
                        <th></th>
                        <th>Tên</th>
                        <th>Kiểu</th>
                        <th class="text-center">id</th>
                        <th class="text-center"></th>
                     </tr>
                  </thead>
                  <tbody class="ui-sortable" id="sortable">
                     @if(count($tab_item) != 0)
                        @foreach($tab_item as $key => $val)
                           <!-- cot anh dai dien -->
                           
                           <tr id="item_{{$val ->id}}" class="ui-state-default">
                              <td class="">
                                 <span class="MoveMeta cursor"><i class="fa fa-arrows-alt"></i></span>
                              </td>
                              <td class=""> 
                                 @if($val->style != 'content')
                                    @if($val->img)
                                       <img width="100px" src="{{asset('/source/tab/'.$val->img)}}" />
                                    @else
                                       <img width="100px" src="{{asset('upload/theme/noimg.jpg')}}" />
                                    @endif
                                 @endif
                              </td>
                              
                              <!-- cot tieu de -->
                              <td class="">
                                 <div class="admin-list-post">
                                    <div class="si_title">
                                       <b  class="text-dark">{{$val->title}}</b>
                                    </div>
                                    <div class="si_title">{{$val->des}}
                                    </div>
                                 </div>
                              </td>
                              <td class="">
                                 {{$val ->style}}
                              </td>
                              <!-- id  -->
                              <td  class="text-center">
                                 {{$val -> id}}
                              </td>
                              <td  class="text-center">
                                 <!-- cot  trang thai  -->
                                 <?php if($val->status == 'off'){ ?>
                                    <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                                       <i class="fa fa-exclamation-circle text-danger"></i>
                                    </a>
                                 <?php }elseif($val->status == 'on'){ ?>
                                    <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                                       <i class="fa fa-check-circle text-success"></i>
                                    </a>
                                 <?php } ?>
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
                                             <b>Thông tin xóa: </b> {{$val -> title}}
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
                                             <h6 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-edit"></i> Sửa tab </h6>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <div class="modal-body text-left">
                                             <form action="{{asset('admin/tab/'.$tab_id.'/item/edit/'.$val->id)}}" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <div>
                                                   <div class="form-group">
                                                      <label class="font-weight-bold"> Tiêu đề tab</label>
                                                      <input name="title" class="form-control" value="{{$val -> title}}" type="text" required>
                                                   </div>
                                                   <!-- link  -->
                                                   <div class="form-group row">
                                                      <div class="col-md-6">
                                                         <label class="font-weight-bold">Tên nút bấm</label>
                                                         {{F_input_basic('text',$val -> button,'button','','form-control','','')}}
                                                      </div>
                                                      <div class="col-md-6">
                                                         <label class="font-weight-bold">Biểu tượng</label>
                                                         {{F_input_basic('text',$val -> icon,'icon','','form-control','','')}}
                                                      </div>
                                                   </div>
                                                   {{-- chon loai  --}}
                                                   <div class="form-group"> {{$val->style}}
                                                      <label class="font-weight-bold">Chọn loại tab</label><br>
                                                      <div class="form-check form-check-inline">
                                                      <input @if($val->style == 'img') checked @endif class="form-check-input" name="style" value="img" type="radio" id="r_tab_img_{{$val->id}}">
                                                         <label class="form-check-label" for="r_tab_img_{{$val->id}}">Tab hình ảnh</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                         <input @if($val->style == 'content') checked @endif class="form-check-input" name="style" value="content" type="radio" id="r_tab_content_{{$val->id}}">
                                                         <label class="form-check-label" for="r_tab_content_{{$val->id}}">Tab nội dung</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                         <input @if($val->style == 'imgmap') checked @endif class="form-check-input" name="style" value="imgmap" type="radio" id="r_tab_imgmap_{{$val->id}}">
                                                         <label class="form-check-label" for="r_tab_imgmap_{{$val->id}}">Tab sơ đồ</label>
                                                      </div>
                                                   </div>
                                               
                                                   {{-- content  --}}
                                                   <div class="form-group tab_content_{{$val->id}}" style="display:none">
                                                      <textarea class="form-control" id="edit_{{$val->id}}" rows="3" name="content">{{$val->content}}</textarea>
                                                      <?php echo F_tinymce($id = 'edit_'.$val->id); ?>
                                                   </div>
                                                   {{-- logo  --}}
                                                   <div class="form-group tab_img_{{$val->id}}" style="display:none">
                                                      <label><i class="fa fa-image"></i> Ảnh nền</label>
                                                      {{F_input_image($val->img,'img','edit_img_tab_item_'.$val->id,asset('/source//tab/'))}}
                                                   </div>
                                                   <div class="form-group tab_imgmap_{{$val->id}}" style="display:none">
                                                      <label class="font-weight-bold"> Mã nhúng sơ đồ</label>
                                                      {{F_input_textarea($val->code,'code','','form-control','','')}}
                                                   </div>
                                                   <script>
                                                      $('#r_tab_img_{{$val->id}}').click(function(){
                                                         $('.tab_img_{{$val->id}}').css('display','');
                                                         $('.tab_imgmap_{{$val->id}}').css('display','none');
                                                         $('.tab_content_{{$val->id}}').css('display','none');
                                                      });

                                                      $('#r_tab_content_{{$val->id}}').click(function(){
                                                         $('.tab_img_{{$val->id}}').css('display','none');
                                                         $('.tab_imgmap_{{$val->id}}').css('display','none');
                                                         $('.tab_content_{{$val->id}}').css('display','');
                                                      });

                                                      $('#r_tab_imgmap_{{$val->id}}').click(function(){
                                                         $('.tab_img_{{$val->id}}').css('display','');
                                                         $('.tab_imgmap_{{$val->id}}').css('display','');
                                                         $('.tab_content_{{$val->id}}').css('display','none');
                                                      });
                                                      var val_data = '{{$val->style}}';
                                                      if(val_data == 'img'){
                                                         $(document).ready(function(){
                                                            $('.tab_img_{{$val->id}}').css('display','');
                                                            $('.tab_imgmap_{{$val->id}}').css('display','none');
                                                            $('.tab_content_{{$val->id}}').css('display','none');
                                                         });
                                                      }else if(val_data == 'content'){
                                                         $(document).ready(function(){
                                                            $('.tab_img_{{$val->id}}').css('display','none');
                                                            $('.tab_imgmap_{{$val->id}}').css('display','none');
                                                            $('.tab_content_{{$val->id}}').css('display','');
                                                         });
                                                      }else{
                                                         $(document).ready(function(){
                                                            $('.tab_img_{{$val->id}}').css('display','');
                                                            $('.tab_imgmap_{{$val->id}}').css('display','');
                                                            $('.tab_content_{{$val->id}}').css('display','none');
                                                         });
                                                      }
                                                   </script>
                                                   <div class="form-group">
                                                      <label class="font-weight-bold"> Mô tả</label>
                                                      {{F_input_textarea($val ->des,'des','','form-control','','')}}
                                                   </div>

                                                   <!-- css class id  -->
                                                   <div class="form-group row">
                                                      <div class="col-md-6">
                                                         <label class="font-weight-bold">Class Css</label>
                                                         {{F_input_basic('text',$val ->css_class,'css_class','','form-control','','')}}
                                                         {{-- type, value, name, id,class , attri, placeholder --}}
                                                      </div>
                                                      <!-- css id -->
                                                      <div class="col-md-6">
                                                         <label class="font-weight-bold">Id Css</label>
                                                         {{F_input_basic('text',$val ->css_id,'css_id','','form-control','','')}}
                                                         {{-- type, value, name, id,class , attri, placeholder --}}
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                   <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Đóng</button>
                                                   <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>    
                                 </div>
                              </td>
                           </tr>
                        @endforeach
                     </tbody> 
                  @else
                     <tr>
                        <td colspan="9" class="text-center">
                           <h6>Không có bài viết đủ điều kiện lọc</h6>
                        </td>
                     </tr>
                  @endif
               </table>
               <script>
                  $(function() {
                     $("#sortable" ).sortable({
                        update: function (event, ui){
                           var data = $(this).sortable('serialize');
                           var tab_id = '{{$tab_id}}';
                           var token = '{{ csrf_token() }}';
                           // ajax 
                           $.ajax({
                              type: "POST",
                              url: '{{asset('')}}admin/tab/'+tab_id+'/item/order',
                              dataType: "json",
                              data: {data: data, _token:token},
                           });
                        }
                     });
                     $( "#sortable" ).disableSelection();
                  });
               </script>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection