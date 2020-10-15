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
                        <table class="table table-striped table-hover table-bordered" id="ds_congtac">
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
        <div class="tab-pane active" id="tab_hop">
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
                        <table class="table table-striped table-hover table-bordered" id="ds_hop">
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

        <!-- BEGIN TAB HDKH-->
        <div class="tab-pane" id="tab_hdkh">
            @if($hdkh->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    @permission('create-giangvien')
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Tạo Hướng Dẫn Khoa Học Mới

                                        </a>
                                    </div>
                                    @endpermission
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_hdkh">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Loại Hướng Dẫn</th>
                                    <th> Học Viên</th>
                                    <th> Khóa</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $hdkh->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $hdkh as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td>
                                            @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                            {{ $v->giangviens->ma_giangvien.'-'.$v->giangviens->ten }}
                                            @endif

                                         </td>
                                         <td> 
                                        @php 
                                            if($v->khoa_luan == 1) {
                                                echo "Khóa Luận";
                                            } 
                                            else if($v->luan_van == 1) {
                                                echo "Luận Văn";
                                            }  
                                            else if($v->luan_an == 1) {
                                                echo "Luận Án";
                                            }   
                                        @endphp
                                            </td>

                                        <td> {{ $v->hoc_vien }} </td>
                                        <td> {{ $v->khoa }} </td>
                                        <td> {{ $v->so_gio }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            @permission('create-giangvien')
                                            <a data-hdkh-id="{{ $v->id }}" class="btn_edit_hdkh btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hdkh btn btn-xs red-mint" href="#" data-hdkh-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                        <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hdkh"><i class="fa fa-plus"></i> Tạo Hướng Dẫn Khoa Học Mới </a></p>
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
                        <table class="table table-striped table-hover table-bordered" id="ds_chambai">
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
                        <table class="table table-striped table-hover table-bordered" id="ds_daygioi">
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
                        <table class="table table-striped table-hover table-bordered" id="ds_hoctap">
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
        
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn green"><i class="fa fa-save"></i> Lưu</button>
            </div>
        </div>
    </div>

</form>
