@extends('admin.master')
@section('title', 'Edit Detail | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Detail</h1>
    @include('admin.errors')

    <form action="{{ route('admin.Project_details.update',$detail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $detail->name}}">
        </div>

        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea name="content" placeholder="Content" class="form-control" >{{ $detail->content}}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Architect</label>
            <textarea name="architect" placeholder="Architect" class="form-control">{{ $detail->architect}}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Location</label>
            <input type="Url" name="location" placeholder="Location" class="form-control" value="{{ $detail->location}}">
        </div>
        <div class="mb-3 ml-4">
            <label>Size</label>
            <input type="number" name="size" placeholder="Size" class="form-control" value="{{ $detail->size}}">
        </div>
        <div class="mb-3 ml-4">
            <label>Year</label>
            <input type="number" name="year" placeholder="Year" class="form-control" value="{{ $detail->year}}">
        </div>
        <div class="mb-3 ml-4">
            <label>Project</label>
            <select name="project_id" class="form-control" >
                @foreach ($projects as $project)
                    <option value="{{ $project->id }} {{ $detail->project_id==$project->id?'selected':'' }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Client</label>
            <select name="client_id" class="form-control" >
                @foreach ($clients as $client)
                    <option value="{{ $client->id }} {{ $detail->client_id==$client->id?'selected':'' }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/details/'.$detail->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
