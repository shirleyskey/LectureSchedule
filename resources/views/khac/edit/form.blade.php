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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Tác</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Tiến Độ</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
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
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->tiendo }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> </td>
                                        <td>
                                            <a data-congtac-id="{{ $v->id }}" class="btn_edit_congtac btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_congtac btn btn-xs red-mint" href="#" data-congtac-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Công Tác nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_congtac"><i class="fa fa-plus"></i> Tạo Công Tác</a></p>
                </div>
            @endif
        </div>
        <!-- END TAB 3-->

         <!-- BEGIN TAB 4-->
         <div class="tab-pane" id="tab4">
            @if($chambai->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài Mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="table_ds_congtac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Giảng Viên</th>
                                    <th> Thời Gian</th>
                                    <th> Số Giờ</th>
                                    <th> Ghi Chú</th>
                                    <th> Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( $chambai->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $chambai as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td> </td>
                                        <td>
                                            <a data-chambai-id="{{ $v->id }}" class="btn_edit_chambai btn btn-xs yellow-gold" href="#modal_edit_chambai" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_chambai btn btn-xs red-mint" href="#" data-chambai-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Chấm Bài nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_chambai"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
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
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
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
                    <p> Không tham gia hoạt động Đảng/Đoàn nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dang"><i class="fa fa-plus"></i> Tạo Chấm Bài</a></p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi Mới
                                            
                                        </a>
                                    </div>
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
                                @if( $daygioi->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $daygioi as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-daygioi-id="{{ $v->id }}" class="btn_edit_daygioi btn btn-xs yellow-gold" href="#modal_edit_daygioi" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_daygioi btn btn-xs red-mint" href="#" data-daygioi-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có hoạt động Dạy Giỏi nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_daygioi"><i class="fa fa-plus"></i> Tạo Dạy Giỏi</a></p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Xây Dựng Mới
                                            
                                        </a>
                                    </div>
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
                                @if( $xaydung->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $xaydung as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-xaydung-id="{{ $v->id }}" class="btn_edit_xaydung btn btn-xs yellow-gold" href="#modal_edit_xaydung" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
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
                    <p> Không có hoạt động Xây Dựng CHương Trình nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_xaydung"><i class="fa fa-plus"></i> Tạo Dạy Giỏi</a></p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo CV Đột Xuất Mới
                                            
                                        </a>
                                    </div>
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
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-dotxuat-id="{{ $v->id }}" class="btn_edit_dotxuat btn btn-xs yellow-gold" href="#modal_edit_dotxuat" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_dotxuat btn btn-xs red-mint" href="#" data-dotxuat-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p>Không có Công Việc Đột Xuất nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_dotxuat"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Sáng Kiến Cải Tiến
                                            
                                        </a>
                                    </div>
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
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-sangkien-id="{{ $v->id }}" class="btn_edit_sangkien btn btn-xs yellow-gold" href="#modal_edit_sangkien" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_sangkien btn btn-xs red-mint" href="#" data-sangkien-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p>Không có Sáng Kiến Cải Tiến nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_sangkien"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Học Tập Mới
                                            
                                        </a>
                                    </div>
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
                                @if( $hoctap->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $hoctap as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->ten }} </td>
                                        <td> {{ $v->giangviens->ten }} </td>
                                        <td> {{ $v->thoigian }} </td>
                                        <td> {{ $v->ghichu }} </td>
                                        <td>
                                            <a data-hoctap-id="{{ $v->id }}" class="btn_edit_hoctap btn btn-xs yellow-gold" href="#modal_edit_hoctap" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_hoctap btn btn-xs red-mint" href="#" data-hoctap-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không tham gia Học Tập Nào nào. <a class="btn green btn-sm" data-toggle="modal" href="#modal_add_hoctap"><i class="fa fa-plus"></i> Tạo Đột Xuất</a></p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_khoaluan"><i class="fa fa-plus"></i> Thêm Khóa Luân
                                            
                                        </a>
                                    </div>
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
                                                  <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $chutichcham = json_decode( $v->chutichcham, true);
                                            @endphp
                                                @foreach($chutichcham as $key => $value)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $thamgiacham = json_decode( $v->thamgiacham, true);
                                            @endphp
                                                @foreach($thamgiacham as $key => $value)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                                @endforeach
                                            </td>
                                        
                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            <a data-khoaluan-id="{{ $v->id }}" class="btn_edit_khoaluan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_khoaluan btn btn-xs red-mint" href="#" data-khoaluan-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Khóa Luận nào. </p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_luanvan"><i class="fa fa-plus"></i> Thêm Luận Văn
                                            
                                        </a>
                                    </div>
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
                                                  <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                            $chutich = json_decode( $v->chutich, true);
                                        @endphp
                                            @foreach($chutich as $key => $value)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $phanbien = json_decode( $v->phanbien, true);
                                            @endphp
                                                @foreach($phanbien as $key => $value)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $thuky = json_decode( $v->thuky, true);
                                            @endphp
                                                @foreach($thuky as $key => $value)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                                @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $uyvien = json_decode( $v->uyvien, true);
                                            @endphp
                                                @foreach($uyvien as $key => $value)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                                @endforeach
                                        </td>
                                        
                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            <a data-luanvan-id="{{ $v->id }}" class="btn_edit_luanvan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_luanvan btn btn-xs red-mint" href="#" data-luanvan-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Luận Văn nào. </p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_luanan"><i class="fa fa-plus"></i> Thêm Luận Án
                                            
                                        </a>
                                    </div>
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
                                                  <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                @endforeach
                                        </td>
                                        <td> 
                                            @php
                                                $chutichhoithao = json_decode( $v->chutichhoithao, true);
                                            @endphp
                                                @foreach($chutichhoithao as $key => $value)
                                                  <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                @endforeach
                                        </td>
                                        <td> 
                                            @php
                                                $thanhvienhoithao = json_decode( $v->thanhvienhoithao, true);
                                            @endphp
                                                @foreach($thanhvienhoithao as $key => $value)
                                                  <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                            $chutichcham = json_decode( $v->chutichcham, true);
                                        @endphp
                                            @foreach($chutichcham as $key => $value)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                                $thanhviencham = json_decode( $v->thanhviencham, true);
                                            @endphp
                                                @foreach($thanhviencham as $key => $value)
                                                <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                                @endforeach
                                            </td>
                                        
                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            <a data-luanan-id="{{ $v->id }}" class="btn_edit_luanan btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_luanan btn btn-xs red-mint" href="#" data-luanan-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Luận Án nào. </p>
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
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn green" data-toggle="modal" href="#modal_add_ncs"><i class="fa fa-plus"></i> Thêm Nghiên Cứu Sinh
                                            
                                        </a>
                                    </div>
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
                                                  <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                            $thuky = json_decode( $v->thuky, true);
                                        @endphp
                                            @foreach($thuky as $key => $value)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p> 
                                            @endforeach
                                        </td>
                                        <td> {{$v->ghichu}}</td>
                                        <td>
                                            <a data-ncs-id="{{ $v->id }}" class="btn_edit_ncs btn btn-xs yellow-gold" href="" title="Sửa"> <i class="fa fa-edit"></i> Sửa </a>
                                            <a class="btn_delete_ncs btn btn-xs red-mint" href="#" data-ncs-id="{{ $v->id }}" title="Xóa"> <i class="fa fa-trash"></i> Xóa </a>
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
                    <p> Không có Nghiên Cứu nào. </p>
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
@include('congtac.modals-khac.add')
@include('congtac.modals-khac.edit')
@include('chambai.modals-khac.add')
@include('chambai.modals-khac.edit')
@include('dang.modals-khac.add')
@include('dang.modals-khac.edit')
@include('daygioi.modals-khac.add')
@include('daygioi.modals-khac.edit')
@include('dotxuat.modals-khac.add')
@include('dotxuat.modals-khac.edit')
@include('sangkien.modals-khac.add')
@include('sangkien.modals-khac.edit')
@include('hoctap.modals-khac.add')
@include('hoctap.modals-khac.edit')
@include('khoaluan.modals-khac.add')
