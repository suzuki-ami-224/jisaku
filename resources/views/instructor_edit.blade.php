@extends('layouts.app')

@section('content')

<a href="{{ route('instructor.index')}}">戻る</a>


<div><p>講師編集</p></div>

<form action="{{ route('instructor.update', ['instructor' => $result['id']]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <label for='name'>インストラクター名</label>
        <input type='text' class='form-control' name='name' value="{{ old('name',$result->name)}}"/><br>
    <select name='genre_id' class='form-control'>
        @foreach($genres as $genre)
            @if($genre['id'] == $result['genre_id'])
            
                <option value="{{ $genre['id']}}" selected>{{ $genre['name'] }}</option>
            @else
                <option value="{{ $genre['id']}}">{{ $genre['name'] }}</option>
            @endif
        @endforeach
    </select>
      <input type="file" name="picture" value="{{ old('picture',$result->picture)}}"><br>
    <label for='comment' class='mt-2'>自己PR</label>
        <textarea class='form-control' rows='5' name='comment'>{{ old('comment',$result->comment) }}</textarea>
    <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>編集</button>        
    </div> 
</form>
