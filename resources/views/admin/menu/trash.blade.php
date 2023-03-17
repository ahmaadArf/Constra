@extends('admin.master')

@section('title', 'Trashed Clients | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Clients</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($menus as $menu)
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->item }}</td>
                <td>{{ $menu->type }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.menus.restore', $menu->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.menus.forcedelete', $menu->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
