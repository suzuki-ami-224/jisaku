@extends('layouts.app')

@section('content')

<a href="{{ route('user.show', ['user' => auth()->user()->id]) }}">戻る</a>


<main class="py-4">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header">


                    <h4 class='text-center'>ユーザー編集</h1>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class ='panel-body'>
                            @if($errors->all())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)

                                    <li>{{ $message }} </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <label for='type' class='mt-2'>名前</label>
                                <input type='text' class='form-control' name='name' value="{{ old('name',$result->name)}}"/><br>
                            <label for='type' class='mt-2'>メールアドレス</label>
                                <input type='text' class='form-control' name='email' value="{{ old('email',$result->email)}}"/><br>

                            <div class='row justify-content-center'>
                                <button type='submit' class='btn btn-primary w-25 mt-3'>変更</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection
