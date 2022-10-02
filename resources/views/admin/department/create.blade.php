@extends('admin.master')
@section('title', 'Add New Department | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Department</h1>
    @include('admin.errors')

    <form action="{{ route('admin.departments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Content</label>
            <textarea name="content" placeholder="Content" class="form-control" >{{ old('content') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea name="description" placeholder="Description" class="form-control" >{{ old('description') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
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
                <td><input type="checkbox" name="schedule_id[]" value="{{ $schedule->id }}"></td>
                <td>{{ $schedule->day }}</td>
                <td>{{ $schedule->Start }}</td>
                <td>{{ $schedule->End }}</td>
            </tr>
             @endforeach
        </table>

        <button class="btn btn-success px-5 ml-4">Add</button>
    </form>

@stop
