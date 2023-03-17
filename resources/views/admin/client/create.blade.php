@extends('admin.master')
@section('title', 'Add New Client | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Client</h1>
    @include('admin.errors')

    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
