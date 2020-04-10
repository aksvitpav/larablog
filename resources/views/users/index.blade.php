@extends('layouts.cp')

@section('title', 'Авторы')

@section('content')
<div class="row">
    <div class="col-md-10">
        <h2>Авторы блога</h2>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Имя пользователя</th>
                    <th scope="col">Роль</th>
                    @if (auth()->user()->role == 'admin')<th scope="col">Действия</th>@endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    @if (auth()->user()->role == 'admin')
                    <td class="d-flex justify-content-start">
                        <a class="btn btn-sm btn-primary mr-1" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                        @if ($user->id !== auth()->user()->id)
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить пользователя?');"> <i class="fas fa-trash-alt"></i></button>
                            </form>
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection