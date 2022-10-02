@extends('admin.master')
@section('title', 'Trashed Departments | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Departments</h1>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }}">
            {{ session('msg') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($features as $feature)
            <tr>
                <td>{{ $feature->id }}</td>
                <td>{{ $feature->content }} </td>
                <td>{{$feature->doctor? $feature->doctor->name:'' }} </td>

                <td>{{$feature->department? $feature->department->name:'' }} </td>
                <td>{{ $feature->type }} </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.features.restore', $feature->id) }}"><i class="fas fa-undo"></i></a>
                    <form class="d-inline" action="{{ route('admin.features.forcedelete', $feature->id) }}" method="POST">
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
