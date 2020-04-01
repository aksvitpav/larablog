@extends('layouts.cp')

@section('title', 'Категории')

@section('content')
<div class="row">
    <div class="col-md-10">
        <h2>Категории блога</h2>
    </div>
    <div class="col-md-2">
        <a class="btn btn-success" href="{{ route('categories.create') }}"><i class="fas fa-plus-square"></i></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Название</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            <!--<a class="btn btn-sm btn-info" href="{{ route('categories.show', $category->id) }}"> <i
                                    class="fas fa-eye"></i></a>-->
                            <a class="btn btn-sm btn-primary" href="{{ route('categories.edit', $category->id) }}"><i
                                    class="fas fa-edit"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i
                                    class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection