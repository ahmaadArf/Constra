@extends('admin.master')
@section('title', 'Edit Post | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Post</h1>
    @include('admin.errors')

    <form action="{{ route('admin.posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea name="content" placeholder="Content" class="form-control" >{{ $post->content }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Date</label>
            <input type="date" name="date" placeholder="Date" class="form-control" value="{{ $post->date }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/posts/'.$post->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
