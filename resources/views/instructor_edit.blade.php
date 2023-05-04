@extends('layouts.app')

@section('content')

<div><p>講師編集</p></div>

<form action="instructor/{instructor}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <label for='name'>インストラクター名</label>
        <input type='text' class='form-control' name='name' value="{{ old('name',$result->name)}}"/><br>
    <select name='jenre_id' class='form-control'>
        <option value='' hidden>ジャンル</option>
        @foreach($genres as $genre)
            @if($genre['id'] == $result['jenre_id'])
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
