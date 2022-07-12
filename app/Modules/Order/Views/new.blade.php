<div class="modal fade" id="call_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">   
       <div class="modal-content">
          <div class="modal-header">
             <h6 class="modal-title" id="exampleModalCenterTitle"><i class="text-danger fa fa-edit"></i> Thêm mơi</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body text-left">
               <form action="{{asset('admin/order/new')}}" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               <div class="row">
                       <div class="col-md-4">
                          <div class="form-group">
                                <label>Họ và tên</label>
                                   {{F_input_basic('text','','name','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                     
                       <div class="col-md-4">
                          <div class="form-group">
                                <label>Số điện thoại</label>
                                   {{F_input_basic('text','','tel','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <div class="col-md-4">
                          <div class="form-group">
                                   <label>Email</label>
                                   {{F_input_basic('text','','email','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <!-- chung minh thu  -->
                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Số chứng minh thư</label>
                               {{F_input_basic('text','','cmt','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <!-- ngay tham gia  -->
                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Ngày tham gia</label>
                               {{F_input_basic('text','','ngay_tham_gia','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Số hợp đồng</label>
                               {{F_input_basic('text','','so_hop_dong','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Số lô</label>
                               {{F_input_basic('text','','so_lo','','form-control form-control-sm','','')}}
                          </div>
                       </div>

                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Diện tích m2</label>
                               {{F_input_basic('text','','dien_tich','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Nhóm</label>
                               {{F_input_basic('text','','nhom','','form-control form-control-sm','','')}}
                          </div>
                       </div>

                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Đã góp</label>
                               {{F_input_basic('text','','da_gop_von','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <div class="col-md-4">
                          <div class="form-group">
                               <label>Còn lại</label>
                               {{F_input_basic('text','','con_lai','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <div class="col-md-12">
                          <div class="form-group">
                               <label>Lịch sử</label>
                               <textarea name="lich_su" class="form-control form-control-sm"></textarea>
                          </div>
                       </div>
                       <div class="col-md-12">
                          <div class="form-group">
                               <label>Ghi chú</label>
                               <textarea name="note" class="form-control form-control-sm"></textarea>
                          </div>
                       </div>
                      
                       <div class="col-md-12">
                          <div class="form-group">
                                <label>Địa chỉ</label>
                                   {{F_input_basic('text','','address','','form-control form-control-sm','','')}}
                          </div>
                       </div>
                       <div class="col-md-12">
                         <div class="form-group">
                               <label>Yêu cầu</label>
                                  {{F_input_basic('textarea','','content','','form-control form-control-sm','','')}}
                         </div>
                      </div>
                      
                       <div class="col-md-6">
                          <div class="form-group">
                             <label>Trạng thái liên hệ</label>
                             <select name="status" class="form-control form-control-sm">
                                <option value="on">Đã xem</option>
                                <option value="off">Mới</option>
                             </select>
                          </div>
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