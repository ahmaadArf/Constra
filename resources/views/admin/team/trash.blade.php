@extends('admin.master')
@section('title', 'Trashed Teams | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Teams</h1>
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
                <th>Job</th>
                <th>Content</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($teams as $team)
                <td>{{ $team->id }}</td>
                <td>{{ $team->name }} </td>
                <td>{{ $team->job }} </td>
                <td>{{ $team->content }} </td>
                <td><img width="80" src="{{ asset('image/teams/'.$team->image) }}" alt=""></td>

                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.teams.restore', $team->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.teams.forcedelete', $team->id) }}" method="POST">
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
