@extends('layouts.cp')

@section('title', 'Статистика блога')

@section('content')
<div class="row">
  <div class="col-sm-4">
    <div class="card text-white bg-primary mb-3">
        <div class="card-header">Посты</div>
        <div class="card-body">
            <p class="text-white text-center display-3">{{ $posts_count }}</p>
            <a href="{{ route('posts.index') }}" class="card-link text-white">Просмотреть</a>
        </div>
    </div>
  </div>
  <div class="col-sm-4">
      <div class="card text-white bg-secondary mb-3">
          <div class="card-header">Категории</div>
          <div class="card-body">
              <p class="text-white text-center display-3">{{ $categories_count }}</p>
              <a href="{{ route('categories.index') }}" class="card-link text-white">Просмотреть</a>
          </div>
      </div>
  </div>
    <div class="col-sm-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">Авторы</div>
            <div class="card-body">
                <p class="text-white text-center display-3">{{ $users_count }}</p>
                <a href="{{ route('users.index') }}" class="card-link text-white">Просмотреть</a>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection