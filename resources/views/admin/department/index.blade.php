@extends('admin.master')
@section('title', 'Department | ' . env('APP_NAME'))
@section('content')

    <h1>All Departments</h1>
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
                <th>Content</th>
                <th>Description</th>
                <th>Schedule</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($departments as $department)
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }} </td>
                    <td>{{ $department->content }} </td>
                    <td>{{ $department->description }} </td>
                    <td> <a href="{{ route('admin.departments.show',$department->id) }}">Schedule</a></td>
                    <td><img width="80" src="{{ asset('image/departments/'.$department->image) }}" alt=""></td>
                     <td>
                        <a class="btn btn-primary" href="{{ route('admin.departments.edit', $department->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.departments.destroy', $department->id) }}" method="POST">
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

