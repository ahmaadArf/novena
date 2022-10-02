@extends('admin.master')
@section('title', 'Feature | ' . env('APP_NAME'))
@section('content')

    <h1>All Features</h1>
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
                        <a class="btn btn-primary" href="{{ route('admin.features.edit', $feature->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.features.destroy', $feature->id) }}" method="POST">
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

