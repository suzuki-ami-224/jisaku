@extends('layouts.app')

@section('content')

<a href="{{ route('user.index')}}">戻る</a>


<div>レッスン登録</div>

@if($errors->any())
    <div class='alert alert-danger'>
        <ul>
        @foreach($errors->all() as $message)
            <li>{{ $message }} </li>
        @endforeach
        </ul>
    </div>
    @endif


<form action="{{ route('lesson.creat')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('GET')

    <select name='instructor_id' class='form-control'>
        <option value='' hidden>講師</option>
        @foreach($instructors as $instructor)
        <option value="{{ $instructor['id']}}">{{ $instructor['name'] }}</option>
        @endforeach
    </select><br>
    <label for='title'>レッスン名</label>
        <input type='text' class='form-control' name='title' value="{{ old('title')}}"/><br>
    <label for='start' class='mt-2'>開始時間</label>
      <input type="datetime-local" name="start"><br>
    <label for='finish' class='mt-2'>終了時間</label>
      <input type="datetime-local" name="finish"><br>
    <label for='color' class='mt-2'>カラー</label>
        <input type="color" class='form-control' name='color' value="{{ old('color') }}"></label>
    <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>        
    </div> 
</form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@stop
