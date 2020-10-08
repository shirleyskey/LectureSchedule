<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_hocphan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hocphan">
                <input value="<?php echo e($lop->id); ?>" name="id_lop" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Học Phần</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mã Học Phần: <span class="required">*</span></label>
                                    <input  name="mahocphan" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Tên Học Phần: <span class="required">*</span></label>
                                    <input  name="tenhocphan" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Số Tiết:<span class="required">*</span></label>
                                    <input name="sotiet" type="number" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Số Tín Chỉ:<span class="required">*</span></label>
                                    <input class="form-control" name="sotinchi" type="number" required />
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="start" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="end" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_hocphan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->