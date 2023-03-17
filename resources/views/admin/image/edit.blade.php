@extends('admin.master')
@section('title', 'Edit Image | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Image</h1>
    @include('admin.errors')

    <form action="{{ route('admin.images.update',$image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="path" class="form-control">
            <img width="80" src="{{ asset('image/images/'.$image->path) }}" alt="">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id" class="form-control">
                <option value="">Select</option>
                @foreach ($services  as $service )
                <option value="{{ $service->id}}"  {{ $image->service_id==$service->id?'selected':'' }}>{{ $service->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Detial</label>
            <select name="project_detait_id" class="form-control">
                <option value="">Select</option>
                @foreach ($details  as $detail )
                <option value="{{ $detail->id}}" {{ $image->project_detait_id==$detail->id?'selected':'' }}>{{ $detail->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="service" {{ $image->type=='service'?'selected':'' }} >Service</option>
                <option value="detait" {{ $image->type=='detait'?'selected':'' }} >Detait</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
