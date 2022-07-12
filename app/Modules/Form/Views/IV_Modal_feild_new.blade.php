
<div class="modal fade" id="new_feild" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <form action="{{asset('admin/form/'.$form_id.'/new_feild')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-dialog modal-dialog-centered" role="document">
     
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalCenterTitle">Thêm trường dữ liệu</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
            </div>
            <div class="modal-body">
               <!-- ten feild thuoc tinh-->
                  <div class="form-group">
                     <label class="font-weight-bold">Chọn trường</label>
                     @if($form -> full_name != 'on')
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="full_name" name="feild[full_name]">
                           <label class="form-check-label" for="full_name">
                              Họ và tên
                           </label>
                        </div>
                     @endif
                     @if($form -> tel != 'on')
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="tel"  name="feild[tel]">
                           <label class="form-check-label" for="tel">
                              Số diện thoại
                           </label>
                        </div>
                     @endif
                     @if($form -> email != 'on')
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="email" name="feild[email]">
                           <label class="form-check-label" for="email">
                              Email
                           </label>
                        </div>
                     @endif
                     @if($form -> request != 'on')
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="request" name="feild[request]">
                           <label class="form-check-label" for="request">
                           Yêu cầu (đoạn văn)
                           </label>
                        </div>
                     @endif
                     @if($form -> care == '' or $form -> care == null)
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" id="care" name="feild[care]">
                           <label class="form-check-label" for="care">Quan tâm (mỗi dòng 1 tùy chọn)</label>
                           <textarea rows="4" name="feild[care_option]" class="form-control"></textarea>
                        </div>
                     @endif
                  </div>

                  
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">Gửi</button>
               </div>     
            </div> <!-- dong the modal -body -->
         </div>
      </div>
   </form>
</div>