@extends('admin.master')
@section('title', 'Edit Menu | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Menu</h1>
    @include('admin.errors')

    <form action="{{ route('admin.menus.update',$menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Item</label>
            <input type="text" name="item" placeholder="Item" class="form-control" value="{{ $menu->item }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id" class="form-control">
                <option value="">Select</option>
                @foreach ($services  as $service )
                <option value="{{ $service->id}}" {{ $menu->service_id==$service->id?'selected':'' }}>{{ $service->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Price</label>
            <select name="price_id" class="form-control">
                <option value="">Select</option>
                @foreach ($prices  as $price )
                <option value="{{ $price->id}}" {{ $menu->price_id==$price->id?'selected':'' }}>{{ $price->id }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="service" {{ $menu->type=='service'?'selected':'' }} >Service</option>
                <option value="price" {{ $menu->type=='price'?'selected':'' }} >Price</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
