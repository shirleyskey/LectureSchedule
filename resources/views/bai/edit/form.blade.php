<form action="{{ route('bai.edit.post', $bai->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Bài:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="tenbai" value="{{ $bai->tenbai }}" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Học Phần:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="id_hocphan" value="{{ $bai->hocphans->id }}" hidden/> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Lớp:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="text" class="form-control" name="tenhocphan" readonly value="{{ $bai->hocphans->lops->tenlop }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Tiết:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="sotiet" value="{{ $bai->sotiet }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Giảng Viên Chính:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <select class="form-control" name="gvchinh">
                                        <option value="{{$bai->gvchinh}}">{{$bai->giangvienchinhs->ten}}</option>
                                            @if($ds_giangvien->count()>0)
                                                @foreach($ds_giangvien as $v)
                                            <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Giảng Viên Tham Gia:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <select class="form-control" name="gvphu">
                                        <option value="{{$bai->gvphu}}">{{$bai->giangvienphus->ten}}</option>
                                            @if($ds_giangvien->count()>0)
                                                @foreach($ds_giangvien as $v)
                                            <option value="{{ $v->id }}" <?php echo (old('id') == $v->id) ? 'selected' : ''; ?>>{{ $v->ten }}</option>
                                                @endforeach
                                            @endif
                                    </select>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">LýT GVC:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="lythuyet" value="{{ $bai->lythuyet}}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Xemina GVC:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="xemina" value="{{ $bai->xemina}}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">TH/TL GVC:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="thuchanh" value="{{ $bai->thuchanh}}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">LýT GV Tham Gia:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="lythuyet_phu" value="{{ $bai->lythuyet_phu}}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Xemina GV Tham Gia:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="xemina_phu" value="{{ $bai->xemina_phu}}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">TH/TL GV Tham Gia:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="thuchanh_phu" value="{{ $bai->thuchanh_phu}}" /> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
        <!-- BEGIN TAB 2 NCKH-->
        <div class="tab-pane" id="tab2">
            @if($tiet->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_tiet"><i class="fa fa-plus"></i> Tạo Tiết Học
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_tiet">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Tiết Học</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $tiet->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $tiet as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->title }} </td>
                                        <td> {{ $v->start }} </td>
                                        <td> {{ $v->end }} </td>
                                        <td>
                                            <a data-tiet-id="{{ $v->id }}" class="btn_edit_tiet btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_tiet btn btn-xs red-mint" href="#" data-tiet-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                        </td>
                                    </tr>
                                    @php $stt++; @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            @else
                <div class="alert alert-danger" style="margin-bottom: 0px;">
                    <p> Bài Học này chưa có tiết học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_tiet"><i class="fa fa-plus"></i> Tạo Tiết Học Mới</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 2-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>
@include('tiet.modals.add')
@include('tiet.modals.edit')
 