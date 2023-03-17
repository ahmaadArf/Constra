@extends('admin.master')
@section('title', 'Edit Client | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Client</h1>
    @include('admin.errors')

    <form action="{{ route('admin.clients.update',$client->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{$client->name}}">
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/clients/'.$client->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
