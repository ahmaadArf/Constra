@extends('admin.master')
@section('title', 'Edit Question | ' . env('APP_NAME'))

@section('content')

    <h1 class=" ml-4">Edit Question</h1>
    @include('admin.errors')

    <form action="{{ route('admin.questions.update',$question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Question</label>
            <input type="text" name="question" placeholder="Question" class="form-control" value="{{ $question->question }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Answer</label>
            <input type="text" name="answer" placeholder="Answer" class="form-control" value="{{ $question->answer }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Service</label>
            <select name="service_id" class="form-control" {{  $question->type!='service'?'disabled':'' }}>
                <option value="">Select</option>
                @foreach ($services as $service)
                <option value="{{ $service->id }}"{{ $question->service_id==$service->id?'selected':'' }}>{{ $service->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control"  >
                <option value="service"  {{ $question->type=='service'?'selected':'' }}>Service</option>
                <option value="faq" {{ $question->type=='faq'?'selected':'' }}>Faq</option>
            </select>
        </div>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
