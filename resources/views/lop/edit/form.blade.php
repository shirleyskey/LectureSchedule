<form action="{{ route('lop.edit.post', $lop->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 1-->
        <div class="tab-pane active" id="tab1">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-4">Mã Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-file-code-o"></i>
                                    <input type="text" class="form-control" name="malop" value="{{ $lop->malop }}" required maxlength="191" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Tên Lớp:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-building-o"></i>
                                    <input type="text" class="form-control" name="tenlop" value="{{ $lop->tenlop }}" required maxlength="191" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Quy Mô:
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-home"></i>
                                    <input type="number" class="form-control" name="quymo" required maxlength="191" value="{{ $lop->quymo }}" /> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Hệ: (Nhập 1 nế u tính giờ, Nhập 0 nếu tính tiền)
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-7">
                                <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="number" step="any" required class="form-control" name="he" value="{{ $lop->he }}" /> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
        <!-- END TAB 1-->
        <!-- BEGIN TAB 2 NCKH-->
        <div class="tab-pane" id="tab2">
           
            @if($hocphan->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                @permission('read-users')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hocphan"><i class="fa fa-plus"></i> Tạo Học Phần
                                            
                                        </a>
                                    </div>
                                @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_hocphan">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Mã Học Phần</th>
                                    <th> Tên Học Phần</th>
                                    <th> Số Tiết</th>
                                    <th> Số Tín Chỉ</th>
                                    <th> Số Bài</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @if( $hocphan->count() > 0 )
                                        @php $stt = 1; @endphp
                                        @foreach( $hocphan as $v )
                                        @php 
                                            $so_tiet = 0;
                                            $is_tiet = App\Tiet::where('id_hocphan', $v->id);
                                            if($is_tiet){
                                                $tiet_hocphans = App\Tiet::where('id_hocphan', $v->id)->get();
                                                $start = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian', 'asc')->first();
                                                $end = App\Tiet::where('id_hocphan', $v->id)->orderBy('thoigian', 'desc')->first();
                                                $start_result = ($start) ? $start->thoigian : null;
                                                $end_result = ($end) ? $end->thoigian : null;
                                                foreach($tiet_hocphans as $v_tiet_hocphan){
                                                    $so_tiet += $v_tiet_hocphan->so_tiet;
                                                }
                                            }
                                        @endphp
                                        <tr>
                                            <td> {{ $stt }} </td>
                                            <td> {{ $v->mahocphan }} </td>
                                            <td> {{ $v->tenhocphan }} </td>
                                            <td> {{ $so_tiet }}  </td>
                                            <td> {{ $v->sotinchi }} </td>
                                            <td> 
                                            @php 
                                                 $sobai = App\Bai::where('id_hocphan', $v->id)->get()->count();  
                                                 echo $sobai;
                                            @endphp
                                             </td>
                                            <td>{{ $start_result }} </td>
                                            <td> {{  $end_result }} </td>
                                           
                                           
                                            <td>
                                                @permission('read-hocphan')
                                                <a class="btn btn-xs blue-sharp" href="{{ route('hocphan.read.get', $v->id) }}" title="Xem"> <i class="fa fa-eye"></i> Xem</a>
                                                @endpermission
                                                @permission('update-hocphan')
                                                <a class="btn btn-xs yellow-gold" href="{{ route('hocphan.edit.get', $v->id) }}" title="Sửa"> <i class="fa fa-edit"></i> Sửa</a>
                                                @endpermission
                                                @permission('delete-hocphan')
                                                {{-- <a class="btn btn-xs red-mint" href="{{ route('hocphan.delete.get', $v->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa Học Phần này không?Lưu ý: Học Phần sẽ bị xóa vĩnh viễn cùng những bài học, tiết học, và hoạt động chấm bài liên quan!');" title="Xóa"> <i class="fa fa-trash"></i> Xóa</a> --}}
                                                {{-- <a class="btn_edit_hocphan btn btn-xs yellow-gold" data-hocphan-id="{{ $v->id }}" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a> --}}
                                                <a class="btn_delete_hocphan btn btn-xs red-mint" data-hocphan-id="{{ $v->id }}" href=""  title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
                                                @endpermission
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
                    <p> Lớp này chưa có Học Phần nào. </p>
                    @permission('read-users')
                        <div class="btn-group">
                            <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hocphan"><i class="fa fa-plus"></i> Tạo Học Phần
                                
                            </a>
                        </div>
                    @endpermission
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
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_add_hocphan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="post" id="form_add_hocphan">
                <input value="{{ $lop->id }}" name="id_lop" type="hidden">
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
                                {{-- <div class="form-group">
                                    <label>Số Tiết:<span class="required">*</span></label>
                                    <input name="sotiet" type="number" class="form-control" required>
                                </div>  --}}
                                <div class="form-group">
                                    <label>Số Tín Chỉ:<span class="required">*</span></label>
                                    <input class="form-control" name="sotinchi" type="number" required />
                                </div>
                                {{-- <div class="form-group">
                                    <label>Bắt Đầu:</label>
                                    <input class="form-control" name="start" type="date" placeholder="dd-mm-yyyy" />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:</label>
                                    <input class="form-control" name="end" type="date" placeholder="dd-mm-yyyy" />
                                </div> --}}
                               
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

<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_hocphan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_hocphan">
                @csrf
                <input value="" name="id_lop" type="hidden">
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Học Phần</h4>
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
                                {{-- <div class="form-group">
                                    <label>Số Tiết:<span class="required">*</span></label>
                                    <input name="sotiet" type="number" class="form-control" required>
                                </div>  --}}
                                <div class="form-group">
                                    <label>Số Tín Chỉ:<span class="required">*</span></label>
                                    <input class="form-control" name="sotinchi" type="number" required />
                                </div>
                                {{-- <div class="form-group">
                                    <label>Bắt Đầu:<span class="required">*</span></label>
                                    <input class="form-control" name="start" type="date" placeholder="dd-mm-yyyy" required />
                                </div>
                                <div class="form-group">
                                    <label>Kết Thúc:<span class="required">*</span></label>
                                    <input class="form-control" name="end" type="date" placeholder="dd-mm-yyyy" required />
                                </div> --}}
                                
                            </div>
                            <div class="col-md-6">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_hocphan"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
