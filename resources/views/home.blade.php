@extends('layouts.cp')

@section('title', 'Статистика блога')

@section('content')
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Посты</h4>
        <p class="card-text text-center display-3 font-weight-bold">{{ $posts_count }}</p>
        <a href="#" class="btn btn-primary">Просмотреть</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Категории</h4>
        <p class="card-text text-center display-3 font-weight-bold">{{ $categories_count }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Просмотреть</a>
      </div>
    </div>
  </div>
</div>
@endsection