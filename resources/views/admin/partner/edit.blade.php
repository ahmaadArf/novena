@extends('admin.master')
@section('title', 'Edit Partner | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Partner</h1>
    @include('admin.errors')

    <form action="{{ route('admin.partners.update',$partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/partners/'.$partner->image) }}" alt="">
        </div>
        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
