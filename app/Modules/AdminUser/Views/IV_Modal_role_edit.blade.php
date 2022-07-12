<div class="modal fade" id="edit_role_{{$val->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <form action="{{asset('admin/user/role/edit/'.$val->id)}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Sửa nhóm quyền</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <!-- ten dinh dang -->
                    <div class="form-group">
                        <label><i class="fa fa-user-secret"></i> <b>Tên nhóm quyền</b></label>
                        <input type="text" class="form-control" name="name" value="{{$val->name}}">
                    </div>
                    <!-- url -->
                    <div class="form-group">
                        <label><b>URL</b></label>
                        <input type="text" class="form-control" name="url" value="{{$val->url}}">
                    </div>
                    <div class="form-group">
                        <label> <b>Loại quyền</b></label>
                        <select name="type" class="form-control">
                            <option value="domain" @if($val->type == 'domain') selected @endif>Domain</option>
                            <option value="customer" @if($val->type == 'customer') selected @endif>Customer</option>
                            <option value="root" @if($val->type == 'root') selected @endif>Root</option>
                            <option value="admin" @if($val->type == 'admin') selected @endif>Admin</option>
                            <option value="editor" @if($val->type == 'editor') selected @endif>Biên tập</option>
                        </select>
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
