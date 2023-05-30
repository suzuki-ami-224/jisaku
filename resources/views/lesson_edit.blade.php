@extends('layouts.app')

@section('content')

<a href="{{ route('lesson.index')}}" class="btn btn-secondary">戻る</a>

<div class="my-4">
    <h2>レッスン編集</h2>
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

<form action="{{ route('lesson.update', ['lesson' => $id]) }}" method="post">
    @method('patch')
    @csrf

    <div class="form-group">
        <label for="instructor_id">講師</label>
        <select name="instructor_id" class="form-control">
            <option value="" hidden>講師を選択</option>
            @foreach($instructors as $instructor)
                @if($instructor['id'] == $lesson['instructor_id'])
                    <option value="{{ $instructor['id'] }}" selected>{{ $instructor['name'] }}</option>
                @else
                    <option value="{{ $instructor['id'] }}">{{ $instructor['name'] }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="title">レッスン名</label>
        <input type="text" class="form-control" name="title" value="{{ old('title', $lesson->title) }}">
    </div>

    <div class="form-group">
        <label for="start" class="mt-2">開始時間</label>
        <input type="datetime-local" class="form-control" name="start" value="{{ old('start', $lesson->start) }}" id="start">
    </div>

    <div class="form-group">
        <label for="finish" class="mt-2">終了時間</label>
        <input type="datetime-local" class="form-control" name="finish" value="{{ old('finish', $lesson->finish) }}" id="finish">
    </div>

    <div class="form-group">
        <label for="color" class="mt-2">カラー</label>
        <input type="color" class="form-control" name="color" value="{{ old('color', $lesson->color) }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">編集</button>
    </div>
</form>

@endsection
