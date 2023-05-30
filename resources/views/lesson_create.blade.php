@extends('layouts.app')

@section('content')

<a href="{{ route('user.index')}}" class="btn btn-secondary">戻る</a>

<div class="my-4">
    <h2>レッスン登録</h2>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('lesson.creat') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <select name="instructor_id" class="form-control">
            <option value="" hidden>講師</option>
            @foreach($instructors as $instructor)
                <option value="{{ $instructor['id'] }}">{{ $instructor['name'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="title">レッスン名</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
    </div>

    <div class="form-group">
        <label for="start" class="mt-2">開始時間</label>
        <input type="datetime-local" class="form-control" name="start">
    </div>

    <div class="form-group">
        <label for="finish" class="mt-2">終了時間</label>
        <input type="datetime-local" class="form-control" name="finish">
    </div>

    <div class="form-group">
        <label for="color" class="mt-2">カラー</label>
        <input type="color" class="form-control" name="color" value="{{ old('color') }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">登録</button>
    </div>
</form>

@endsection
