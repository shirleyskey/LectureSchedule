<?php $__env->startSection('title', 'Bảng điều khiển'); ?>

<?php $__env->startSection('content'); ?>
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
                        <?php if($chambai->isNotEmpty()): ?>
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet light portlet-fit bordered deadline deadline-chambai">
                   <div class="portlet-body">
                       <div class="table-toolbar">
                           <div class="row">
                               <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="" aria-hidden="true"></i>NCKH</p>
                           </div>
                       </div>
                       <table class="table table-striped table-hover table-bordered" id="ds_nckh">
                           <thead>
                               <tr>
                                <th> STT</th>
                                <th style="width: 20%;"> Tên Đề Tài</th>
                                <th> Loại</th>
                                <th> Chủ Biên</th>
                                <th> Tham Gia</th>
                                <th> Bắt Đầu</th>
                                <th> Kết Thúc</th>
                                <th> Số Người</th>
                                   <th> </th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                            <?php if( $nckh->count() > 0 ): ?>
                            <?php $stt = 1; ?>
                            <?php $__currentLoopData = $nckh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($stt); ?> </td>
                                <td> <?php echo e($v->ten); ?> </td>
                                <td> <?php echo e(($v->theloai) ? $v->theloais->ten : ''); ?></td>
                                <td>
                                    <?php
                                        $chubien = json_decode( $v->chubien, true);
                                    ?>
                                        <?php $__currentLoopData = $chubien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                          <p class="gian_dong"><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                <?php
                                    $thamgia = json_decode( $v->thamgia, true);
                                ?>
                                    <?php $__currentLoopData = $thamgia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                         <p class="gian_dong"><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td> <?php echo e($v->batdau); ?></td>
                                <td> <?php echo e($v->ketthuc); ?></td>
                                <td> <?php echo e($v->songuoi); ?></td>
                                <td> 
                                    <a class="btn_edit_congtac btn btn-xs yellow-gold" > Chưa hoàn thành</a>
                               </td>
                            </tr>
                            <?php $stt++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                           </tbody>
                       </table>
                   </div>
               </div>
               <!-- END EXAMPLE TABLE PORTLET-->
                <?php endif; ?>
                   </div>

                   <div class="col-md-12">
                    <?php if($chambai->isNotEmpty()): ?>
           <!-- BEGIN EXAMPLE TABLE PORTLET-->
           <div class="portlet light portlet-fit bordered deadline deadline-chambai">
               <div class="portlet-body">
                   <div class="table-toolbar">
                       <div class="row">
                           <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="" aria-hidden="true"></i>Chấm thi, coi thi</p>
                       </div>
                   </div>
                   <table class="table table-striped table-hover table-bordered" id="ds_chambai">
                       <thead>
                           <tr>
                               <th> STT</th>
                               <th> Tên Giảng Viên</th>
                               <th> Tên Lớp</th>
                               <th> Hình Thức </th>
                               <th> Số Bài</th>
                               <th> Bắt Đầu </th>
                               <th> Kết Thúc</th>
                               <th> </th>
                               
                           </tr>
                       </thead>
                       <tbody>
                            <?php if($chambai->count() > 0 ): ?>
                               <?php $stt = 1; ?>
                               <?php $__currentLoopData = $chambai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   <td> <?php echo e($stt); ?> </td>
                                   <td>
                                       <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                       <?php echo e($v->giangviens->ten); ?>

                                       <?php endif; ?>
                                       </td>
                                       <td> <?php echo e(($v->lop)); ?> </td>
                                       <td> 
                                           <?php 
                                               if($v->hoc_phan == 1) {
                                                   echo "HP";
                                               } 
                                               else if($v->giua_hoc_phan == 1) {
                                                   echo "GHP";
                                               }  
                                               else if($v->cdtn == 1) {
                                                   echo "CĐTN";
                                               }  
                                           ?>
                                       </td>
                                       <td> <?php echo e($v->so_bai); ?> </td>
                                       <td> <?php echo e($v->bat_dau); ?> </td>
                                       <td> <?php echo e($v->ket_thuc); ?> </td>
                                  <td> 
                                        <a class="btn_edit_congtac btn btn-xs yellow-gold" > Chưa hoàn thành</a>
                                   </td>
                               </tr>
                               <?php $stt++; ?>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                       </tbody>
                   </table>
               </div>
           </div>
           <!-- END EXAMPLE TABLE PORTLET-->
            <?php endif; ?>
               </div>


               <div class="col-md-12">
                <?php if($hdkh->isNotEmpty()): ?>
       <!-- BEGIN EXAMPLE TABLE PORTLET-->
       <div class="portlet light portlet-fit bordered deadline deadline-chambai">
           <div class="portlet-body">
               <div class="table-toolbar">
                   <div class="row">
                       <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="" aria-hidden="true"></i>Hướng Dẫn Khoa Học</p>
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
                        <th> Bắt Đầu</th>
                        <th> Kết Thúc</th>
                        <th> Ghi Chú</th>
                        <th> </th>
                       </tr>
                   </thead>
                   <tbody>
                    <?php if( $hdkh->count() > 0 ): ?>
                        <?php $stt = 1; ?>
                        <?php $__currentLoopData = $hdkh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($stt); ?> </td>
                            <td>
                                <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                <?php echo e($v->giangviens->ma_giangvien.'-'.$v->giangviens->ten); ?>

                                <?php endif; ?>

                             </td>
                             <td> 
                            <?php 
                                if($v->khoa_luan == 1) {
                                    echo "Khóa Luận";
                                } 
                                else if($v->luan_van == 1) {
                                    echo "Luận Văn";
                                }  
                                else if($v->luan_an == 1) {
                                    echo "Luận Án";
                                }  
                                else if($v->sinhvien_nc == 1) {
                                    echo "Sinh viên NCKH";
                                }   
                            ?>
                                </td>

                            <td> <?php echo e($v->hoc_vien); ?> </td>
                            <td> <?php echo e($v->khoa); ?> </td>
                            <td> <?php echo e($v->bat_dau); ?> </td>
                            <td> <?php echo e($v->ket_thuc); ?> </td>
                            <td> <?php echo e($v->ghichu); ?> </td>
                            <td> 
                                <a class="btn_edit_congtac btn btn-xs yellow-gold" > Chưa hoàn thành</a>
                            </td>
                        </tr>
                        <?php $stt++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
               </table>
           </div>
       </div>
       <!-- END EXAMPLE TABLE PORTLET-->
        <?php endif; ?>
           </div>


               <div class="col-md-12">

                <?php if($congtac->isNotEmpty()): ?>
       <!-- BEGIN EXAMPLE TABLE PORTLET-->
       <div class="portlet light portlet-fit bordered deadline deadline-congtac">
           <div class="portlet-body">
               <div class="table-toolbar">
                   <div class="row">
                       <p class=""><i style="color: #ffc93c; opacity: 0.8;" class="" aria-hidden="true"></i>Học, thực tế, luân chuyển, Quy Hoạch</p>
                   </div>
               </div>
               <table class="table table-striped table-hover table-bordered" id="ds_congtac">
                   <thead>
                       <tr>
                           <th> STT</th>
                           <th> Tên Loại Hình</th>
                           <th> Tên Giảng Viên</th>
                           <th> Địa Điểm</th>
                           <th> Bắt Đầu</th>
                           <th> Kết Thúc</th>
                           <th> </th>
                       </tr>
                   </thead>
                   <tbody>
                        <?php if($congtac->count() > 0 ): ?>
                           <?php $stt = 1; ?>
                           <?php $__currentLoopData = $congtac; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               <td> <?php echo e($stt); ?> </td>
                               <td> <?php echo e($v->ten); ?> </td>
                               <td>
                                   <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                   <?php echo e($v->giangviens->ten); ?>

                                   <?php endif; ?>

                                </td>
                               <td> <?php echo e($v->dia_diem); ?> </td>
                               <td> <?php echo e($v->bat_dau); ?> </td>
                               <td> <?php echo e($v->ket_thuc); ?> </td>
                               <td> 
                                <a class="btn_edit_congtac btn btn-xs yellow-gold" > Chưa hoàn thành</a>
                                </td>
                               
                           </tr>
                           <?php $stt++; ?>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       <?php endif; ?>
                   </tbody>
               </table>
           </div>
       </div>
       <!-- END EXAMPLE TABLE PORTLET-->
        <?php endif; ?>
           </div>
           <div class="col-md-12">
            <?php if($daygioi->isNotEmpty()): ?>
  <!-- BEGIN EXAMPLE TABLE PORTLET-->
  <div class="portlet light portlet-fit bordered deadline deadline-daygioi">
      <div class="portlet-body">
          <div class="table-toolbar">
              <div class="row">
                  <p class=""><i class="" style="color: #ffc93c; opacity: 0.8;" aria-hidden="true"></i>Dạy Giỏi</p>
              </div>
          </div>
          <table class="table table-striped table-hover table-bordered" id="ds_daygioi">
              <thead>
                  <tr>
                      <th> STT</th>
                      <th> Tên Giảng Viên</th>
                      <th> Tên Bài </th>
                      <th> Cấp</th>
                      <th> Bắt Đầu</th>
                      <th> Kết Thúc</th>
                      <th> </th>
                  </tr>
              </thead>
              <tbody>
                   <?php if($daygioi->count() > 0 ): ?>
                      <?php $stt = 1; ?>
                      <?php $__currentLoopData = $daygioi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                          <td> <?php echo e($stt); ?> </td>
                          
                          <td>
                              <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                              <?php echo e($v->giangviens->ten); ?>

                              <?php endif; ?>
                          </td>
                          <td> <?php echo e($v->ten); ?> </td>
                         
                          <td> 
                              <?php
                                  if($v->cap_bo == 1){
                                      echo "Cấp Bộ";
                                  }
                                  if($v->cap_hoc_vien == 1){
                                      echo "Cấp Học Viện";
                                  }
                                  if($v->cap_khoa == 1){
                                      echo "Cấp Khoa";
                                  }
                              ?>
                          </td>
                          <td> <?php echo e($v->bat_dau); ?> </td>
                          <td> <?php echo e($v->ket_thuc); ?> </td>
                          <td> 
                            <a class="btn_edit_congtac btn btn-xs yellow-gold" > Chưa hoàn thành</a>
                        </td>
                          
                      </tr>
                      <?php $stt++; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </tbody>
          </table>
      </div>
  </div>
  <!-- END EXAMPLE TABLE PORTLET-->
   <?php endif; ?>
      </div>

                    <div class="col-md-12 box_gio">
                         <?php if($vanban->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-vanban">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="" aria-hidden="true" style="color: #ec0101; opacity: 0.5;"></i>Xử Lý Văn Bản</p>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_vanban">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Công Việc</th>
                                    <th> Lãnh Đạo Xử Lý </th>
                                    <th> Chủ Trì </th>
                                    <th> Tham Gia</th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($vanban->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $vanban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->noi_dung); ?> </td>
                                        <td> <?php echo e($v->lanhdao); ?> </td>
                                        <td>
                                            <?php
                                            if($v->chu_tri){
                                                $chu_tri = json_decode( $v->chu_tri, true);
                                            }
                                            ?>
                                                <?php $__currentLoopData = $chu_tri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                    <p class="gian_dong"><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                        <?php
                                         if($v->tham_gia)
                                            $tham_gia = json_decode( $v->tham_gia, true);
                                        ?>
                                            <?php $__currentLoopData = $tham_gia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                            <p class="gian_dong"><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td> <?php echo e($v->thoigian_nhan); ?> </td>
                                         <td> <?php echo e($v->thoigian_den); ?> </td>
                                         <td> 
                                            <a class="btn_edit_congtac btn btn-xs yellow-gold" > Chưa hoàn thành</a>
                                        </td>
                                        
                                    </tr>
                                    <?php $stt++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                 <?php endif; ?>
                    </div>

                  

                    

                    <div class="col-md-12">
                         <?php if($dang->isNotEmpty()): ?>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered deadline deadline-dang">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <p class=""><i class="" style="color: aqua; opacity: 0.5;"></i>Khác</p>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_khac">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Tên Hoạt Động</th>
                                    <th> Chủ Trì </th>
                                    <th> Tham Gia </th>
                                    <th> Bắt Đầu</th>
                                    <th> Kết Thúc</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php if($dang->count() > 0 ): ?>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $dang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <tr>
                                        <td> <?php echo e($stt); ?> </td>
                                        <td> <?php echo e($v->ten); ?> </td>
                                        <td>
                                            <?php
                                            if($v->chu_tri){
                                                $chu_tri = json_decode( $v->chu_tri, true);
                                            }
                                            ?>
                                                <?php $__currentLoopData = $chu_tri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                                    <p class="gian_dong"><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                        <?php
                                         if($v->tham_gia)
                                            $tham_gia = json_decode( $v->tham_gia, true);
                                        ?>
                                            <?php $__currentLoopData = $tham_gia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(App\GiangVien::where('id', $value)->first() !== null): ?>
                                            <p class="gian_dong"><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td> <?php echo e($v->bat_dau); ?> </td>
                                        <td> <?php echo e($v->ket_thuc); ?> </td>
                                        <td> 
                                            <a class="btn_edit_congtac btn btn-xs yellow-gold" > Chưa hoàn thành</a>
                                        </td>
                                        
                                    </tr>
                                    <?php $stt++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                 <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    jQuery(document).ready(function() {
         // Reload trang và giữ nguyên tab đã active
         var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('a[href="' + activeTab + '"]').tab('show');
            localStorage.removeItem('activeTab');
        }
        // END Reload trang và giữ nguyên tab đã active
        var table = $('#ds_nckh');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng NCKH: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            },
            { "width": "30px", "targets": 0 },
            { "width": "130px", "targets": 1 },
            { "width": "100px", "targets": 2 },
            { "width": "60px", "targets": 3 },
            { "width": "60px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "60px", "targets": 6 },
            { "width": "60px", "targets": 7 },
            { "width": "60px", "targets": 8 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var table = $('#ds_chambai');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Chấm Bài: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            },
            { "width": "30px", "targets": 0 },
            { "width": "80px", "targets": 1 },
            { "width": "100px", "targets": 2 },
            { "width": "60px", "targets": 3 },
            { "width": "50px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "60px", "targets": 6 },
            { "width": "60px", "targets": 7 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });

        // END Xử lý khi click nút xóa NCKH
        var table = $('#ds_hdkh');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng HDKH: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            },
            { "width": "30px", "targets": 0 },
            { "width": "80px", "targets": 1 },
            { "width": "100px", "targets": 2 },
            { "width": "60px", "targets": 3 },
            { "width": "50px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "60px", "targets": 6 },
            { "width": "60px", "targets": 7 },
            { "width": "60px", "targets": 8 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var table = $('#ds_congtac');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Học, Thực tế, Luân chuyển, Quy Hoạch: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            },
            { "width": "30px", "targets": 0 },
            { "width": "130px", "targets": 1 },
            { "width": "80px", "targets": 2 },
            { "width": "60px", "targets": 3 },
            { "width": "60px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "60px", "targets": 6 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var table = $('#ds_daygioi');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Dạy Giỏi: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            },
            { "width": "30px", "targets": 0 },
            { "width": "100px", "targets": 1 },
            { "width": "130px", "targets": 2 },
            { "width": "60px", "targets": 3 },
            { "width": "60px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "60px", "targets": 6 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var table = $('#ds_vanban');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng Văn bản Xử lý: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            },
            { "width": "30px", "targets": 0 },
            { "width": "130px", "targets": 1 },
            { "width": "60px", "targets": 2 },
            { "width": "60px", "targets": 3 },
            { "width": "60px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "60px", "targets": 6 },
            { "width": "60px", "targets": 7 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });
        var table = $('#ds_khac');
        var oTable = table.dataTable({
            "autoWidth":false,
            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],
            "pageLength": 10,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_ <br> Tổng hoạt động Khác: _TOTAL_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }, 
            { "width": "30px", "targets": 0 },
            { "width": "150px", "targets": 1 },
            { "width": "80px", "targets": 2 },
            { "width": "80px", "targets": 3 },
            { "width": "60px", "targets": 4 },
            { "width": "60px", "targets": 5 },
            { "width": "60px", "targets": 6 },
            ],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });
    });
</script>

<script src="<?php echo e(asset('assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/icheck/icheck.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/dashboard/deadline.blade.php ENDPATH**/ ?>