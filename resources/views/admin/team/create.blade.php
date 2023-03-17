@extends('admin.master')
@section('title', 'Add New Team | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Team</h1>
    @include('admin.errors')

    <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Job</label>
            <input type="text" name="job" placeholder="Job" class="form-control" value="{{ old('job') }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Content</label>
            <input type="text" name="content" placeholder="Content" class="form-control" value="{{ old('content') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>


        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
