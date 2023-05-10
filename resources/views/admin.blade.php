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

                    You are logged in!
                    <a href="{{ route('instructor.index')}}">講師一覧#</a>
                </div>
                <form action="{{ route('admin.index') }}" method="GET">
                <input type="search" class='form-control' name='user_name' placeholder="生徒名検索"　value="@if (isset($search)) {{ $search }} @endif">                                            
                    <button type="submit"  class='btn btn-primary'>検索</button>
                </form>
                    @foreach($users as $user)
                    @if($user['role'] == 0 )
                    <tr>
                        <th scope='col'>{{ $user['name'] }}</th>
                    </tr>
                    @endif
                    @endforeach


            </div>
        </div>
    </div>
</div>

@endsection
