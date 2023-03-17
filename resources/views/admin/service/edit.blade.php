@extends('admin.master')
@section('title', 'Edit Service | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Service</h1>
    @include('admin.errors')

    <form action="{{ route('admin.services.update',$service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $service->title }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Icon" class="form-control" value="{{ $service->icon }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <input type="text" name="content" placeholder="Content" class="form-control" value="{{ $service->content }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" class="form-control" value="{{ $service->description }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Small Description</label>
            <input type="text" name="smallDescription" placeholder="Small Description" class="form-control" value="{{ $service->smallDescription }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/services/'.$service->image) }}" alt="">

        </div>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
