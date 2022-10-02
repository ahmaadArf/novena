@extends('admin.master')
@section('title', 'Edit Qualification | ' . env('APP_NAME'))
@section('content')

    <h1 class=" ml-4">Edit Qualification</h1>
    @include('admin.errors')

    <form action="{{ route('admin.schedules.update',$schedule->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 ml-4">
            <label>Day</label>
            <input type="text" name="day" placeholder="Day" class="form-control" value="{{ $schedule->day }}">
        </div>
        <div class="mb-3 ml-4">
            <label>End Day</label>
            <input type="text" name="dayEnd" placeholder="End Day" class="form-control" value="{{ old('dayEnd') }}">
        </div>
        <div class="mb-3 ml-4">
            <label>Start</label>
            <input type="time" name="Start" placeholder="Start" class="form-control" value="{{ $schedule->Start }}">
        </div>
        <div class="mb-3 ml-4">
            <label>End</label>
            <input type="time" name="End" placeholder="End" class="form-control" value="{{ $schedule->End }}">
        </div>

        <button class="btn btn-success px-5 ml-4">Update</button>
    </form>

@stop
