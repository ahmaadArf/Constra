@extends('admin.master')
@section('title', 'Projects | ' . env('APP_NAME'))
@section('content')

    <h1>All Projects</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($projects as $project)
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }} </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

