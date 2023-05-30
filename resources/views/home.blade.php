@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CARAT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#kousi">講師</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#calendar">レッスン</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reservation.index')}}">レッスン予約</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.show', ['user' => auth()->user()->id]) }}">マイページ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="kousi">
  <div class="text-center">
  <h6 class="display-4"　style="margin-top: 2cm;">講師一覧</h6>
  </div>
</div>

<div class="d-flex flex-wrap justify-content-center"　style="margin-top: 2cm;">
  @foreach($instructors as $instructor)
  <div class="card mx-5" style="width: 14rem;">
    <span title="{{ $instructor->comment }}">
      <img height="250" src="{{asset('storage/picture/'.$instructor->picture)}}" class="card-img-top" alt="...">
    </span>
    <div class="card-body">
      <h5 class="card-title">name　→　{{ $instructor->name }}<br>name　→　{{ $instructor->genresname }}</h5>
    </div>
  </div>
  @endforeach
</div>

<div id="kousi">
  <div class="text-center">
  <h6 class="display-4"　style="margin-top: 2cm;">レッスン</h6>
  </div>
</div>


<div class="text-center-container">
  <div id='calendar' style="width: 70%;"></div>
</div>

<script>
  let events = <?php echo $data; ?>;
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: events,
      googleCalendarApiKey: 'YOUR_API_KEY',
      eventDidMount: (e) => {
        tippy(e.el, {
          content: e.event.title,
        });
      }
    });
    calendar.render();
  });
</script>
@endsection