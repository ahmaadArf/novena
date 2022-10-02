@extends('admin.master')
@section('title', 'Add New Testimonial | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Testimonial</h1>
    @include('admin.errors')

    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Comment</label>
            <textarea name="comment" placeholder="Comment" class="form-control" >{{ old('comment') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Small Desc</label>
            <textarea name="smallDec" placeholder="Small Desc" class="form-control" >{{ old('smallDec') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>type</label>
            <select name="type" id="" class="form-control">
                <option value="home">Home</option>
                <option value="about">About</option>
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
