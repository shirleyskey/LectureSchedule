@extends('layouts.master')

@section('title', 'Bảng điều khiển')

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <span>Bảng điều khiển</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> <strong>Bảng điều khiển</strong>
            <small>Thông Báo Đến Hạn</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        @if($hop->isNotEmpty())
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet light portlet-fit bordered deadline deadline-hop">
                   <div class="portlet-body">
                       
                       <div class="table-toolbar">
                           <div class="row">
                               <p class=""> <i style="color: aqua; opacity: 0.5;" class="fa fa-briefcase "></i>1. Họp</p>
                           </div>
                       </div>
                      
                       <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                           <thead>
                               <tr>
                                   <th> STT</th>
                                   <th> Tên Cuộc Họp</th>
                                   <th> Địa Điểm</th>
                                   <th> Tên Giảng Viên</th>
                                   <th> Bắt Đầu</th>
                                   <th> Kết Thúc</th>
                                   <th> Hạn</th>
                               </tr>
                           </thead>
                           <tbody>
                                @if($hop->count() > 0 )
                                   @php $stt = 1; @endphp
                                   @foreach( $hop as $v )
                                    <tr>
                                       <td> {{ $stt }} </td>
                                       <td> {{ $v->ten }} </td>
                                       <td> {{ $v->dia_diem }} </td>
                                       <td>
                                           @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                           {{ $v->giangviens->ma_giangvien.'-'.$v->giangviens->ten }}
                                           @endif

                                        </td>
                                       <td> {{ $v->batdau }} </td>
                                       <td> {{ $v->ketthuc }} </td>
                                       <td> 
                                            <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                @endif
                   </div>

                   <div class="col-md-12">
                    @if($chambai->isNotEmpty())
           <!-- BEGIN EXAMPLE TABLE PORTLET-->
           <div class="portlet light portlet-fit bordered deadline deadline-chambai">
               <div class="portlet-body">
                   <div class="table-toolbar">
                       <div class="row">
                           <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="fa fa-pencil-square-o" aria-hidden="true"></i>2. Chấm Bài</p>
                       </div>
                   </div>
                   <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                       <thead>
                           <tr>
                               <th> STT</th>
                               <th> Tên Giảng Viên</th>
                               <th> Tên Lớp</th>
                               <th> Hình Thức </th>
                               <th> Số Bài</th>
                               <th> Bắt Đầu </th>
                               <th> Kết Thúc</th>
                               <th> Hạn</th>
                               
                           </tr>
                       </thead>
                       <tbody>
                            @if($chambai->count() > 0 )
                               @php $stt = 1; @endphp
                               @foreach( $chambai as $v )
                                <tr>
                                   <td> {{ $stt }} </td>
                                   <td>
                                       @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                                       {{ $v->giangviens->ten }}
                                       @endif
                                       </td>
                                       <td> {{ ($v->lop) }} </td>
                                       <td> 
                                           @php 
                                               if($v->hoc_phan == 1) {
                                                   echo "HP";
                                               } 
                                               else if($v->giua_hoc_phan == 1) {
                                                   echo "GHP";
                                               }  
                                               else if($v->cdtn == 1) {
                                                   echo "CĐTN";
                                               }  
                                           @endphp
                                       </td>
                                       <td> {{ $v->so_bai }} </td>
                                       <td> {{ $v->bat_dau }} </td>
                                       <td> {{ $v->ket_thuc }} </td>
                                  <td> 
                                        <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
            @endif
               </div>
               <div class="col-md-12">

                @if($congtac->isNotEmpty())
       <!-- BEGIN EXAMPLE TABLE PORTLET-->
       <div class="portlet light portlet-fit bordered deadline deadline-congtac">
           <div class="portlet-body">
               <div class="table-toolbar">
                   <div class="row">
                       <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="fa fa-tachometer" aria-hidden="true"></i>3. Đi Thực Tế</p>
                   </div>
               </div>
               <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                   <thead>
                       <tr>
                           <th> STT</th>
                           <th> Tên</th>
                           <th> Tên Giảng Viên</th>
                           <th> Địa Điểm</th>
                           <th> Bắt Đầu</th>
                           <th> Kết Thúc</th>
                           <th> Hạn</th>
                       </tr>
                   </thead>
                   <tbody>
                        @if($congtac->count() > 0 )
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
                               <td> {{ $v->dia_diem }} </td>
                               <td> {{ $v->bat_dau }} </td>
                               <td> {{ $v->ket_thuc }} </td>
                              <td> 
                                    <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
        @endif
           </div>
           <div class="col-md-12">
            @if($daygioi->isNotEmpty())
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet light portlet-fit bordered deadline deadline-daygioi">
      <div class="portlet-body">
          <div class="table-toolbar">
              <div class="row">
                  <p class=""><i class="fa fa-star-half-o" style="color: #ffc93c; opacity: 0.8;" aria-hidden="true"></i>4. Dạy Giỏi</p>
              </div>
          </div>
          <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
              <thead>
                  <tr>
                      <th> STT</th>
                      <th> Tên Giảng Viên</th>
                      <th> Tên Bài </th>
                      <th> Cấp</th>
                      <th> Bắt Đầu</th>
                      <th> Kết Thúc</th>
                      <th> Hạn</th>
                  </tr>
              </thead>
              <tbody>
                   @if($daygioi->count() > 0 )
                      @php $stt = 1; @endphp
                      @foreach( $daygioi as $v )
                       <tr>
                          <td> {{ $stt }} </td>
                          
                          <td>
                              @if (App\GiangVien::where('id', $v->id_giangvien)->first() !== null)
                              {{ $v->giangviens->ten }}
                              @endif
                          </td>
                          <td> {{ $v->ten }} </td>
                         
                          <td> 
                              @php
                                  if($v->cap_bo == 1){
                                      echo "Cấp Bộ";
                                  }
                                  if($v->cap_hoc_vien == 1){
                                      echo "Cấp Học Viện";
                                  }
                                  if($v->cap_khoa == 1){
                                      echo "Cấp Khoa";
                                  }
                              @endphp
                          </td>
                          <td> {{ $v->bat_dau }} </td>
                          <td> {{ $v->ket_thuc }} </td>
                         <td> 
                               <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
   @endif
      </div>

                    <div class="col-md-12 box_gio">
                         @if($vanban->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-vanban">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-book" aria-hidden="true" style="color: #ec0101; opacity: 0.5;"></i>5. Xử Lý Văn Bản</p>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Lãnh Đạo Xử Lý </th>
                                    <th> Chủ Trì </th>
                                    <th> Tham Gia</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($vanban->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $vanban as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{$v->noi_dung}} </td>
                                        <td> {{$v->lanhdao}} </td>
                                        <td>
                                            @php
                                            if($v->chu_tri){
                                                $chu_tri = json_decode( $v->chu_tri, true);
                                            }
                                            @endphp
                                                @foreach($chu_tri as $key => $value)
                                                    @if(App\GiangVien::where('id', $value)->first() !== null)
                                                    <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                    @endif
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                         if($v->tham_gia)
                                            $tham_gia = json_decode( $v->tham_gia, true);
                                        @endphp
                                            @foreach($tham_gia as $key => $value)
                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td> {{ $v->thoigian_nhan }} </td>
                                         <td> {{ $v->thoigian_den }} </td>
                                        <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>

                  

                    

                    <div class="col-md-12">
                         @if($dang->isNotEmpty())
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-dang">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="fa fa-building-o" style="color: aqua; opacity: 0.5;"></i>6. Hoạt Động Đảng/Đoàn</p>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_giangvien">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Hoạt Động</th>
                                    <th> Chủ Trì </th>
                                    <th> Tham Gia </th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if($dang->count() > 0 )
                                    @php $stt = 1; @endphp
                                    @foreach( $dang as $v )
                                     <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{$v->ten}} </td>
                                        <td>
                                            @php
                                            if($v->chu_tri){
                                                $chu_tri = json_decode( $v->chu_tri, true);
                                            }
                                            @endphp
                                                @foreach($chu_tri as $key => $value)
                                                    @if(App\GiangVien::where('id', $value)->first() !== null)
                                                    <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}} </p>
                                                    @endif
                                                @endforeach
                                        </td>
                                        <td>
                                        @php
                                         if($v->tham_gia)
                                            $tham_gia = json_decode( $v->tham_gia, true);
                                        @endphp
                                            @foreach($tham_gia as $key => $value)
                                            @if(App\GiangVien::where('id', $value)->first() !== null)
                                            <p>{{$key + 1}}. {{$tengv = App\GiangVien::where('id', $value)->first()->ten}}  </p>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td> {{ $v->bat_dau }} </td>
                                        <td> {{ $v->ket_thuc }} </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                 @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                   

                    

                </div>
            </div>
        </div>
    


        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection