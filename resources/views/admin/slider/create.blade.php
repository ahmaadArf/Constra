@extends('admin.master')
@section('title', 'Add New Slider | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Slider</h1>
    @include('admin.errors')

    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Sub Title</label>
            <input type="text" name="subTitle" placeholder="Sub Title" class="form-control" value="{{ old('subTitle') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" class="form-control" value="{{ old('description') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Btn</label>
            <input type="text" name="btn" placeholder="Btn" class="form-control" value="{{ old('btn') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Btn Url</label>
            <input type="text" name="btnUrl" placeholder="Btn Url" class="form-control" value="{{ old('btn') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
