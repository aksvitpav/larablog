@extends('layouts.cp')

@section('title')
{{ $post->title }}
@endsection

@section('content')
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
                    <a class="btn btn-sm btn-primary px-2 mr-1" href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger px-2" onclick="return confirm('Удалить пост?');"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
                <div class="card-text">
                    {{ $post->content }}
                </div>
            </div>
            <div class="card-footer">
                <small>Автор: </small><span class="badge badge-primary"> {{ $post->user->name }}</span>
                <small>Категория: </small><span class="badge badge-primary"> {{ $post->category->name }}</span>
                <small>Опубликовано: </small><span class="badge badge-primary"> {{ $post->created_at->diffforHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection