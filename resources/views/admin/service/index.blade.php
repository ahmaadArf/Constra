@extends('admin.master')
@section('title', 'Service | ' . env('APP_NAME'))
@section('content')

    <h1>All Services</h1>
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
                <th>Content</th>
                <th>Description</th>
                <th>Small Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($services as $service)
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }} </td>
                    <td>{{ $service->icon }} </td>
                    <td>{{ $service->content }} </td>
                    <td>{{ $service->description }} </td>
                    <td>{{ $service->smallDescription }} </td>
                    <td><img width="80" src="{{ asset('image/services/'.$service->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.services.edit', $service->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.services.destroy', $service->id) }}" method="POST">
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

