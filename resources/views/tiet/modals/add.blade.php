<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_tiet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_tiet">
                <input value="{{ $bai->id }}" name="id_bai" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Thêm mới Tiết Học</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên: <span class="required">*</span></label>
                                    <input  name="title" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input name="start" type="date" class="form-control" required>
                                </div> 
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input name="end" type="date" class="form-control" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_add_tiet"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->