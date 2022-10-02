@extends('admin.master')
@section('title', 'Add New About | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new About</h1>
    @include('admin.errors')

    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea  name="content" placeholder="Content" class="form-control">{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Select</option>
                <option value="about">About</option>
                <option value="service">Service</option>
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
