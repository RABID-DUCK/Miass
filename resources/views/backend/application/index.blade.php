@extends('layouts.app')

@section('content')
    @if(isset($apps))
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Статус</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Ответ пользователю</th>
        </tr>
        </thead>
        <tbody>
        @foreach($apps as $app)
        <tr>
            <th scope="row">{{$app->id}}</th>
            <td>{{$app->name}}</td>
            <td><a href="{{route('app.show', $app->id)}}">{{$app->email}}</a></td>
            <td>{{$app->status}}</td>
            <td>{{$app->message}}</td>
            <td>{{$app->comment}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <h1>Здесь будут заявки пользователей, пока здесь пусто.</h1>
    @endif
@endsection
