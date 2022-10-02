@extends('admin.master')
@section('title', 'Trashed Qualifications | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Qualifications</h1>
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
                <th>Place</th>
                <th>Year</th>
                <th>Content</th>
                <th>Doctor</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($qualifications as $qualification)
            <tr>
                <td>{{ $qualification->id }}</td>
                <td>{{ $qualification->name }}</td>
                <td>{{ $qualification->place }}</td>
                <td>{{ $qualification->year }}</td>
                <td>{{ $qualification->content }}</td>
                <td>{{ $qualification->doctor->name }}</td>
                <td><img width="80" src="{{ asset('image/qualifications/'.$qualification->image ) }}" alt=""></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.qualifications.restore', $qualification->id) }}"><i class="fas fa-undo"></i></a>
                    <form class="d-inline" action="{{ route('admin.qualifications.forcedelete', $qualification->id) }}" method="POST">
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
