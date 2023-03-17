@extends('admin.master')
@section('title', 'Slider | ' . env('APP_NAME'))
@section('content')

    <h1>All Slider</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Description</th>
                <th>Btn</th>
                <th>Btn Url</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($sliders as $slider)
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }} </td>
                    <td>{{ $slider->subTitle }} </td>
                    <td>{{ $slider->description }} </td>
                    <td>{{ $slider->btn }} </td>
                    <td>{{ $slider->btnUrl }} </td>
                    <td><img width="80" src="{{ asset('image/sliders/'.$slider->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.sliders.edit', $slider->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST">
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

