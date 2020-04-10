@extends('layouts.cp')

@section('title', 'Новая категория')

@section('content')
<div class="row">
    <div class="col-12">
        <h1><span class="badge badge-primary">Новая категория</span></h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="md-form form-group">
                <input type="text" id="category-name" name="name" class="form-control">
                <label for="category-name">Имя категории</label>
            </div>
            <button type="submit" class="btn btn-primary">ОК</button>
            <a class="btn btn-primary" href="{{ route('categories.index') }}">Отмена</a>
        </form>
    </div>
</div>
@endsection