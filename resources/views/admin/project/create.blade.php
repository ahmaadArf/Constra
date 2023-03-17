@extends('admin.master')
@section('title', 'Add New Project | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Project</h1>
    @include('admin.errors')

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
