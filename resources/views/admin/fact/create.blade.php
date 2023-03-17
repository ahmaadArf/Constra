@extends('admin.master')
@section('title', 'Add New Fact | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Fact</h1>
    @include('admin.errors')

    <form action="{{ route('admin.facts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Icon</label>
            <input type="file" name="icon" class="form-control">
        </div>

        <div class="mb-3 ml-4">
            <label>Conut</label>
            <input type="number" name="count" placeholder="Conut" class="form-control" value="{{ old('count') }}">
        </div>



        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
