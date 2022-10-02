@extends('admin.master')
@section('title', 'Add New Award | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Award</h1>
    @include('admin.errors')

    <form action="{{ route('admin.awards.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Icon</label>
            <input type="text" name="icon" placeholder="Icon" class="form-control" value="{{ old('icon') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea  name="description" placeholder="Description" class="form-control">{{ old('description') }}</textarea>
        </div>


        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
