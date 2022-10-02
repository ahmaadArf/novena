@extends('admin.master')
@section('title', 'Award | ' . env('APP_NAME'))
@section('content')

    <h1>All Awards</h1>
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
                        <a class="btn btn-primary" href="{{ route('admin.awards.edit', $award->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('admin.awards.destroy', $award->id) }}" method="POST">
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

