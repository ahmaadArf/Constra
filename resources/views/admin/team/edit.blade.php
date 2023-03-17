@extends('admin.master')
@section('title', 'Edit Team | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Team</h1>
    @include('admin.errors')

    <form action="{{ route('admin.teams.update',$team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{$team->name }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Job</label>
            <input type="text" name="job" placeholder="Job" class="form-control" value="{{$team->job }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Content</label>
            <input type="text" name="content" placeholder="Content" class="form-control" value="{{$team->content }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/teams/'.$team->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
