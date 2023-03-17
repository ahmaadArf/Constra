@extends('admin.master')
@section('title', 'Edit Slider | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Slider</h1>
    @include('admin.errors')

    <form action="{{ route('admin.sliders.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $slider->title }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Sub Title</label>
            <input type="text" name="subTitle" placeholder="Sub Title" class="form-control" value="{{ $slider->subTitle }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" class="form-control" value="{{ $slider->description }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Btn</label>
            <input type="text" name="btn" placeholder="Btn" class="form-control" value="{{ $slider->btn }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Btn Url</label>
            <input type="Url" name="btnUrl" placeholder="Btn Url" class="form-control" value="{{ $slider->btn }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">

        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
