<form action="{{ route('profile.edit.post', $giangvien->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
         <!-- BEGIN TAB 3-->
        <div class="tab-pane " id="tab7">
                    @if($xaydung->isNotEmpty())
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Xây Dựng Chương Trình Mới

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover table-bordered" id="table_ds_xaydung">
                                    <thead>
                                        <tr>
                                            <th> STT</th>
                                            <th> Tên Chương Trình</th>
                                            <th> Học Phần</th>
                                            <th> Khóa</th>
                                            <th> Vai Trò</th>
                                            <th> Thời Gian</th>
                                            <th> Ghi Chú</th>
                                            <th> Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if( $xaydung->count() > 0 )
                                            @php $stt = 1; @endphp
                                            @foreach( $xaydung as $v )
                                            <tr>
                                                <td> {{ $stt }} </td>
                                                <td> {{ $v->ten }} </td>
                                                <td> {{ $v->hocphan }} </td>
                                                <td> {{ $v->khoa }} </td>
                                                <td> {{ $v->vai_tro }} </td>
                                                <td> {{ $v->thoigian }} </td>
                                                <td> {{ $v->ghichu }} </td>
                                                <td>
                                                    <a data-xaydung-id="{{ $v->id }}" class="btn_edit_xaydung btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                                    <a class="btn_delete_xaydung btn btn-xs red-mint" href="#" data-xaydung-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                            <p> Giảng Viên này không có Xây Dựng Chương Trình nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Xây Dựng Chương Trình</a></p>
                        </div>
                    @endif 
                </div>
                <!-- END TAB 3-->
           <!-- BEGIN TAB 5-->
           <div class="tab-pane" id="tab5">
            @if($dang->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động Mới

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Nội Dung</th>
                                    <th> Kết Quả</th>
                                    <th> Vai Trò</th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $dang->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $dang as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->ket_qua }} </td>
                                        <td> {{ $v->vai_tro }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-dang-id="{{ $v->id }}" class="btn_edit_dang btn btn-xs yellow-gold" href="#modal_edit_dang" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dang btn btn-xs red-mint" href="#" data-dang-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Giảng Viên này không tham gia hoạt động Đảng/Đoàn nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo HĐ Mới</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 5-->
        <!-- BEGIN XỬ LÝ VĂN BẢN-->
        <div class="tab-pane active" id="tab_vanban">
            @if($vanban->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Văn Bản Mới

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_vanban">
                            <thead>
                                <tr>
                                <th> STT</th>
                                    <th> Nội Dung</th>
                                    <th> Lãnh Đạo Xử Lý</th>
                                    <th> Thời Gian Nhận</th>
                                    <th> Hạn</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $vanban->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $vanban as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->noi_dung }} </td>
                                        <td> {{ $v->lanhdao }} </td>
                                        <td> {{ $v->thoigian_nhan }} </td>
                                        <td> {{ $v->thoigian_den }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-vanban-id="{{ $v->id }}" class="btn_edit_vanban btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_vanban btn btn-xs red-mint" href="#" data-vanban-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có văn bản nào!  <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Văn Bản </a></p>
                </div>
            @endif
        </div>
        <!-- END XỬ LÝ VĂN BẢN-->
    </div>
</form>
@include('xaydung.modals.add')
@include('xaydung.modals.edit')
@include('dang.modals.add')
@include('dang.modals.edit')
@include('vanban.modals.add')
@include('vanban.modals.edit')
