@extends('admin.master')
@section('title', 'Add New Post | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Post</h1>
    @include('admin.errors')

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea name="content" placeholder="Content" class="form-control" >{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Date</label>
            <input type="date" name="date" placeholder="Date" class="form-control" value="{{ old('date') }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
