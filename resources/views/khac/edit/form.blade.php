<form action="{{ route('khac.edit.get')}}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 3-->
        <div class="tab-pane" id="tab3">
            @if($congtac->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Địa Bàn</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $congtac->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $congtac as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td>
                                            @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                            {{ $v->giangviens->ten }}
                                            @endif

                                         </td>
                                        <td> {{ $v->thoigian }} </td>
                                         <td> {{ $v->so_gio }} </td>
                                         <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-congtac-id="{{ $v->id }}" class="btn_edit_congtac btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_congtac btn btn-xs red-mint" href="#" data-congtac-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Đi Thưc Tế nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Đi Thực Tế</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 3-->
         <!-- BEGIN TAB Họp-->
        <div class="tab-pane" id="tab_hop">
            @if($hop->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_hop">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Cuộc Họp</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $hop->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $hop as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td>
                                            @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                            {{ $v->giangviens->ma_giangvien.'-'.$v->giangviens->ten }}
                                            @endif

                                         </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-hop-id="{{ $v->id }}" class="btn_edit_hop btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hop btn btn-xs red-mint" href="#" data-hop-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Cuộc Họp  nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hop"><i class="fa fa-plus"></i> Tạo Cuộc Họp</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB Họp-->

         <!-- BEGIN TAB 4-->
         <div class="tab-pane" id="tab4">
            @if($chambai->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Tên Lớp</th>
                                    <th> Tên Học Phần </th>
                                    <th> Số Bài</th>
                                    <th> Số Giờ</th>
                                    <th> Thời Gian </th>
                                    <th> Ghi Chú </th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $chambai->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $chambai as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td>
                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                        {{ $v->giangviens->ten }}
                                        @endif
                                        </td>
                                        <td> {{ ($v->id_lop) ? ($v->lops->tenlop) : '' }} </td>
                                        <td> {{ ($v->id_hocphan) ? ($v->hocphans->mahocphan) : '' }} </td>
                                        <td> {{ $v->so_bai }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-chambai-id="{{ $v->id }}" class="btn_edit_chambai btn btn-xs yellow-gold" href="#modal_edit_chambai" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_chambai btn btn-xs red-mint" href="#" data-chambai-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Chấm Bài nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 4-->

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
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Thời Gian</th>
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
                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                        {{ $v->giangviens->ten }}
                                        @endif
                                        <td> {{ $v->thoigian }} </td>
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
          <div class="tab-pane" id="tab6">
            @if($daygioi->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Tên Bài </th>
                                    <th> Cấp</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $daygioi->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $daygioi as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td>
                                            @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                            {{ $v->giangviens->ten }}
                                            @endif
                                        </td>
                                       
                                        <td> 
                                            @php
                                                if($v->cap == 1){
                                                    echo "Cấp Khoa";
                                                }
                                                if($v->cap == 2){
                                                    echo "Cấp Học Viện";
                                                }
                                                if($v->cap == 3){
                                                    echo "Cấp Bộ";
                                                }
                                            @endphp
                                        </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-daygioi-id="{{ $v->id }}" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có hoạt động Dạy Giỏi nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 7-->
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
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
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

           <!-- BEGIN TAB 8-->
           <div class="tab-pane" id="tab8">
            @if($dotxuat->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo CV Đột Xuất Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $dotxuat->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $dotxuat as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                        {{ $v->giangviens->ten }}
                                        @endif
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-dotxuat-id="{{ $v->id }}" class="btn_edit_dotxuat btn btn-xs yellow-gold" href="#modal_edit_dotxuat" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dotxuat btn btn-xs red-mint" href="#" data-dotxuat-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p>Không có Công Việc Đột Xuất nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo Đột Xuất Mới</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 8-->
         <!-- BEGIN TAB 9-->
         <div class="tab-pane" id="tab9">
            @if($sangkien->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Cải Tiến

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên </th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Thời Gian</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $sangkien->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $sangkien as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                        {{ $v->giangviens->ten }}
                                        @endif
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-sangkien-id="{{ $v->id }}" class="btn_edit_sangkien btn btn-xs yellow-gold" href="#modal_edit_sangkien" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_sangkien btn btn-xs red-mint" href="#" data-sangkien-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p>Không có Sáng Kiến Cải Tiến nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Mới</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 9-->
         <!-- BEGIN TAB 10-->
         <div class="tab-pane" id="tab10">
            @if($hoctap->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Tên Lớp </th>
                                    <th> Loại Hình</th>
                                    <th> Số Giờ</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $hoctap->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $hoctap as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                       <td>
                                        @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                        {{ $v->giangviens->ten }}
                                        @endif
                                        </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->loai_hinh }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->thoigian_den }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-hoctap-id="{{ $v->id }}" class="btn_edit_hoctap btn btn-xs yellow-gold" href="#modal_edit_hoctap" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hoctap btn btn-xs red-mint" href="#" data-hoctap-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không tham gia Học Tập Nào nào.
                        @permission('create-giangvien')
                         <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới</a></p>
                        @endpermission
                </div>
            @endif
        </div>
        <!-- END TAB 10-->
          <!-- BEGIN TAB 11 KHÓA LUẬN-->
          <div class="tab-pane" id="tab11">
            @if($khoaluan->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_khoaluan"><i class="fa fa-plus"></i> Thêm Khóa Luân

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_khoaluan">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Khóa Luận</th>
                                    <th> Hướng Dẫn</th>
                                    <th> Chủ Tịch Chấm</th>
                                    <th> Tham Gia Chấm</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $khoaluan->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $khoaluan as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td>
                                            @php
                                                $huongdan = json_decode( $v->huongdan, true);
                                            @endphp
                                                @foreach($huongdan as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $chutichcham = json_decode( $v->chutichcham, true);
                                            @endphp
                                                @foreach($chutichcham as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $thamgiacham = json_decode( $v->thamgiacham, true);
                                            @endphp
                                                @foreach($thamgiacham as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                            </td>

                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-khoaluan-id="{{ $v->id }}" class="btn_edit_khoaluan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_khoaluan btn btn-xs red-mint" href="#" data-khoaluan-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Khóa Luận nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_khoaluan"><i class="fa fa-plus"></i> Tạo Khóa Luận Mới</a>
                        @endpermission
                    </p>
                </div>
            @endif
        </div>
        <!-- END TAB 11-->

         <!-- BEGIN TAB 12 LUẬN VĂN-->
         <div class="tab-pane" id="tab12">
            @if($luanvan->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_luanvan"><i class="fa fa-plus"></i> Thêm Luận Văn

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_luanvan">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Luận Văn</th>
                                    <th> Hướng Dẫn</th>
                                    <th> Chủ Tịch Chấm</th>
                                    <th> Phản Biện Chấm</th>
                                    <th> Thư Ký Chấm</th>
                                    <th> Ủy Viên Chấm</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $luanvan->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $luanvan as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td>
                                            @php
                                                $huongdan = json_decode( $v->huongdan, true);
                                            @endphp
                                                @foreach($huongdan as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                            $chutich = json_decode( $v->chutich, true);
                                        @endphp
                                            @foreach($chutich as $key => $value)
                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $phanbien = json_decode( $v->phanbien, true);
                                            @endphp
                                                @foreach($phanbien as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $thuky = json_decode( $v->thuky, true);
                                            @endphp
                                                @foreach($thuky as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $uyvien = json_decode( $v->uyvien, true);
                                            @endphp
                                                @foreach($uyvien as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>

                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-luanvan-id="{{ $v->id }}" class="btn_edit_luanvan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_luanvan btn btn-xs red-mint" href="#" data-luanvan-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Luận Văn nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_luanvan"><i class="fa fa-plus"></i> Tạo Luận Văn Mới</a>
                        @endpermission
                    </p>
                </div>
            @endif
        </div>
        <!-- END TAB 12-->

          <!-- BEGIN TAB 13 LUẬN ÁN-->
          <div class="tab-pane" id="tab13">
            @if($luanan->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_luanan"><i class="fa fa-plus"></i> Thêm Luận Án

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_luanan">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Luận Án</th>
                                    <th> Hướng Dẫn</th>
                                    <th> Đọc và NX</th>
                                    <th> Chủ Tịch HT</th>
                                    <th> Thành Viên HT</th>
                                    <th> Chủ Tịch Chấm</th>
                                    <th> Thành Viên Chấm</th>
                                    <th> Cấp</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $luanan->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $luanan as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td>
                                            <p>{{ ($v->huongdanchinh) ? ($tengv = App\GiangVien::where('id', $v->huongdanchinh)->first()->ten) : ''}}</p>
                                            <p>{{ ($v->huongdanphu) ? ($tengv = App\GiangVien::where('id', $v->huongdanphu)->first()->ten) : ''}}</p>
                                        </td>
                                        <td>
                                            @php
                                                $docnhanxet = json_decode( $v->docnhanxet, true);
                                            @endphp
                                                @foreach($docnhanxet as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $chutichhoithao = json_decode( $v->chutichhoithao, true);
                                            @endphp
                                                @foreach($chutichhoithao as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $thanhvienhoithao = json_decode( $v->thanhvienhoithao, true);
                                            @endphp
                                                @foreach($thanhvienhoithao as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                            $chutichcham = json_decode( $v->chutichcham, true);
                                        @endphp
                                            @foreach($chutichcham as $key => $value)
                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $thanhviencham = json_decode( $v->thanhviencham, true);
                                            @endphp
                                                @foreach($thanhviencham as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                            </td>

                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-luanan-id="{{ $v->id }}" class="btn_edit_luanan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_luanan btn btn-xs red-mint" href="#" data-luanan-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Luận Án nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_luanan"><i class="fa fa-plus"></i> Tạo Luận Án Mới</a>
                        @endpermission
                         </p>
                </div>
            @endif
        </div>
        <!-- END TAB 13-->

          <!-- BEGIN TAB 14 NCS-->
          <div class="tab-pane" id="tab14">
            @if($ncs->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_ncs"><i class="fa fa-plus"></i> Thêm Nghiên Cứu Sinh

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_ncs">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th style="width: 20%;"> Tên Nghiên Cứu</th>
                                    <th> Thành Viên</th>
                                    <th> Thư Ký</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $ncs->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $ncs as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td>
                                            @php
                                                $thanhvien = json_decode( $v->thanhvien, true);
                                            @endphp
                                                @foreach($thanhvien as $key => $value)
                                                @if(App\GiangVien::where('id', $value)->first() !== null)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                                @endif
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                            $thuky = json_decode( $v->thuky, true);
                                        @endphp
                                            @foreach($thuky as $key => $value)
                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-ncs-id="{{ $v->id }}" class="btn_edit_ncs btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_ncs btn btn-xs red-mint" href="#" data-ncs-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Nghiên Cứu Sinh nào.
                        @permission('create-giangvien')
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_ncs"><i class="fa fa-plus"></i> Tạo Nghiên Cứu Sinh</a>
                        @endpermission
                    </p>
                </div>
            @endif
        </div>
        <!-- END TAB 11-->
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>
<!-- -------------------------------------START NGHIÊN CỨU SINH EDIT -------------------------------------->
<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="modal_edit_ncs" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="form_edit_ncs">
                @csrf
                <input value="" name="id" type="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Chỉnh sửa Khóa Luận</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><b>Tên Nghiên Cứu Sinh:</b> <span class="required">*</span></label>
                                    <input  name="ten" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Thành Viên:</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thanhvien">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Thư Ký: </label>
                                        <div class="input-icon right">
                                            <i class="fa fa-key"></i>
                                            <select class="form-control" multiple name="thuky">
                                                <option value="0">-------- Chọn Giảng Viên --------</option>
                                                @if($giangvien->count()>0)
                                                    @foreach($giangvien as $v)
                                                    <option value="{{ (int)$v->id }}">{{ $v->ten }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label><b>Ghi Chú:</b></label>
                                    <input class="form-control" name="ghichu" type="text" required />
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                    <a href="#" class="btn green" id="btn_edit_ncs"><i class="fa fa-save"></i> Lưu</a>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- -------------------------------------END NGHIÊN CỨU SINH EDIT -------------------------------------->
