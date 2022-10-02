@extends('admin.master')
@section('title', 'Edit About | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit About</h1>
    @include('admin.errors')

    <form action="{{ route('admin.about.update',$about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{$about->name }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea  name="content" placeholder="Content" class="form-control">{{$about->content}}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                <option {{ $about->type =='about'? 'selected': '' }} value="about">About</option>
                <option {{ $about->type =='service'? 'selected': '' }}  value="service">Service</option>
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/abouts/'.$about->image) }}" alt="">
        </div>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
