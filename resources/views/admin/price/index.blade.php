@extends('admin.master')
@section('title', 'Prices | ' . env('APP_NAME'))
@section('content')

    <h1>All Prices</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Per</th>
                <th>Price</th>
                <th>Service</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($prices as $price)
                    <td>{{ $price->id }}</td>
                    <td>{{ $price->per }} </td>
                    <td>{{ $price->price }} </td>
                    <td>{{ $price->service->title }} </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.prices.edit', $price->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.prices.destroy', $price->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

