@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="{{ route('user.index')}}" class="btn btn-primary mb-3">戻る</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">生徒名</th>
                        <th scope="col">メールアドレス</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.edit', ['user' => auth()->user()->id]) }}" class="btn btn-primary">編集</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">レッスン名</th>
                        <th scope="col">開始</th>
                        <th scope="col">終了</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        @if($reservation->user_id == auth()->user()->id)
                            <tr>
                                <td>{{ $reservation->title }}</td>
                                <td>{{ $reservation->start }}</td>
                                <td>{{ $reservation->finish }}</td>
                                <td>
                                    <form action="{{ route('reservation.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
