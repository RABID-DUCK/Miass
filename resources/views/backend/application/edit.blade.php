@extends('layouts.app')

@section('content')
    @if(isset($app))
        <form class="form w-75">
            @csrf

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
                    <option value="0">Not selected</option>
                    <option value="Active">Active</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Сообщение</label>
                <textarea class="form-control" id="message" rows="3" name="message" value="{{$app->message}}" disabled></textarea>
            </div>

            <div class="form-group">
                <label for="message">Комментарий</label>
                <textarea class="form-control" id="comment" rows="3" name="comment" required></textarea>
            </div>
        </form>
    @endif
@endsection
