@extends('layouts.app')

@section('title')
{{ $current_post->first()->title }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    {{ $current_post->first()->title }}
                </h1>
                <div class="card-text">
                    {{ $current_post->first()->content }}
                </div>
            </div>
            <div class="card-footer">
                <span class="badge">Автор: {{ $current_post->first()->user->name }}</span>
                <span class="badge">Категория: {{ $current_post->first()->category->name }}</span>
                <span class="badge">Опубликовано: {{ $current_post->first()->created_at->diffforHumans() }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
