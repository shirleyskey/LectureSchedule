<form action="{{ route('hocphan.add.post') }}" method="post" id="form_sample_2" class="form-horizontal">
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
                            <label class="control-label col-md-4">Tên Lớp
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <select class="form-control" name="id_lop">
                                        <option value="0">-------- Chọn Lớp --------</option>
                                        @if($ds_lop->count()>0)
                                            @foreach($ds_lop as $v)
                                            <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->tenlop }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Học Phần:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control"  required name="mahocphan" value="{{ old('mahocphan') }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Học Phần:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control" required name="tenhocphan" value="{{ old('tenhocphan') }}" /> </div>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Tín Chỉ:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" step="any" required class="form-control" name="sotinchi" value="{{ old('sotinchi') }}" /> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
       
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>