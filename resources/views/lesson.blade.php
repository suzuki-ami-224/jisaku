@extends('layouts.app')

@section('content')

<a href="{{ route('user.index')}}" class="btn btn-secondary">戻る</a>
<a href="{{ route('lesson.create')}}" class="btn btn-primary">レッスン登録</a>

<div class="container mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">講師</th>
                <th scope="col">レッスン</th>
                <th scope="col">開始</th>
                <th scope="col">終了</th>
                <th scope="col">カラー</th>
                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lessons as $lesson)
            <tr>
                <td>{{ $lesson->name }}</td>
                <td>{{ $lesson->title }}</td>
                <td>{{ $lesson->start }}</td>
                <td>{{ $lesson->finish }}</td>
                <td>
                    <div style="width: 20px; height: 20px; background-color: {{ $lesson->color }};"></div>
                </td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('lesson.edit', ['lesson' => $lesson->lessonid]) }}" class="btn btn-primary mr-2">編集</a>
                        <form action="{{ route('lesson.destroy', ['lesson' => $lesson->lessonid]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
