<?php $__env->startSection('title', 'Bảng điều khiển'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<style>
  .fc-day-grid-event .fc-time {
    font-weight: bold;
    display: none;
}
</style>

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
                    <span>Bảng điều khiển / Phân công lịch giảng</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title text-center"> Lịch Giảng Tuần
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
           <div class="col-md-12">
            <div class="response"></div>
            <div id='calendar'></div>
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
    var SITEURL = "<?php echo e(url('/')); ?>";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#calendar').fullCalendar({
      initialView: 'dayGridMonth',
      editable: true,
      events: SITEURL + "/lichgiang/lichgiangtuan",
      displayEventTime: true,
      editable: true,
      eventRender: function (event, element, view) {
          if (event.allDay === 'true') {
              event.allDay = true;
          } else {
              event.allDay = false;
          }
      },
      selectable: true,
      selectHelper: true,
      //Thêm
      select: function (start, end, allDay) {
          var title = prompt('Nhập Tiết:');
      
          if (title) {
              var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
              var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      
              $.ajax({
                  url: SITEURL + "lichgiangtuan/create",
                  data: {'title' : title, 'start': start, 'end': end},
                  type: "POST",
                  success: function (data) {
                      displayMessage("Thêm thành công");
                  }
              });
              calendar.fullCalendar('renderEvent',
                  {
                      title: title,
                      start: start,
                      end: end,
                      allDay: allDay
                  },
                  true
              );
          }
          calendar.fullCalendar('unselect');
      },
      //Sửa
      eventDrop: function (event, delta) {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
          $.ajax({
              url: SITEURL + 'lichgiangtuan/update',
              data: {'ten': event.title, 'start': start, 'end': end, 'id': event.id},
              type: "POST",
              success: function (response) {
                  displayMessage("Cập nhật thành công!");
              }
          });
      },
      //Xóa
      eventClick: function (event) {
          var deleteMsg = confirm("Bạn có chắc chắn muốn xóa?");
          if (deleteMsg) {
              $.ajax({
                  type: "POST",
                  url: SITEURL + 'lichgiangtuan/delete',
                  data: {'id': event.id},
                  success: function (response) {
                      if(parseInt(response) > 0) {
                          $('#calendar').fullCalendar('removeEvents', event.id);
                          displayMessage("Xóa thành công!");
                      }
                  }
              });
          }
      }
    });
  });
    function displayMessage(message) {
      $(".response").html("<div class='success'>"+message+"</div>");
      setInterval(function() { $(".success").fadeOut(); }, 1000);
      }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>