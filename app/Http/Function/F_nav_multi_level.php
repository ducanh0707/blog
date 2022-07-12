<?php 
function F_nav_multi_level_ui($data,$type_id,$_m_post_type,$parent = 0,$str = ""){
   foreach ($data as $key => $val){
     $id_nav = $val -> id;
     $type_nav = $val -> nav_type;
     if($val -> parent_id== $parent){
?>
     <!-- ten nav -->
     <?php
         $nav_con = App\Http\Model\M_nav::where('parent_id',$id_nav)->first();
      ?>
         <li class="dd-item  dd3-item" data-id="<?php echo $id_nav ?>">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">
               <?php echo html_entity_decode( $val -> icon);?>
                  <span class="nav-name">
                     <?php
                        if($type_nav == 'cat'){ 
                           if(isset($val ->f_cat -> name)) { 
                              $val ->f_cat -> name;
                           }else{ 
                              echo 'Trống';
                           }
                           
                        }elseif($type_nav == 'custome'){ 
                           echo $val-> name;
                        }elseif($type_nav == 'post'){
                           if(isset($val ->f_post -> name)) { 
                              $val ->f_post -> name;
                           }else{ 
                              echo 'Trống';
                           }
                        }
                     ?>
                  </span>
                  <!-- action  -->
                  <span class="nav-ac">
                     <!-- trang thai  -->
                     <?php if($val->status == 'off'){ ?>
                        <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                           <i class="fa fa-exclamation-circle text-danger"></i>
                        </a>
                     <?php }elseif($val->status == 'on'){ ?>
                        <a href="<?php echo url()->current().'/status/'.$val->id; ?>">
                           <i class="fa fa-check-circle text-success"></i>
                        </a>
                     <?php } ?>
                     <!-- xoa  -->
                     <a  href="" data-toggle="modal" data-target="#call_del_<?php echo $id_nav ?>">
                        <i class="fa fa-trash text-danger"></i>
                     </a>
                     <div class="modal fade" id="call_del_<?php echo $id_nav ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">   
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> Bạn có chắc chắn muốn xóa?</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                           
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
                                 <a  href="<?php echo asset('admin/nav/type/'.$val->nav_type_id.'/del/'.$val->id) ?>" role="button" class="btn btn-danger">Ok Xóa</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- sua  -->
                     <a href="#" data-toggle="modal" data-target="#edit_nav_<?php echo $val -> id ?>">
                        <i class="fa fa-edit"></i>
                     </a>
                     <!-- model edit nav custome -->
                     <div class="modal fade" id="edit_nav_<?php echo $val -> id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form action="<?php echo asset('admin/nav/type/'.$type_id.'/edit/'.$val -> id) ?>" method="post"  enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                           <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Sửa nav</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <?php if($val -> nav_type == 'cat'){ ?>
                                          <!-- chon nav post  -->
                                          <div class="form-group">
                                             <label>Chọn danh mục</label>
                                             <select class="form-control" name="cat_id">
                                                <option selected value="">Chọn danh mục</option>
                                                <?php foreach($_m_post_type as $cat_type_nav_edit_r){ ?>
                                                   <option disabled><?php echo $cat_type_nav_edit_r -> name ?></option>
                                                      <?php 
                                                      F_select_cat_multi_level_edit($cat_type_nav_edit_r -> f_cat,$val->cat_id) ?>
                                                <?php } ?>
                                             </select>
                                          </div>
                                          <!-- ten nav -->
                                          <div class="form-group">
                                             <label><i class="fa fa-list"></i> Tên nav</label>
                                             <input type="text" value="<?php echo $val ->name ?>" class="form-control" placeholder="Bạn điền nav" name="name">
                                          </div>
                                       <?php }elseif($val -> nav_type == 'post'){ ?>
                                          <!-- chon nav post  -->
                                             <div class="form-group">
                                                <label>Chọn bài viết</label>
                                                <select class="form-control selectpicker" name="post_id"  data-container="body" data-live-search="true">
                                                   <option value="">Chọn bài viết</option>
                                                   <?php 
                                                      foreach($_m_post_type as $post_type_nav_r){ 
                                                         foreach($post_type_nav_r -> f_post as $post_nav_r){
                                                            ?>
                                                               <option value="<?php echo $post_nav_r -> id ?>" <?php if($val -> post_id == $post_nav_r -> id){ echo 'selected';} ?>><?php echo  $post_nav_r -> title ?></option>
                                                            <?php
                                                         }
                                                      } 
                                                   ?>
                                                </select>
                                             </div>
                                          <!-- ten nav -->
                                          <div class="form-group">
                                             <label><i class="fa fa-list"></i> Tên nav</label>
                                             <input type="text" value="<?php echo $val ->name ?>" class="form-control" placeholder="Bạn điền nav" name="name">
                                          </div>
                                       <?php }elseif($val -> nav_type == 'page'){ ?>
                                          <!-- chon nav page  -->
                                             <div class="form-group">
                                                <label>Chọn page</label>
                                                <select class="form-control selectpicker" name="page_id" data-container="body" data-live-search="true">
                                                   <option value="">Chọn page</option>
                                                   <?php 
                                                      foreach($m_page as $m_page_r){ 
                                                         ?>
                                                            <option value="<?php echo $m_page_r -> id ?>" <?php if($val -> page_id == $m_page_r -> id){ echo 'selected';} ?>><?php echo  $m_page_r -> title ?></option>
                                                         <?php
                                                      } 
                                                   ?>
                                                </select>
                                             </div>
                                          <!-- ten nav -->
                                          <div class="form-group">
                                             <label><i class="fa fa-list"></i> Tên nav</label>
                                             <input type="text" value="<?php echo $val ->name ?>" class="form-control" placeholder="Bạn điền nav" name="name">
                                          </div>
                                       <?php }elseif($val -> nav_type == 'custome'){ ?>
                                          <!-- ten nav -->
                                          <div class="form-group">
                                             <label><i class="fa fa-list"></i> Tên nav (bắt buộc)</label>
                                             <input type="text" value="<?php echo $val ->name ?>" class="form-control" placeholder="Bạn điền nav" name="name">
                                          </div>
                                          <!-- link nav -->
                                          <div class="form-group">
                                             <label><i class="fa fa-link"></i> Link nav</label>
                                             <input type="text" value="<?php echo $val ->url?>" class="form-control" placeholder="Bạn điền link nav" name="url">
                                          </div>
                                       <?php } ?>

                                       <?php if(Auth::user() -> url == 'root'){ ?>
                                          <div class="form-group form-check">
                                             <input type="checkbox" class="form-check-input" id="def_<?php echo $val -> id ?>" name="def" value="on" <?php if($val -> def == 'on'){echo 'checked';} ?>>
                                             <label class="form-check-label" for="def_<?php echo $val -> id ?>">Giá trị mặc định (chỉ root có quyền xóa)</label>
                                          </div>
                                       <?php } ?>
                                       <!-- nav icon -->
                                       <div class="form-group">
                                          <label><i class="fa fa-icons"></i> Biểu tượng </label>
                                          <input type="text" value="<?php echo htmlentities($val -> icon) ?>" class="form-control" placeholder="Bạn điền icon (tùy chọn)" name="icon">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <label> <b>CSS vs ID (li)</b></label>
                                       <div class="form-group row">
                                          <div class="col-md-6">
                                             <input type="text" class="form-control" name="class_li" placeholder="class li" value="<?php echo $val -> class_li ?>">
                                          </div>
                                          <!--  id -->
                                          <div class="col-md-6">
                                             <input type="text" class="form-control" name="id_li" placeholder="id li" value="<?php echo $val -> id_li ?>">
                                          </div>
                                       </div>
                                       <!-- class + id a   -->
                                       <label> <b>CSS vs ID (a)</b></label>
                                       <div class="form-group row">
                                          <div class="col-md-6">
                                             <input type="text" class="form-control" name="class_a" placeholder="css a" value="<?php echo $val -> class_a ?>">
                                          </div>
                                          <!--  id -->
                                          <div class="col-md-6">
                                             <input type="text" class="form-control" name="id_a" placeholder="id a" value="<?php echo $val -> id_a ?>">
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <label> <b>Thuộc tính thẻ a</b></label>
                                          <input type="text" class="form-control" name="attri" value="<?php echo $val -> attri ?>">
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                              <button type="submit" class="btn btn-primary">Gửi</button>
                              </div>
                           </div>
                        </div>
                        </form>
                     </div>
                  </span>
                  <!-- ket thuc xoa  -->
               </div>
        
<?php
      if($nav_con){
          echo '<ol class="'.$str.'">'; 
            F_nav_multi_level_ui($data,$type_id,$_m_post_type,$id_nav,$str."dd-list");//de quuy danh muc
          echo '</ol>';         

        echo ' </li>';
      }  
     }//end if parent
  }//end foreach data
}//end funcito