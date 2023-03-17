@extends('admin.master')
@section('title', 'Image | ' . env('APP_NAME'))
@section('content')

    <h1>All Images</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Path</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($images as $image)
                    <td>{{ $image->id }}</td>
                    <td><img width="80" src="{{ asset('image/images/'.$image->path) }}" alt=""></td>
                    <td>{{ $image->type }}</td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.images.edit', $image->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.images.destroy', $image->id) }}" method="POST">
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

