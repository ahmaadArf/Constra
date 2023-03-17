@extends('admin.master')
@section('title', 'Trashed Prices | ' . env('APP_NAME'))
@section('content')

    <h1>All Trashed Prices</h1>
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
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.prices.restore', $price->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.prices.forcedelete', $price->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
