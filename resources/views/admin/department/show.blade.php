@extends('admin.master')
@section('title', 'Schedule | ' . env('APP_NAME'))
@section('content')

    <h1>All Schedules</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Day</th>
                <th>End Day</th>
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
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('admin.departments.index') }}" class="btn btn-primary mr-2 ">Back</a>
    </div>
@stop

