<form action="{{ route('khac.edit.get')}}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
         <!-- BEGIN XỬ LÝ VĂN BẢN-->
         <div class="tab-pane active" id="tab_vanban">
            @if($vanban->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Mới Văn Bản Xử Lý

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_vanban">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Nội Dung</th>
                                    <th> Tên Giảng Viên</th>
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
                                        <td>
                                            @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                            {{ $v->giangviens->ten }}
                                            @endif

                                         </td>
                                        <td> {{ $v->lanhdao }} </td>
                                         <td> {{ $v->thoigian_nhan }} </td>
                                         <td> {{ $v->thoigian_den }} </td>
                                         <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-vanban-id="{{ $v->id }}" class="btn_edit_vanban btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_vanban btn btn-xs red-mint" href="#" data-vanban-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Văn Bản nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_vanban"><i class="fa fa-plus"></i> Thêm Văn Bản Xử Lý</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END XỬ LÝ VĂN BẢN-->
       

           <!-- BEGIN TAB 5-->
           <div class="tab-pane" id="tab5">
            @if($dang->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_dang">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Nội Dung </th>
                                    <th> Tên Giảng Viên</th>
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
                                        <td>
                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                        {{ $v->giangviens->ten }}
                                        @endif
                                        </td>
                                        <td> {{ $v->ket_qua }} </td>
                                        <td> {{ $v->vai_tro }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-dang-id="{{ $v->id }}" class="btn_edit_dang btn btn-xs yellow-gold" href="#modal_edit_dang" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dang btn btn-xs red-mint" href="#" data-dang-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không tham gia hoạt động Đảng/Đoàn nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Hoạt Động</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 5-->

         
         <!-- BEGIN TAB 7-->
         <div class="tab-pane" id="tab7">
            @if($xaydung->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Xây Dựng Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_xaydung">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Chương Trình</th>
                                    <th> Tên Giảng Viên</th>
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
                                        <td> 
                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                        {{ $v->giangviens->ten }}
                                        @endif
                                        </td>
                                        <td> {{ $v->hocphan }} </td>
                                        <td> {{ $v->khoa }} </td>
                                        <td> {{ $v->vai_tro }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-xaydung-id="{{ $v->id }}" class="btn_edit_xaydung btn btn-xs yellow-gold" href="#modal_edit_xaydung" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_xaydung btn btn-xs red-mint" href="#" data-xaydung-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có hoạt động Xây Dựng CHương Trình nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo XD Chương Trình Mới</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 7-->
        
    </div>
  

</form>
