@extends('admin.master')
@section('title', 'Trashed Awards | ' . env('APP_NAME'))

@section('content')

    <h1>All Trashed Awards</h1>
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
                <th>Icon</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($awards as $award)
                <td>{{ $award->id }}</td>
                <td>{{ $award->name }} </td>
                <td>{{ $award->icon }} </td>
                <td>{{ $award->description }} </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.awards.restore', $award->id) }}"><i class="fas fa-undo"></i></a>
                    <form class="d-inline" action="{{ route('admin.awards.forcedelete', $award->id) }}" method="POST">
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
