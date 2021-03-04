<form action="{{ route('lop.add.post') }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-2">
                       
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Lớp (Duy Nhất):
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-file-code-o"></i>
                                    <input type="text" class="form-control" name="malop" value="{{ old('malop') }}" required  /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-briefcase"></i>
                                    <input type="text" class="form-control" name="tenlop" value="{{ old('tenlop') }}" required  /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Quy Mô:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-book"></i>
                                    <input type="float" class="form-control" name="quymo" required value="{{ old('quymo') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Hệ: (Nhập 1 nếu tính giờ, Nhập 0 nếu tính tiền)
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="number" step="any" class="form-control" name="he" required value="{{ old('he') }}" /> </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-2">
                       
                    </div>
                </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                        </div>
                    </div>
                
            </div>
        </div>
        <!-- END TAB 1-->
       
    </div>
    

</form>