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
                <th>Title</th>
                <th>Icon</th>
                <th>Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($facts as $fact)
                <td>{{ $fact->id }}</td>
                <td>{{ $fact->title }} </td>
                <td>{{ $fact->icon }} </td>
                <td>{{ $fact->count }} </td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.facts.restore', $fact->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.facts.forcedelete', $fact->id) }}" method="POST">
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
