@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="{{ route('reservation.index')}}" class="btn btn-primary mb-3">戻る</a>
            <h3>予約</h3>

            <form action="{{ route('reservation.update', ['reservation' => $id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">レッスン名</th>
                            <th scope="col">開始</th>
                            <th scope="col">終了</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $lesson->title }}</td>
                            <td>{{ $lesson->start }}</td>
                            <td>{{ $lesson->finish }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mt-3">予約</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
