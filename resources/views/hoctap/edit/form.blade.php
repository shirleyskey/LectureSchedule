<form action="{{ route('hoctap.edit.post', $hoctap->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label class="control-label col-md-4">Họ tên
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <select class="form-control" name="id_giangvien">
                                        <option value="0">-------- Chọn Giảng Viên --------</option>
                                        @if($giangvien->count()>0)
                                            @foreach($giangvien as $v)
                                            <option value="{{ $v->id }}">{{ $v->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Tham Gia Học Tập:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="ten" required maxlength="191" value="{{ $hoctap->ten }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Thời Gian:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="date" class="form-control" name="thoigian" value="{{ $hoctap->thoigian }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ghi Chú:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" class="form-control" name="ghichu" value="{{ $hoctap->ghichu }}" /> </div>
                            </div>
                        </div>
                       
                       
                    </div>
                    <div class="col-md-6">
                        
                       
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
