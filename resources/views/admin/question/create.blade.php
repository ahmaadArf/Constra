@extends('admin.master')
@section('title', 'Add New Question | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Add new Question</h1>
    @include('admin.errors')

    <form action="{{ route('admin.questions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-4">
            <label>Question</label>
            <input type="text" name="question" placeholder="Question" class="form-control" value="{{ old('question') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Answer</label>
            <input type="text" name="answer" placeholder="Answer" class="form-control" value="{{ old('answer') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id" class="form-control">
                <option value="">Select</option>
                @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Select</option>
                <option value="service">Service</option>
                <option value="faq">Faq</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
