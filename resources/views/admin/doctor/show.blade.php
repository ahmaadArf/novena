@extends('admin.master')
@section('title', 'Schedule | ' . env('APP_NAME'))
@section('content')


    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>All Schedules</h1>

    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Day</th>
                <th>Start</th>
                <th>End</th>
            </tr>
        </thead>
        <tbody>

                @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->day }}</td>
                    <td>{{ $schedule->dayEnd }}</td>
                    <td>{{ $schedule->Start }}</td>
                    <td>{{ $schedule->End }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end align-items-end mb-4">
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-primary mr-2 ">Back</a>
    </div>

    @stop

