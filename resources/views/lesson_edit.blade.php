@extends('layouts.app')

@section('content')

<a href="{{ route('lesson.index')}}">戻る</a>

<form action="{{ route('lesson.update', ['lesson' => $id]) }}" method="post">
    @method('patch')
    @csrf

    <select name='instructor_id' class='form-control'>
        <option value='' hidden>講師</option>
        @foreach($instructors as $instructor)
        @if($instructor['id'] == $lesson['instructor_id'])
            <option value="{{ $instructor['id']}}" selected>{{ $instructor['name'] }}</option>
        @else
            <option value="{{ $instructor['id']}}">{{ $instructor['name'] }}</option>
        @endif
        @endforeach
    </select><br>
    <label for='title'>レッスン名</label>
        <input type='text' class='form-control' name='title' value="{{ old('title',$lesson->title)}}"/><br>
    <label for='start' class='mt-2'>開始時間</label>
      <input type="datetime-local" name="start" value="{{ old('start',$lesson->start)}}" selected id='start'><br>
    <label for='finish' class='mt-2'>終了時間</label>
      <input type="datetime-local" name="finish" value="{{ old('finish',$lesson->finish)}}" selected id='finish'><br>
    <label for='color' class='mt-2'>カラー</label>
        <input type="color" class='form-control' name='color' value="{{ old('color',$lesson->color)}}"></label>
    <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>編集</button>        
    </div> 
</form>

@endsection

