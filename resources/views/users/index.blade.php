@extends('layouts.cp')

@section('title', 'Авторы')

@section('content')
<div class="row">
    <div class="col-10">
        <h1><span class="badge badge-primary">Авторы блога</span></h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th scope="col" class="font-weight-bold">id</th>
                    <th scope="col" class="font-weight-bold">Имя пользователя</th>
                    <th scope="col" class="font-weight-bold">Роль</th>
                    @if (auth()->user()->role == 'admin')<th scope="col" class="font-weight-bold">Действия</th>@endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    @if (auth()->user()->role == 'admin')
                    <td class="d-flex align-items-center">
                        <a class="btn btn-sm btn-primary px-2 mr-1" href="{{ route('users.edit', $user->id) }}" title="Редактировать пользователя"><i class="fas fa-edit"></i></a>
                        @if ($user->id !== auth()->user()->id)
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger px-2 m-0" onclick="return confirm('Удалить пользователя?');" title="Удалить пользователя"> <i class="fas fa-trash-alt"></i></button>
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
@include('partials.pagination', ['data'=>$users])
@endsection