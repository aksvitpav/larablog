@extends('layouts.app')

@section('title')
{{ $current_post->first()->title }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($current_post->first()->image)
                <img src="{{ asset('storage/'.$current_post->first()->image) }}" class="card-img-top">
                @endif
                <h1 class="card-title">
                    {{ $current_post->first()->title }}
                </h1>
                <div class="card-text">
                    {{ $current_post->first()->content }}
                </div>
            </div>
            <div class="card-footer">
                <small>Автор: </small><span class="badge badge-primary">{{ $current_post->first()->user->name }}</span>
                <small>Категория: </small><span class="badge badge-primary">{{ $current_post->first()->category->name }}</span>
                <small>Опубликовано: </small><span class="badge badge-primary">{{ $current_post->first()->created_at->diffforHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('navigation')
<ul class="nav nav-pills flex-column">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('welcome') }}">Все категории</a>
    </li>
    @foreach ($categories as $category)
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('category/'.$category->id)) ? 'active' : '' }}" href="{{ route('welcome.category', $category->id) }}">{{ $category->name }} <span class="badge badge-secondary">{{$category->posts->count()}}</span></a>
    </li>
    @endforeach
</ul>
@endsection