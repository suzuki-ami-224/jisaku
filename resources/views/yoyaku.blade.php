@extends('layouts.app')

@section('content')

<div class="container my-5">
    <a href="{{ route('user.index')}}" class="btn btn-primary mb-3">戻る</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="search">
                <form action="{{ route('reservation.index') }}" method="GET" class="mb-3">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name">講師名</label>
                            <select name="name" id="name" class="form-control">
                                <option value="">全て</option>
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor['name'] }}" @if($instructor['name'] == $name) selected @endif>{{ $instructor['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="genre">ジャンル</label>
                            <select name="genre" id="genre" class="form-control">
                                <option value="">全て</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre['name'] }}" @if($genre['name'] == $genre) selected @endif>{{ $genre['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="lesson">日時</label>
                            <select name="lesson" id="lesson" class="form-control">
                                <option value="">全て</option>
                                @foreach ($lessons as $lesson)
                                    <option value="{{ $lesson['start'] }}" @if($lesson['start'] == $lesson) selected @endif>{{ $lesson['start'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </form>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>講師名</th>
                        <th>ジャンル</th>
                        <th>日時</th>
                        <th>予約</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->genresname }}</td>
                            <td>{{ $item->start }}</td>
                            <td><a href="{{ route('reservation.edit', ['reservation' => $item->id]) }}" class="btn btn-primary">予約</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
