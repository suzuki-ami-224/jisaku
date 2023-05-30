@extends('layouts.app')

@section('content')

<a href="{{ route('instructor.index')}}" class="btn btn-secondary">戻る</a>

<div class="my-4">
    <h2>講師登録</h2>
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

<form action="{{ route('instructor.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">インストラクター名</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="genre_id">ジャンル</label>
        <select name="genre_id" class="form-control" required>
            <option value="" hidden>ジャンルを選択</option>
            @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
            @endforeach
        </select>
        <small><a href="{{ route('genre.create') }}">ジャンル追加</a></small>
    </div>
    <div class="form-group">
        <label for="picture">写真</label>
        <input type="file" class="form-control-file" name="picture" required>
    </div>
    <div class="form-group">
        <label for="comment">自己PR</label>
        <textarea class="form-control" rows="5" name="comment" required>{{ old('comment') }}</textarea>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">登録</button>
    </div>
</form>
@endsection
