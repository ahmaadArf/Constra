@extends('admin.master')
@section('title', 'Edit Price | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Price</h1>
    @include('admin.errors')

    <form action="{{ route('admin.prices.update',$price->id) }}" method="POST" >
        @csrf
        @method('put')

        <div class="mb-3 ml-4">
            <label>Per</label>
            <input type="text" name="per" placeholder="Per" class="form-control" value="{{$price->per }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Price</label>
            <input type="number" name="price" placeholder="Price" class="form-control" value="{{$price->price }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id" class="form-control">
                @foreach ($services as $service )
                <option value="{{ $service->id }}" {{ $price->service_id==$service->id?'selected':'' }} >{{ $service->title }}</option>
                @endforeach
            </select>

        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
