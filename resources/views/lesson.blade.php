<a href="{{ route('instructor.index')}}">戻る</a>


<div><p>レッスン登録</p></div>

@if($errors->any())
    <div class='alert alert-danger'>
        <ul>
        @foreach($errors->all() as $message)
            <li>{{ $message }} </li>
        @endforeach
        </ul>
    </div>
    @endif


<form action="/lesson" method="post" enctype="multipart/form-data">
    @csrf
    <select name='' class='form-control'>
        <option value='' hidden>ジャンル</option>
        @foreach($genres as $genre)
        <option value="{{ $genre['id']}}">{{ $genre['name'] }}</option>
        @endforeach
    </select>

    <select name='jenre_id' class='form-control'>
        <option value='' hidden>ジャンル</option>
        @foreach($genres as $genre)
        <option value="{{ $genre['id']}}">{{ $genre['name'] }}</option>
        @endforeach
    </select>
    <a href="{{ route('genre.create') }}">ジャンル追加</a><br>
      <input type="file" name="picture"><br>
    <label for='comment' class='mt-2'>自己PR</label>
        <textarea class='form-control' rows='5' name='comment'>{{ old('comment')}}</textarea>
    <div class='row justify-content-center'>
        <button type='submit' class='btn btn-primary w-25 mt-3'>登録</button>        
    </div> 
</form>