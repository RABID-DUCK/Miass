@extends('layouts.app')

@section('content')
    @if(isset($apps))
        <div class="filter d-flex">
            <span onclick="sortApp('dateDown')">По дате убыв.</span>
            <span onclick="sortApp('dateUp')">По дате возр.</span>
            <span onclick="sortApp('status')">По статусу</span>
        </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Статус</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Ответ пользователю</th>
            <th scope="col">Создана</th>
        </tr>
        </thead>
        <tbody id="applications">
        @foreach($apps as $app)
        <tr>
            <th scope="row">{{$app->id}}</th>
            <td>{{$app->name}}</td>
            <td><a href="{{route('app.show', $app->id)}}">{{$app->email}}</a></td>
            <td>{{$app->status}}</td>
            <td>{{$app->message}}</td>
            <td>{{$app->comment}}</td>
            <td>{{$app->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <h1>Здесь будут заявки пользователей, пока здесь пусто.</h1>
    @endif
@endsection
