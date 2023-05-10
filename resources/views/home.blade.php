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
          <a class="nav-link active" aria-current="page" href="#">講師</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">カレンダー</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">レッスン予約</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">マイページ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
@foreach($instructors as $instructor)
<div class="card" style="width: 13rem;">
  <img height="250" src="{{asset('storage/picture/'.$instructor['picture'])}}" class="card-img-top" alt="...">
  <div class="card-body">
  <h5 class="card-title">name　→　{{ $instructor['name'] }}</h5>
    <h5 class="card-text">
    @foreach($genres as $genre)
            @if($genre['id'] == $instructor['jenre_id'])
            
                <option value="{{ $genre['id']}}" selected>{{ $genre['name'] }}</option>
            @else
                <option value="{{ $genre['id']}}">genre　→　{{ $genre['name'] }}</option>
            @endif
        @endforeach

@endforeach

@endsection
