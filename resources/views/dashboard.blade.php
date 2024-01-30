@extends('layouts.app')

@section('content')
    <form class="form w-75">
        <div class="form-group">
            <label for="name_user">Ваше имя</label>
            <input type="text" class="form-control" id="name_user" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Ваша почта</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Ваше сообщение</label>
            <textarea class="form-control" id="message" rows="3" name="message" required></textarea>
        </div>

        <input class="btn mt-4" type="button" value="Отправить" onclick="sendApplication()">
    </form>
@endsection
