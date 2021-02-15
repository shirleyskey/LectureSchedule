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
                        <?php if($hop->isNotEmpty()): ?>
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
                                <?php if($hop->count() > 0 ): ?>
                                   <?php $stt = 1; ?>
                                   <?php $__currentLoopData = $hop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td> <?php echo e($stt); ?> </td>
                                       <td> <?php echo e($v->ten); ?> </td>
                                       <td> <?php echo e($v->dia_diem); ?> </td>
                                       <td>
                                           <?php if(App\GiangVien::where('id', $v->id_giangvien)->first() !== null): ?>
                                           <?php echo e($v->giangviens->ma_giangvien.'-'.$v->giangviens->ten); ?>

                                           <?php endif; ?>

                                        </td>
                                       <td> <?php echo e($v->batdau); ?> </td>
                                       <td> <?php echo e($v->ketthuc); ?> </td>
                                       <td> 
                                            <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                                        <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                                    <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                               <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                                                    <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
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
                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td> <?php echo e($v->thoigian_nhan); ?> </td>
                                         <td> <?php echo e($v->thoigian_den); ?> </td>
                                        <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
                                                    <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?> </p>
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
                                            <p><?php echo e($key + 1); ?>. <?php echo e($tengv = App\GiangVien::where('id', $value)->first()->ten); ?>  </p>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td> <?php echo e($v->bat_dau); ?> </td>
                                        <td> <?php echo e($v->ket_thuc); ?> </td>
                                       <td> 
                                             <a class="btn_edit_congtac btn btn-xs yellow-gold" > <i class="fa fa-edit"></i> 1 Ngày </a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/lectureSchedule/resources/views/dashboard/deadline.blade.php ENDPATH**/ ?>