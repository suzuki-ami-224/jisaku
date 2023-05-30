@extends('layouts.app')

@section('content')
<style>
    .label {
        padding: 10px 40px;
        color: #ffffff;
        background-color: #384878;
        cursor: pointer;
        border: 1px solid black;
    }

    input[type="file"] {
        display: none;
    }
    
    .short-input {
        width: 100px;
    }
    
    .short-textarea {
        width: 100px;
        height: 80px;
    }
</style>

<a href="{{ route('instructor.index')}}" class="btn btn-secondary">戻る</a>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="my-4">
    <h2>講師編集</h2>
</div>

<form action="{{ route('instructor.update', ['instructor' => $result['id']]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="name">インストラクター名</label>
        <input type="text" class="form-control short-input" name="name" value="{{ old('name',$result->name)}}" required>
    </div>
    <div class="form-group">
        <label for="genre_id">ジャンル</label>
        <select name="genre_id" class="form-control short-input">
            @foreach($genres as $genre)
                @if($genre['id'] == $result['genre_id'])
                    <option value="{{ $genre['id']}}" selected>{{ $genre['name'] }}</option>
                @else
                    <option value="{{ $genre['id']}}">{{ $genre['name'] }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>
            <input type="file" name="picture" style="display: none;">
            <span class="label">ファイルを選択</span>
        </label>
        <p class="picture">{{ $result->picture }}</p>
    </div>
    <div class="form-group">
        <label for="comment" class="mt-2">自己PR</label>
        <textarea class="form-control short-textarea" rows="5" name="comment">{{ old('comment',$result->comment) }}</textarea>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">編集</button>
    </div>
</form>

@section('js')
<script src="{{ asset('js/instructor.js') }}"></script>
@endsection

@endsection
