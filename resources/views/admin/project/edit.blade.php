@extends('admin.master')
@section('title', 'Edit Project | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Project</h1>
    @include('admin.errors')

    <form action="{{ route('admin.projects.update',$project->id) }}" method="POST" >
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $project->name }}">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
