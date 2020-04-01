@extends('layouts.cp')

@section('title', 'Новая категория')

@section('content')
<div class="row">
    <div class="col">
        <h2>Новая категория</h2>
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
    <div class="col">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <strong>Название категории:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Введите название категории">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">ОК</button>
                    <a class="btn btn-primary" href="{{ route('categories.index') }}"> Отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection