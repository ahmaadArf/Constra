@extends('admin.master')
@section('title', 'Trashed Services | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Services</h1>
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

           @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->title }} </td>
                <td>{{ $service->icon }} </td>
                <td>{{ $service->content }} </td>
                <td>{{ $service->description }} </td>
                <td>{{ $service->smallDescription }} </td>
                <td><img width="80" src="{{ asset('image/services/'.$service->image) }}" alt=""></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.services.restore', $service->id) }}"><i class="fas fa-undo"></i></a>
                    <form class="d-inline" action="{{ route('admin.services.forcedelete', $service->id) }}" method="POST">
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
