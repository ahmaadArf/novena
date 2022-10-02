@extends('admin.master')
@section('title', 'Trashed Schedules | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Schedules</h1>
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
                <th>Actions</th>
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
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.schedules.restore', $schedule->id) }}"><i class="fas fa-undo"></i></a>
                    <form class="d-inline" action="{{ route('admin.schedules.forcedelete', $schedule->id) }}" method="POST">
                        @csrf
                        @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-times"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach



        </tbody>

    </table>

@stop
