@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="bg-info text-center">管理者画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="nav-item text-center">
                    <a class="nav-link" href="{{ route('instructor.index')}}">講師一覧</a>
                    </div>
                    <div class="nav-item">
                    <a class="nav-link" href="{{ route('lesson.index') }}">レッスン管理</a>
                    </div>

                </div>
                <form action="{{ route('user.index') }}" method="GET">
                <input type="search" class='form-control' name='user_name' placeholder="生徒名検索"　value="@if (isset($search)) {{ $search }} @endif">                                            
                    <button type="submit"  class='btn btn-primary'>検索</button>
                </form>
                <table class='table  text-center'>
                    <thead>
                        <tr>
                            <th scope='col'>生徒</th>
                            <th scope='col'>レッスン予約</th>
                            <th scope='col'></th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($users as $user)
                        @if($user['role'] == 0 )
                        <div class="d-flex flex-wrap">
                            <tr>
                            <th scope='col'>{{ $user['name'] }}</th>
                            @foreach($reservations as $reservation)
                            @if($reservation->user_id == $user['id'] )
                                <th>{{ $reservation->title }}</th>
                                <th>{{ $reservation->start }}</th>
                                <th>{{ $reservation->finish }}</th>
                            @endif
                            @endforeach
                        
                        <th>
                        <div><a href="{{ route('user.edit', ['user' => $user['id']]) }}">
                            <div><button  class='btn btn-primary'>編集</button></div>
                        </a>
                        </th>
                        <th><form action="{{ route('user.destroy', ['user' => $user['id']]) }}" method="POST">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <div><button type="submit" class='btn btn-danger'>削除</button></div>
                            </form>
                        </th></div>
                        </div>
                    @endif
                    @endforeach
                    </tbody>
                    </table>
                </tr>
            </div>
        </div>
    </div>
</div>

@endsection
