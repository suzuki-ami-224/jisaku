@extends('layouts.app')

@section('content')


<a href="{{ route('instructor.create')}}">講師登録#</a>
<a href="{{ route('admin.index')}}">戻る</a>
<table class='table'>
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
                <a href="{{ route('instructor.show', ['instructor' => $instructor['id']]) }}">#</a>
            </th>
            <th scope='col'>{{ $instructor['name'] }}</th>
            <th scope='col'><img src= "{{asset('storage/picture/'.$instructor['picture'])}}"> </th>
            <th scope='col'>{{ $instructor['comment'] }}</th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
