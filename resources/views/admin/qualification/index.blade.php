@extends('admin.master')
@section('title', 'Qualification | ' . env('APP_NAME'))
@section('content')

    <h1>All Qualifications</h1>
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
                        <a class="btn btn-primary" href="{{ route('admin.qualifications.edit', $qualification->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.qualifications.destroy', $qualification->id) }}" method="POST">
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

