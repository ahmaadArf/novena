@extends('admin.master')
@section('title', 'Edit About | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit About</h1>
    @include('admin.errors')

    <form action="{{ route('admin.awards.update',$award->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $award->name }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Icon" class="form-control" value="{{ $award->icon }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea  name="description" placeholder="Description" class="form-control">{{ $award->description }}</textarea>
        </div>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
