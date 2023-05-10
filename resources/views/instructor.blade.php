@extends('layouts.app')

@section('content')


<a href="{{ route('instructor.create')}}">講師登録</a>
<a href="{{ route('admin.index')}}">戻る</a>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>写真</th>
                <th scope='col'>講師名</th>
                <th scope='col'>コメント</th>
            </tr>
        </thead>
        <tbody>
        <div class="container">
            <div class="row">
                <div class="col">
                    @foreach($instructors as $instructor)
                    <tr>
                    <th><img width="200" height="250" src= "{{asset('storage/picture/'.$instructor['picture'])}}"></th>
                            <th>{{ $instructor['name'] }}</th>
                            <th>{{ $instructor['comment'] }}</th>
                            <th><a href="{{ route('instructor.edit', ['instructor' => $instructor['id']]) }}">編集</a>
                                <form action="{{ route('instructor.destroy', ['instructor' => $instructor['id']]) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <div><button type="submit" class='btn btn-danger'>削除</button></div><br>
                                </form>
                            </th>
                            
                    @endforeach
                    @endsection
                    </tr>
                </div>
        　</div>
        </div>
        </tbody>
    </table>