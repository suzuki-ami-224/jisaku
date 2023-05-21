@extends('layouts.app')

@section('content')

<a href="{{ route('reservation.index')}}">戻る</a>


<div><p>予約</p></div>

<form action="{{ route('reservation.update', ['reservation' => $id]) }}" method="post" enctype="multipart/form-data">
@method('PUT')

@csrf

    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>レッスン名</th>
                <th scope='col'>開始</th>
                <th scope='col'>終了</th>
            </tr>
        </thead>
        <tbody>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <tr>
                            以下のレッスンを予約しますか？
                        </tr>
                        <tr>
                            <th>{{ $lesson->title }}</th>
                            <th>{{ $lesson->start }}</th>
                            <th>{{ $lesson->finish }}</th>
                        </tr>
                    </div>
                </div>
            </div>
        </tbody>
    </table>
        <div class='row justify-content-center'>
            <button type='submit' class='btn btn-primary w-25 mt-3'>予約</button>
        </div> 
</form>
@endsection
