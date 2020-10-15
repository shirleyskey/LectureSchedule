<form action="{{ route('profile.edit.post', $giangvien->id) }}" method="post" id="form_sample_2" class="form-horizontal">
    @csrf
    <div class="tab-content">
        <!-- BEGIN TAB 2-->
        <div class="tab-pane " id="tab2">
            @if(!empty($nckh))
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-body">
                    <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                        <thead>
                            <tr>
                                <th> STT</th>
                                <th> Tên NCKH</th>
                                <th> Chủ Biên</th>
                                <th> Tham Gia</th>
                                <th> Bắt Đầu</th>
                                <th> Kết Thúc</th>
                                <th> Số Trang</th>
                                <th> Số Giờ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($nckh) > 0 )
                                @php $stt = 1; @endphp
                                @foreach( $nckh as $v )
                                <tr>
                                    <td> {{ $stt}} </td>
                                    <td> {{ $v->ten }} </td>
                                    <td>
                                        @php
                                        $chubien = json_decode( $v->chubien, true);
                                    @endphp
                                        @foreach($chubien as $key => $value)
                                        @if(App\GiangVien::where('id', $value)->first() !== null)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @php
                                        $thamgia = json_decode( $v->thamgia, true);
                                    @endphp
                                        @foreach($thamgia as $key => $value)
                                        @if(App\GiangVien::where('id', $value)->first() !== null)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td> {{$v->batdau}}</td>
                                    <td> {{$v->ketthuc}}</td>
                                    <td> {{$v->sotrang}}</td>
                                    <td>
                                        {{-- In ra số Giờ --}}
                                        @switch($v->theloai)
                                            @case(1)
                                            {{ $gio_kh = ($v->sotrang/2.5)*8*4}} giờ
                                                @break
                                            @case(2)
                                               {{ $gio_kh = ($v->sotrang/2.5)*4*4}} giờ
                                                @break
                                            @case(3)
                                                {{ $gio_kh = 6*4}} giờ
                                                @break
                                            @case(4)
                                            {{ $gio_kh =($v->sotrang/2.5)*10*4}} giờ
                                                @break
                                            @case(5)
                                            {{ $gio_kh = $v->sotrang*1.5}} giờ
                                                @break
                                            @case(6)
                                                {{$gio_kh = $v->sotrang*4.27}} giờ
                                                @break
                                            @case(7)
                                                {{$gio_kh = $v->sotrang*2}} giờ
                                                @break
                                            @case(8)
                                                {{$gio_kh = $v->sotrang}} giờ
                                                @break
                                            @default
                                                {{$gio_kh = $v->sotrang}} giờ
                                        @endswitch
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
                    <p> Không có Nghiên cứu khoa học nào!</p>
                </div>
            @endif
        </div>
        <!-- END BEGIN TAB 2-->
                        <!-- BEGIN TAB 11-->
                        <div class="tab-pane active" id="tab17">
                                @if(!empty($hocphan))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_hd">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Tên Học Phần</th>
                                                    <th> Lớp</th>
                                                    <th> Hệ</th>
                                                    <th> Quy Mô</th>
                                                    <th> Tổng Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if( count($hocphan) > 0 )
                                                    @php 
                                                        $stt = 1; 
                                                        $tongtiet = 0;
                                                    @endphp
                                                    @foreach( $hocphan as $v_hocphan )
                                                    @php 
                                                        $id_giangvien = $giangvien->id;
                                                        $id_hocphan = $v_hocphan->id;
                                                        $tiet = 0;
                                                        $is_tiet = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->first();
                                                        if($is_tiet){
                                                            $tiet_hocphans = App\Tiet::where('id_hocphan', $id_hocphan)->where('id_giangvien', $id_giangvien)->get();
                                                            foreach($tiet_hocphans as $v_tiet_hocphan){
                                                                $tiet += 2;
                                                            }
                                                           echo "<tr>"
                                                                ."<td>"."$stt"."</td>"
                                                                ."<td>"."{$v_hocphan->tenhocphan}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->tenlop}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->he}"."</td>"
                                                                ."<td>"."{$v_hocphan->lops->quymo}"."</td>"
                                                                ."<td>"."$tiet"."</td>"
                                                           ."</tr>";
                                                   
                                                        }
                                                        $tongtiet += $tiet;
                                                    @endphp 
                                                   
                                                    @php $stt++; @endphp
                                                    @endforeach
                                                    <tr>
                                                    <td colspan="5"> <p> <b>Tổng Tiết: </b> </p></td>
                                                    <td> {{$tongtiet}}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Không có Nghiên cứu khoa học nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END BEGIN TAB 17-->

                            <!-- BEGIN GIỜ KHÁC-->
                            <div class="tab-pane" id="tab_giokhac">
                                @if(($hop->isNotEmpty()) || ($chambai->isNotEmpty()) || ($congtac->isNotEmpty()) || ($daygioi->isNotEmpty()) || ($hoctap->isNotEmpty()) || ($hdkh->isNotEmpty()))
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <table class="table table-striped table-hover table-bordered" id="table_ds_ct">
                                            <thead>
                                                <tr>
                                                    <th> STT</th>
                                                    <th> Thể Loại</th>
                                                    <th> Tổng Số Giờ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php 
                                                    $stt = 1; 
                                                    $total_hop = 0;
                                                    $total_chambai = 0;
                                                    $total_congtac = 0;
                                                    $total_daygioi = 0; 
                                                    $total_hoctap = 0; 
                                                    $total_hdkh = 0; 
                                                
                                                @endphp
                                                @if( $hop->count() > 0 )
                                                    @php  @endphp
                                                    @foreach( $hop as $v_hop )
                                                    @php $total_hop += $v_hop->so_gio; @endphp
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Họp </td>
                                                        <td> {{ $total_hop }} </td>
                                                    </tr>
                                                    @endforeach
                                                    @php $stt++; @endphp
                                                @endif
                                               
                                                @if( $chambai->count() > 0 )
                                                    @foreach( $chambai as $v_chambai )
                                                    @php $total_chambai += $v_chambai->so_gio; @endphp
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Chấm Bài </td>
                                                        <td> {{ $total_chambai }} </td>
                                                    </tr>
                                                    @endforeach
                                                    @php $stt++; @endphp
                                                @endif
                                               
                                                @if( $congtac->count() > 0 )
                                                    @foreach( $congtac as $v_congtac )
                                                    @php $total_congtac += $v_congtac->so_gio; @endphp
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Đi Thực Tế</td>
                                                        <td> {{ $total_congtac }} </td>
                                                    </tr>
                                                    @endforeach
                                                    @php $stt++; @endphp
                                                @endif

                                                @if( $daygioi->count() > 0 )
                                                   
                                                    @foreach( $daygioi as $v_daygioi )
                                                    @php $total_daygioi += $v_daygioi->so_gio; @endphp
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Dạy Giỏi</td>
                                                        <td> {{ $total_daygioi }} </td>
                                                    </tr>
                                                    @endforeach
                                                    @php $stt++; @endphp
                                                @endif

                                                @if( $hoctap->count() > 0 )
                                                   
                                                    @foreach( $hoctap as $v_hoctap )
                                                    @php $total_hoctap += $v_hoctap->so_gio; @endphp
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Tham Gia Học Tập</td>
                                                        <td> {{ $total_hoctap }} </td>
                                                    </tr>
                                                    @endforeach
                                                    @php $stt++; @endphp
                                                @endif

                                                @if( $hdkh->count() > 0 )
                                                   
                                                    @foreach( $hdkh as $v_hdkh )
                                                    @php $total_hdkh += $v_hdkh->so_gio; @endphp
                                                    <tr>
                                                        <td> {{ $stt }} </td>
                                                        <td> Hướng Dẫn Khoa Học </td>
                                                        <td> {{ $total_hdkh }} </td>
                                                    </tr>
                                                    @endforeach
                                                    @php $stt++; @endphp
                                                @endif
                                                @php $total = $total_hop + $total_chambai + $total_congtac + $total_daygioi + $total_hdkh + $total_hoctap; @endphp

                                                <tr> 
                                                    <td colspan="2"> Tổng Giờ: </td>
                                                    <td> {{$total}} </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                @else
                                    <div class="alert alert-danger" style="margin-bottom: 0px;">
                                        <p> Không tham gia hoạt động nào!</p>
                                    </div>
                                @endif
                            </div>
                            <!-- END GIỜ KHÁC-->
    </div>
</form>


