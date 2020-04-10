@extends('layouts.cp')

@section('title', 'Редактирование профиля')

@section('content')
<div class="row">
    <div class="col">
        <h1><span class="badge badge-primary">Редактировать профиль</span></h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="md-form form-group">
                <input type="text" id="user-name" name="name" class="form-control" value="{{ $user->name }}">   
                <label for="user-name">Имя пользователя</label>   
            </div>
            <div class="form-group">
                <label for="user-role">Роль пользователя</label>
                <select class="form-control" id="user-role" name="role">
                    <option @if ($user->role == 'admin') selected="selected" @endif value="admin">Администратор</option>
                    <option @if ($user->role == 'author') selected="selected" @endif value="author">Автор</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">ОК</button>
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Отмена</a>
         </form>
    </div>
</div>
@endsection