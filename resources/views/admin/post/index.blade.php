@extends('admin.master')
@section('title', 'Post | ' . env('APP_NAME'))
@section('content')

    <h1>All Posts</h1>
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
                <th>Content</th>
                <th>Date</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($posts as $post)
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }} </td>
                    <td>{{ $post->content }} </td>
                    <td>{{ $post->date }} </td>
                    <td><img width="80" src="{{ asset('image/posts/'.$post->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
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

