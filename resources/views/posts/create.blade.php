@extends('layouts.cp')

@section('title', 'Новый пост')

@section('content')
<div class="row">
    <div class="col-12">
    <h1><span class="badge badge-primary">Новый пост</span></h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="md-form form-group">
                <input type="text" id="post-title" name="title" class="form-control">
                <label for="post-title">Заголовок поста</label>
            </div>
            <div class="md-form">
                <textarea type="text" id="post-content" name="content" class="md-textarea form-control" rows="20"></textarea>
                <label for="post-content">Текст поста</label>
            </div>
            <div class="form-group">
                <label for="post-category">Категория</label>
                <select class="browser-default custom-select" id="post-category" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="post-image">Изображение поста</label>
                <input type="file" id="post-image" class="form-control-file" name="post_image">
            </div>
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <button type="submit" class="btn btn-primary">ОК</button>
            <a class="btn btn-primary" href="{{ route('posts.index') }}">Отмена</a>
        </form>
    </div>
</div>
@endsection
