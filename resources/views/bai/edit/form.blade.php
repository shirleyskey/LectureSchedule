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
                                        <option value="{{($bai->gvchinh) ? $bai->gvchinh : null}}">{{($bai->gvchinh) ? $bai->giangvienchinhs->ten : ''}}</option>
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
                            <label class="control-label col-md-4">Giảng Viên Phụ:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-phone"></i>
                                    <select class="form-control" name="gvphu" multiple>
                                        <option value="{{($bai->gvphu) ? $bai->gvphu : null}}">{{($bai->gvchinh) ? $bai->giangvienchinhs->ten : ''}}</option>
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
                    </div>
                    <div class="col-md-6">
                      
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
        <div class="form-actions">
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                </div>
            </div>
        </div>
        <!-- BEGIN TAB 2 NCKH-->
        <ul class="nav nav-pills" id="">
            <li  class="active">
                <a href="" data-toggle="">Danh Sách Tiết Học</a>
            </li>
        </ul>
        <div class="" id="">
            @if($tiet->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_tiet"><i class="fa fa-plus"></i> Tạo Tiết Học
                                            
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_tiet">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Thời Gian</th>
                                    <th> Buổi </th>
                                    <th> Ca</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Hành Động</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @if( $tiet->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $tiet as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->buoi}} </td>
                                        <td> {{ $v->ca}} </td>
                                        <td> {{ ($v->id_giangvien) ? $v->giangviens->ten : '' }} </td>
                                        <td>
                                            <a class="btn btn-xs yellow-gold" href="{{route('lichgiang.lichgiangtuan.get', $v->id)}}" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
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
                    <p> Bài Học này chưa có tiết học nào. </p>
                </div>
            @endif
        </div>
        <!-- END TAB 2-->
    </div>
   

</form>
@include('tiet.modals.add')
@include('tiet.modals.edit')
 