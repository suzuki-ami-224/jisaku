@extends('layouts.app')

@section('content')

<a href="{{ route('user.index')}}">戻る</a>


<table class='table'>
        <thead>
            <tr>
                <th scope='col'>生徒名</th>
                <th scope='col'>メールアドレス</th>
            </tr>
        </thead>
        <tbody>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <tr>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <a href="{{ route('user.edit', ['user' => auth()->user()->id]) }}">
                            <div><button  class='btn btn-primary'>編集</button></div>

                        </tr>
                        <tr>
                            @foreach($reservations as $reservation)
                            @if($reservation->user_id == auth()->user()->id )
                                <th>{{ $reservation->title }}</th>
                                <th>{{ $reservation->start }}</th>
                                <th>{{ $reservation->finish }}</th>
                                <th>
                                    <form action="{{ route('reservation.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <div><button type="submit" class='btn btn-danger' onclick='return confirm("本当に削除しますか？")'>削除</button></div>
                                    </form>
                                </th>
                            @endif
                            @endforeach
                        </tr>

                    </div>
                </div>
            </div>
        </tbody>
    </table>
@endsection