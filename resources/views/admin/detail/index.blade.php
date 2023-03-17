@extends('admin.master')
@section('title', 'Project Detail | ' . env('APP_NAME'))
@section('content')

    <h1>All Project Details</h1>
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
                <th>Size</th>
                <th>Year</th>
                <th>Project</th>
                <th>Client</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($details as $detail)
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->name }} </td>
                    <td>{{ $detail->size }} </td>
                    <td>{{ $detail->year }} </td>
                    <td>{{ $detail->project->name }} </td>
                    <td>{{ $detail->client->name }} </td>
                    <td><img width="80" src="{{ asset('image/details/'.$detail->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.Project_details.edit', $detail->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.Project_details.destroy', $detail->id) }}" method="POST">
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

