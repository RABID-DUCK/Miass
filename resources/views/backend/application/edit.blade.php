@extends('layouts.app')

@section('content')
    @if(isset($app))
        <form class="form w-75" action="{{route('app.sent')}}" method="POST">
            @csrf
            @method('patch')

            <input type="hidden" value="{{$app->id}}" name="id_application">
            <div class="form-group">
                <label for="name_user">Имя</label>
                <input type="text" class="form-control" id="name_user" value="{{$app->name}}" disabled>
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="text" class="form-control" id="email" value="{{$app->email}}" disabled>
            </div>
            <div class="form-group">
                <label for="email">Статус</label>
                <select name="status" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Сообщение</label>
                <textarea class="form-control" id="message" rows="3" name="message" disabled>{{$app->message}}</textarea>
            </div>

            <div class="form-group">
                <label for="message">Комментарий</label>
                <textarea class="form-control" placeholder="Введите ответ пользователю" id="comment" rows="3" name="comment" required>{{$app->comment ?? ''}}</textarea>
                    @if($errors->any())
                        <b class="text-danger">{{$errors->first()}}</b>
                    @endif
            </div>

            <input class="btn mt-4" type="submit" value="Ответить">
        </form>
    @endif
@endsection
