<?php 
//hien thi o danh sach danh muc da cap
function F_list_multi_level($data,$list,$parent = 0,$str = ""){
    foreach ($data as $key => $val){
      $id_list = $val["id"];
      
      if($val["parent_id"] == $parent){
?>
      <tr>
         <!-- icon -->
         <td class="" width="1%">
         <?php echo html_entity_decode( $val -> icon);?>
         </td>
         <!-- ten list -->
         <td class="">
            <?php echo $str; ?>
               <a href="#" data-toggle="modal" data-target="#edit_list_<?php echo $val -> id ?>">
                  <?php echo $val-> name;  ?>
               </a>
            </a>
         </td>
         <td class="">
            <?php echo $str; ?>
               <a>
                  <?php echo $val-> url;  ?>
               </a>
            </a>
         </td>
         <?php if($list -> type == 'price_month'){?>
            <td class="">
               <?php echo $val->price;  ?>
            </td>
            <td class="">
               <?php echo $val-> saleoff;  ?>
            </td>
         <?php }?>
         <!-- thu hang  -->
         <td>
            <?php echo $val-> order_list ?> 
         </td>
         <!-- hanh dong -->
         <td>
            <!-- sua -->
            <a  href="" data-toggle="modal" data-target="#edit_list_<?php echo $id_list ?>">
               <i class="fa fa-edit"></i>
            </a>
            <!-- mac dinh    -->
            <?php if($val -> def == 'on'){ echo '<i class="fa fa-shield-alt text-primary"></i>'; } ?>
            <!-- xoa -->
            <?php if(Auth::user()->can('list_del')){ ?>
               <a  href="" data-toggle="modal" data-target="#call_del_<?php echo $id_list ?>">
                  <i class="fa fa-trash text-danger"></i>
               </a>
               <div class="modal fade" id="call_del_<?php echo $id_list ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">   
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title"><i class="fa fa-trash text-danger"></i> B???n c?? ch???c ch???n mu???n x??a?</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                       
                        <div class="modal-footer">
                           <button type="button" class="btn btn-primary" data-dismiss="modal">????ng</button>
                           <a href="<?php echo asset('admin/list/'.$val->list_id.'/del/'.$val->id) ?>" role="button" class="btn btn-danger">Ok X??a</a>
                        </div>
                     </div>
                  </div>
               </div>
            <?php } ?>
  
         </td>
         <!-- id list -->
         <td>
            <?php echo $id_list; ?>
         </td>
      </tr>
      <!-- model edit list custome -->
         <div class="modal fade" id="edit_list_<?php echo $val -> id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <form action="<?php echo asset('admin/list/'.$val -> list_id.'/edit/'.$val -> id) ?>" method="post"  enctype="multipart/form-data">
               <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
               <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">S???a list</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label><i class="fa fa-list"></i> T??n list (b???t bu???c)</label>
                        <input type="text" value="<?php echo $val ->name ?>" class="form-control" placeholder="B???n ??i???n danh s??ch" name="name">
                     </div>
                     <?php if($list -> type == 'price_month'){?>
                        <div class="form-group">
                           <label> Gi??</label>
                           <input type="text" value="<?php echo $val ->price ?>" class="form-control" placeholder="B???n ??i???n gi?? 1" name="price">
                        </div>
                        <div class="form-group">
                           <label> Gi?? khuy???n m???i</label>
                           <input type="text" value="<?php echo $val ->saleoff ?>" class="form-control" placeholder="B???n ??i???n gi?? 2" name="saleoff">
                        </div>
                     <?php }?>
                     <?php if(Auth::user() -> id == '1'){ ?>
                        <div class="form-group form-check">
                           <input type="checkbox" class="form-check-input" id="def_<?php echo $val -> id ?>" name="def" value="on" <?php if($val -> def == 'on'){echo 'checked';} ?>>
                           <label class="form-check-label" for="def_<?php echo $val -> id ?>">Gi?? tr??? m???c ?????nh (ch??? root c?? quy???n x??a)</label>
                        </div>
                     <?php } ?>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">????ng</button>
                  <button type="submit" class="btn btn-primary">G???i</button>
                  </div>
               </div>
            </div>
            </form>
         </div>
<?php
         F_list_multi_level($data,$list,$id_list,$str."&nbsp---");//de quuy danh muc
      }//end if parent
   }//end foreach data
}//end funcito