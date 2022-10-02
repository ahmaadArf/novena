@extends('admin.master')
@section('title', 'Doctor | ' . env('APP_NAME'))
@section('content')

    <h1>All Doctors</h1>
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
                <th>Schedule</th>
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
                    <td> <a href="{{ route('admin.doctors.show',$doctor->id) }}">Schedule</a></td>

                    <td><img width="80" src="{{ asset('image/doctors/'.$doctor->image) }}" alt=""></td>
                     <td>
                        <a class="btn btn-primary" href="{{ route('admin.doctors.edit', $doctor->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop

