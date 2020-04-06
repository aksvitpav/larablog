@extends('layouts.cp')

@section('title')
{{ $post->title }}
@endsection

@section('content')
@if ($errors->any())
<div class="row">
    <div class="col-12">
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
        <div class="card">
            <div class="card-body">
                @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top">
                @endif
                <h1 class="card-title">
                    {{ $post->title }}
                </h1>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-sm btn-primary mr-1" href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить пост?');"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>

                <div class="card-text">
                    {{ $post->content }}
                </div>
            </div>
            <div class="card-footer">
                <span class="badge">Автор: {{ $post->user->name }}</span>
                <span class="badge">Категория: {{ $post->category->name }}</span>
                <span class="badge">Опубликовано: {{ $post->created_at->diffforHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection