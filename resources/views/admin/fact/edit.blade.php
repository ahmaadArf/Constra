@extends('admin.master')
@section('title', 'Edit Fact | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Fact</h1>
    @include('admin.errors')

    <form action="{{ route('admin.facts.update',$fact->id) }}" method="POST" >
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{ $fact->title }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Icon" class="form-control" value="{{ $fact->icon }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Conut</label>
            <input type="number" name="count" placeholder="Conut" class="form-control" value="{{ $fact->count }}">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
