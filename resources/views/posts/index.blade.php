@extends('layouts.cp')

@section('title', 'Посты')

@section('content')
<div class="row">
    <div class="col-10">
        <h1><span class="badge badge-primary">Посты блога</span></h1>
    </div>
    <div class="col-2 d-flex justify-content-end">
        <a class="btn btn-success px-3" href="{{ route('posts.create') }}" title="Создать новый пост"><i class="fas fa-plus-square"></i></a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th scope="col" class="font-weight-bold">id</th>
                    <th scope="col" class="font-weight-bold">Название</th>
                    <th scope="col" class="font-weight-bold">Категория</th>
                    <th scope="col" class="font-weight-bold">Автор</th>
                    <th scope="col" class="font-weight-bold">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td class="d-flex align-items-center">
                        <a class="btn btn-sm btn-info px-2 mr-1" href="{{ route('posts.show', $post->id) }}" title="Просмотреть пост"> <i class="fas fa-eye"></i></a>
                        <a class="btn btn-sm btn-primary px-2 mr-1" href="{{ route('posts.edit', $post->id) }}" title="Редактировать пост"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger px-2 m-0" onclick="return confirm('Удалить пост?');" title="Удалить пост"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('partials.pagination', ['data'=>$posts])
@endsection