@extends('layouts.app')
@section('style')
<style>
#calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }
  </style>
@endsection
@section('script')
<script src='{{asset("dist/index.global.js")}}'></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: '<?php echo Carbon\Carbon::now() ?>',
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events : <?php echo  json_encode($events) ?>
        // events : [{title: 'All Day Event',start: '2023-02-01' },]
    });

    calendar.render();
  });

</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div id='calendar'></div>

        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
