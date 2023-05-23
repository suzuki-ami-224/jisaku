@extends('layouts.app')

@section('content')


<a href="{{ route('lesson.create')}}">レッスン登録</a>
<a href="{{ route('user.index')}}">戻る</a>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>講師</th>
                <th scope='col'>レッスン</th>
                <th scope='col'>開始</th>
                <th scope='col'>終了</th>
                <th scope='col'>カラー</th>
            </tr>
        </thead>
        <tbody>
        <div class="container">
            <div class="row">
                <div class="col">
                    @foreach($lessons as $lesson)
                    <tr>
                        <th>{{ $lesson->name }}</th>
                        <th>{{ $lesson->title }}</th>
                        <th>{{ $lesson->start }}</th>
                        <th>{{ $lesson->finish }}</th>
                        <th>{{ $lesson->color }}</th>
                    </th>
                    <th>
                        <a href="{{ route('lesson.edit', ['lesson' => $lesson->lessonid]) }}">
                            <div><button  class='btn btn-primary'>編集</button></div>
                        </a>
                        <form action="{{ route('lesson.destroy', ['lesson' => $lesson->lessonid]) }}" method="POST">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <div><button type="submit" class='btn btn-danger' onclick='return confirm("本当に削除しますか？")'>削除</button></div><br>
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