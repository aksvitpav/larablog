@extends('layouts.cp')

@section('title', 'Посты')

@section('content')
<div class="row">
    <div class="col-md-10">
        <h2>Посты блога</h2>
    </div>
    <div class="col-md-2">
        <a class="btn btn-success" href="{{ route('posts.create') }}"><i class="fas fa-plus-square"></i></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td class="d-flex justify-content-start">
                        <a class="btn btn-sm btn-info mr-1" href="{{ route('posts.show', $post->id) }}"> <i
                                class="fas fa-eye"></i></a>
                        @if ($post->user->name == Auth::user()->name)
                        <a class="btn btn-sm btn-primary mr-1" href="{{ route('posts.edit', $post->id) }}"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Удалить пост?');"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection