@extends('admin.master')
@section('title', 'Edit Testimonial | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Testimonial</h1>
    @include('admin.errors')

    <form action="{{ route('admin.testimonials.update',$testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Text</label>
            <input type="text" name="text" placeholder="Text" class="form-control" value="{{ $testimonial->text }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Sub Text</label>
            <input type="text" name="subText" placeholder="Sub Text" class="form-control" value="{{ $testimonial->subText }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Author</label>
            <input type="text" name="author" placeholder="Author" class="form-control" value="{{ $testimonial->author }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Select</option>
                <option value="service"{{ $testimonial->type=='service'?'selected':'' }}>Service</option>
                <option value="testimonial"{{ $testimonial->type=='testimonial'?'selected':'' }} >Testimonial</option>
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id" class="form-control">
                <option value="">Select</option>
                @foreach ($services  as $service )
                <option value="{{ $service->id}}" {{ $testimonial->service_id==$service->id? 'selected':''}}>{{ $service->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/testimonials/'.$testimonial->image) }}" alt="">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
