@extends('admin.master')
@section('title', 'Trashed Doctors | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Doctors</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Skills</th>
                <th>Department</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)

            <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }} </td>
                    <td>{{ $doctor->description }} </td>
                    <td>{{ $doctor->skills }} </td>
                    <td>{{ $doctor->department->name }} </td>
                    <td><img width="80" src="{{ asset('image/doctors/'.$doctor->image) }}" alt=""></td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.doctors.restore', $doctor->id) }}"><i class="fas fa-undo"></i></a>
                        <form class="d-inline" action="{{ route('admin.doctors.forcedelete', $doctor->id) }}" method="POST">
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
