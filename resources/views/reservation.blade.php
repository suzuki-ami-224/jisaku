<a href="{{ route('genre.index')}}">戻る</a>


<div><p>予約</p></div>

<form action="/reservation" method="post" enctype="multipart/form-data">
    @csrf
    <label for='name'>インストラクター名</label>
        <input type='text' class='form-control' name='name' value="{{ old('name')}}"/><br>
    <select name='genre_id' class='form-control'>
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
