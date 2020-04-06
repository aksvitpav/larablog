@extends('layouts.cp')

@section('title', 'Редактирование профиля')

@section('content')
<div class="row">
    <div class="col">
        <h2>Редактировать профиль "{{ $user->name }}"</h2>
    </div>
</div>
@if ($errors->any())
<div class="row">
    <div class="col">
        <div class="alert alert-danger">
            <strong>Упс!</strong> Ошибка ввода данных!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-12">
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user-name">Имя пользователя:</label>
                <input type="text" id="user-name" name="name" class="form-control" value="{{ $user->name }}" placeholder="Введите имя пользователя">
            </div>
            <div class="form-group">
                <label for="user-role">Роль пользователя:</label>
                <select class="form-control" id="user-role" name="role">
                    <option @if ($user->role == 'admin') selected="selected" @endif value="admin">Администратор</option>
                    <option @if ($user->role == 'author') selected="selected" @endif value="author">Автор</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">ОК</button>
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Отмена</a>
            </div>
        </form>
    </div>
</div>
@endsection