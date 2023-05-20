@extends('layouts.app')

@section('content')

<a href="{{ route('user.index')}}">戻る</a>

<div class="search" >
    <form action="{{ route('reservation.index') }}" method="GET">
        @csrf
        
        <div class="form-group">
            <div style="display:flex;">
                <div>
                    <label for="">講師名
                    <div>
                        <select name="name" data-toggle="select">
                            <option value="">全て</option>
                            @foreach ($instructors as $instructor)
                            @if($instructor['name'] == $name)
                                <option value="{{ $instructor['name'] }}"  selected>{{ $instructor['name'] }}</option>
                                @else
                                <option value="{{ $instructor['name'] }}">{{ $instructor['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div>
                    <label for="">ジャンル
                    <div>
                        <select name="genre" data-toggle="select">
　                        <option value="">全て</option>
                            @foreach ($genres as $genre)
                            @if($genre['name'] == $genre)
                                <option value="{{ $genre['name'] }}"  selected>{{ $genre['name'] }}</option>
                                @else
                                <option value="{{ $genre['name'] }}">{{ $genre['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>

                <div>
                    <label for="">日時
                    <div>
                        <select name="lesson" data-toggle="select">
　                        <option value="">全て</option>
                            @foreach ($lessons as $lesson)
                            @if($lesson['start'] == $lesson)
                                <option value="{{ $lesson['start'] }}"  selected>{{ $lesson['start'] }}</option>
                                @else
                                <option value="{{ $lesson['start'] }}">{{ $lesson['start'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>
                
                <div>
                    <input type="submit" class="btn" value="検索">
                </div>
            </div>
        </div>
    </form>
</div>

    <table>
        <tr>
            <th>id</th>
            <th>講師名</th>
            <th>ジャンル</th>
            <th>日時</th>
        </tr>

        @foreach ($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->genresname }}</td>
            <td>{{ $item->start }}</td>
            <td><a href="{{ route('reservation.create', ['lesson' => $lesson->id])}}">予約</a></td>
        </tr>
        @endforeach
</td>
    </table>
@endsection