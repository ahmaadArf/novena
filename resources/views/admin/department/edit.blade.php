@extends('admin.master')
@section('title', 'Edit Department | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Department</h1>
    @include('admin.errors')

    <form action="{{ route('admin.departments.update',$department->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ $department->name }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea name="content" placeholder="Content" class="form-control" >{{ $department->content }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea name="description" placeholder="Description" class="form-control" >{{ $department->description }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img width="80" src="{{ asset('image/departments/'.$department->image) }}" alt="">
        </div>
        <table class="table mb-3 ml-4">
            <tr>
                <th></th>
                <th>Day</th>
                <th>Start</th>
                <th>End</th>
            </tr>
            @foreach ($schedules as $schedule)
            <tr>
                <td><input {{ $department->schedules->find($schedule->id) ? 'checked' : '' }} type="checkbox" name="schedule_id[]" value="{{ $schedule->id }}"></td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->Start }}</td>
                <td>{{ $schedule->End }}</td>
            </tr>
             @endforeach
        </table>


        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
