@extends('layouts.cp')

@section('title', 'Категории')

@section('content')
<div class="row">
    <div class="col-10">
        <h1><span class="badge badge-primary">Категории блога</span></h1>
    </div>
    @if (auth()->user()->role == 'admin')
    <div class="col-2 col-2 d-flex justify-content-end">
        <a class="btn btn-success px-3" href="{{ route('categories.create') }}" title="Создать новую категорию"><i class="fas fa-plus-square"></i></a>
    </div>
    @endif
</div>
<div class="row">
    <div class="col">
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th scope="col" class="font-weight-bold">id</th>
                    <th scope="col" class="font-weight-bold">Название</th>
                    @if (auth()->user()->role == 'admin')<th scope="col" class="font-weight-bold">Действия</th>@endif
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    @if (auth()->user()->role == 'admin')
                    <td class="d-flex align-items-center">
                        <a class="btn btn-sm btn-primary px-2 mr-1" href="{{ route('categories.edit', $category->id) }}" title="Редактировать категорию"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger px-2 m-0" onclick="return confirm('Удалить категорию?');" title="Удалить категорию"> <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('partials.pagination', ['data'=>$categories])
@endsection