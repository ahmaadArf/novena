@extends('admin.master')
@section('title', 'Edit Feature | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Feature</h1>
    @include('admin.errors')

    <form action="{{ route('admin.features.update',$feature->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')


        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea name="content" placeholder="Content" class="form-control" >{{ $feature->content }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Doctor</label>
            <select name="doctor_id" class="form-control" {{ $feature->type=='doctor'?'':'disabled' }} >
                <option value="">Select</option>
                @foreach ($doctors as $doctor )
                    <option {{ $feature->doctor_id==$doctor->id? 'selected':'' }} value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Department</label>
            <select name="department_id"class="form-control"{{ $feature->type=='department'?'':'disabled' }} >
                <option value="">Select</option>
                @foreach ($departments as $department )
                <option {{ $feature->department_id==$department->id? 'selected':'' }} value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="mb-3 ml-4">
            <label>Type</label>
            <select name="type" class="form-control" disabled>
                    <option {{ $feature->type=='department'? 'selected':'' }}  value="department">Department</option>
                    <option {{ $feature->type=='doctor'? 'selected':'' }}  value="doctor">Doctor</option>
            </select>
        </div>



        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
