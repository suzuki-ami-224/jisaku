@extends('layouts.app')

@section('content')


<a href="{{ route('instructor.create')}}">講師登録</a>
<a href="{{ route('admin.index')}}">戻る</a>
    <thead>
        <tr>
            <th scope='col'>詳細</th>
            <th scope='col'>講師名</th>
            <th scope='col'>写真</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instructors as $instructor)
        <tr>
             <th scope='co1'>
                <a href="{{ route('instructor.edit', ['instructor' => $instructor['id']]) }}">#</a>
            </th>
            <th scope='col'>{{ $instructor['name'] }}</th>
            <th scope='col'><img src= "{{asset('storage/picture/'.$instructor['picture'])}}"> </th>
            <th scope='col'>{{ $instructor['comment'] }}</th>
            <form action="{{ route('instructor.destroy', ['instructor' => $instructor['id']]) }}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
                <button type="submit" class='btn btn-danger'>削除</button>
            </form>
        </tr>
        @endforeach
    </tbody>
@endsection
