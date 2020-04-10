@extends('layouts.app')

@section('title', 'Блог')

@section('content')
@foreach ($posts as $post)
<div class="row mb-3">
    <div class="col-12">
        <div class="card">
        @if ($post->image)
        <div class="row no-gutters">
            <div class="col-lg-4">
               <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top"> 
            </div>    
            <div class="col-lg-8">
            <div class="card-body pb-0">
                <h2 class="card-title">{{ substr($post->title, 0, 30).'...' }}</h2>
                <p class="card-text text-justify">{{ substr($post->content, 0, 180).'...' }}</p>
                <a href="{{ route('welcome.post', $post->id) }}" class="btn btn-sm btn-primary ml-0">Подробнее</a>
            </div>
            </div>
        </div>
        @else 
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text text-justify">{{ substr($post->content, 0, 400).'...' }}</p>
                <a href="{{ route('welcome.post', $post->id) }}" class="btn btn-sm btn-primary ml-0">Подробнее</a>
            </div>
        @endif
        <div class="card-footer">
                <small>Автор: </small><a class="badge badge-warning" href="{{ route('welcome.user', $post->user->id) }}">{{ $post->user->name }}</a>
                <small>Категория: </small><a class="badge badge-warning" href="{{ route('welcome.category', $post->category->id) }}">{{ $post->category->name }}</a>
                <small>Опубликовано: </small><span class="badge badge-warning">{{ $post->created_at->diffforHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endforeach
@include('partials.pagination', ['data'=>$posts])
@endsection

@section('navigation')
<div class="card">
  <div class="card-body">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('welcome') }}">Все категории</a>
        </li>
        @foreach ($categories as $category)
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('category/'.$category->id)) ? 'active' : '' }}" href="{{ route('welcome.category', $category->id) }}">{{ $category->name }} <span class="badge badge-warning">{{$category->posts->count()}}</span></a>
        </li>
        @endforeach
    </ul>
  </div>
</div>
@endsection
