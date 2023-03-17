@extends('admin.master')
@section('title', 'Add New Service | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Service</h1>
    @include('admin.errors')

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Icon" class="form-control" value="{{ old('icon') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <input type="text" name="content" placeholder="Content" class="form-control" value="{{ old('content') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" class="form-control" value="{{ old('description') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Small Description</label>
            <input type="text" name="smallDescription" placeholder="Small Description" class="form-control" value="{{ old('smallDescription') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
