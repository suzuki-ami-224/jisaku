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
          <div class="nav-link active" aria-current="page">
            <a class="nav-link"href="#kousi">講師</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#calendar">レッスン</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">レッスン予約</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">マイページ</a>
            </li>
        </div>
      </ul>
    </div>
  </div>
</nav>
<div id="kousi"><center class="text_1 mt-3"><font size="6">講師一覧</font></center></div>
<div style="display:flex;">
@foreach($instructors as $instructor)
<div class="card" style="width: 13rem;">
    <img height="250" src="{{asset('storage/picture/'.$instructor['picture'])}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">name　→　{{ $instructor['name'] }}<br>name　→　{{ $instructor['name'] }}</h5>
        </div>
      </div>
      @endforeach
  </div>
<div id='calendar' style="width: 70%; "></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth'
  });
  calendar.render();
});
</script>
@endsection
