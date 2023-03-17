@extends('admin.master')
@section('title', 'Add New Menu | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Menu</h1>
    @include('admin.errors')

    <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-4">
            <label>Item</label>
            <input type="text" name="item" placeholder="Item" class="form-control">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id" class="form-control">
                <option value="">Select</option>
                @foreach ($services  as $service )
                <option value="{{ $service->id}}">{{ $service->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Price</label>
            <select name="price_id" class="form-control">
                <option value="">Select</option>
                @foreach ($prices  as $price )
                <option value="{{ $price->id}}">{{ $price->id }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Select</option>
                <option value="service">Service</option>
                <option value="price">Price</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
