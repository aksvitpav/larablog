@extends('layouts.cp')

@section('title', 'Категории')

@section('content')
<div class="row">

    <div class="col-md-10">
        <h2>Категории блога</h2>
    </div>
    @if (auth()->user()->role == 'admin')
    <div class="col-md-2">
        <a class="btn btn-success" href="{{ route('categories.create') }}"><i class="fas fa-plus-square"></i></a>
    </div>
    @endif
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    @if (auth()->user()->role == 'admin')<th scope="col">Действия</th>@endif
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    @if (auth()->user()->role == 'admin')
                    <td class="d-flex justify-content-start">
                        <a class="btn btn-sm btn-primary mr-1" href="{{ route('categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить категорию?');"> <i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection