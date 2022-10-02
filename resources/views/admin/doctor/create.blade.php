@extends('admin.master')
@section('title', 'Add New Doctor | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Add new Doctor</h1>
    @include('admin.errors')

    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 ml-4">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3 ml-4">
            <label>Skills</label>
            <textarea name="skills" placeholder="Skills" class="form-control" >{{ old('skills') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Description</label>
            <textarea name="description" placeholder="Description" class="form-control" >{{ old('description') }}</textarea>
        </div>
        <div class="mb-3 ml-4">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3 ml-4">
            <label>Facebook</label>
            <input type="text" name="facebook" placeholder="Facebook" class="form-control" value="{{ old('facebook') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Twitter</label>
            <input type="text" name="twitter" placeholder="Twitter" class="form-control" value="{{ old('twitter') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Skype</label>
            <input type="text" name="skype" placeholder="Skype" class="form-control" value="{{ old('skype') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Department</label>
            <select name="department_id" class="form-control">
                <option value="">Select</option>
                @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>

                @endforeach
            </select>
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
