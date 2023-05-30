@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">戻る</a>
            </div>
            <a href="{{ route('instructor.create') }}" class="btn btn-primary">講師登録</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">写真</th>
                        <th scope="col">講師名</th>
                        <th scope="col">コメント</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instructors as $instructor)
                    <tr>
                        <td><img src="{{ asset('storage/picture/'.$instructor['picture']) }}" alt="講師の写真" style="width: 200px; height: 250px;"></td>
                        <td>{{ $instructor['name'] }}</td>
                        <td>{{ $instructor['comment'] }}</td>
                        <td>
                            <a href="{{ route('instructor.edit', ['instructor' => $instructor['id']]) }}" class="btn btn-primary">編集</a>
                            <form action="{{ route('instructor.destroy', ['instructor' => $instructor['id']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
