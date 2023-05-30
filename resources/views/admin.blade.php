@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-center">管理者画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col text-center">
                            <a class="nav-link" href="{{ route('instructor.index') }}">講師一覧</a>
                        </div>
                        <div class="col text-center">
                            <a class="nav-link" href="{{ route('lesson.index') }}">レッスン管理</a>
                        </div>
                    </div>

                    <form action="{{ route('user.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" name="user_name" placeholder="生徒名検索" value="@if (isset($search)) {{ $search }} @endif">                                            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">検索</button>
                            </div>
                        </div>
                    </form>

                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">生徒</th>
                                <th scope="col">レッスン予約</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if($user['role'] == 0)
                                    <tr>
                                        <td>{{ $user['name'] }}</td>
                                        <td>
                                            @foreach($reservations as $reservation)
                                                @if($reservation->user_id == $user['id'])
                                                    {{ $reservation->title }}<br>
                                                    {{ $reservation->start }} - {{ $reservation->finish }}<br><br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', ['user' => $user['id']]) }}" class="btn btn-primary">編集</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('user.destroy', ['user' => $user['id']]) }}" method="POST">
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
    </div>
</div>

@endsection
