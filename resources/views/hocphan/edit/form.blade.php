<form action="{{ route('hocphan.edit.post', $hocphan->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Học Phần:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="mahocphan" value="{{ $hocphan->mahocphan }}" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Học Phần:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="tenhocphan" value="{{ $hocphan->tenhocphan }}" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" readonly name="tenlop" value="{{ $hocphan->lops->tenlop }}" required /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Tiết:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="sotiet" required value="{{ $hocphan->sotiet }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Tín Chỉ:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" step="any" class="form-control" name="sotinchi" value="{{ $hocphan->sotinchi }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Số Bài:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" step="any" class="form-control" name="sobai" value="{{ $hocphan->sobai }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày Bắt Đầu:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="date" class="form-control" name="sobai" value="{{ $hocphan->start }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Ngày Kết Thúc:
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="date" class="form-control" name="sobai" value="{{ $hocphan->end }}" /> </div>
                            </div>
                        </div>
                      
                        @permission('read-users')
                        <div class="col-md-12">
                            <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
                        </div>
                        @endpermission
                   
                    
                    </div>
                    <div class="col-md-6">
                    </div>

                   
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
        <!-- BEGIN TAB 2 NCKH-->
        <h2 class="text-center bold">Danh Sách Bài Học</h2>
        <div id="tab2">
            @if($bai->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                @permission('read-users')
                                   <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_bai"><i class="fa fa-plus"></i> Tạo Bài Học Mới
                                            
                                        </a>
                                    </div> 
                                </div>
                                @endpermission
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_bai">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Bài</th>
                                    <th> Số Tiết</th>
                                    <th> GV Chính</th>
                                    <th> GV Phụ </th>
                                    <th> Hành Động </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @if( $bai->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $bai as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->tenbai }} </td>
                                        <td> {{ $v->sotiet }} </td>
                                        <td> {{ ($v->gvchinh) ? ($v->giangvienchinhs->ten) : '' }} </td>
                                        <td>
                                            @php
                                                $gvphu = json_decode($v->gvphu, true);
                                            @endphp
                                                @if($gvphu != null)
                                                @foreach($gvphu as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                    <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                @endif
                                                @endforeach
                                                @endif
                                        </td>
                                        <td>
                                        @permission('read-users')
                                        <a class="btn_edit_bai btn btn-xs yellow-gold" data-bai-id="{{ $v->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                        <a class="btn_delete_bai btn btn-xs red-mint" data-bai-id="{{ $v->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                       @endpermission
                                        <a class="btn btn-xs blue-sharp" href="{{ route('bai.edit.post', $v->id) }}" title="Xem"> <i class="fa fa-eye"></i> Danh Sách Tiết Học</a>
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
                    <p> Học Phần này chưa có bài học nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_bai"><i class="fa fa-plus"></i> Tạo Bài Học Mới</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 2-->
    </div>
    

</form>
@include('bai.modals.add')
@include('bai.modals.edit')
