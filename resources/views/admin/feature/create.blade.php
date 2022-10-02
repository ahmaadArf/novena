@extends('admin.master')
@section('title', 'Add New Feature | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Feature</h1>
    @include('admin.errors')

    <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea name="content" placeholder="Content" class="form-control" >{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control">
                <option value="">Select</option>
                @foreach ($doctors as $doctor )
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Department</label>
            <select name="department_id"class="form-control" >
                <option value="">Select</option>
                @foreach ($departments as $department )
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control">
                    <option value="department">Department</option>
                    <option value="doctor">Doctor</option>
            </select>
        </div>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
