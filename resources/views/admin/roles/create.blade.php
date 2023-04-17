@extends('admin.master')
@section('title','Home')
@section('content')
<h1>Add new Role</h1>
    @include('admin.errors')
    <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"  class="form-control">
        </div>
        <div class="mb-6">
            <label>Permissions</label>
            <table class="table" width="200">
                @foreach ($permissions  as $permission )
                <tr>
                <td width="100px" ><input type="checkbox" name="permission[]" value="{{ $permission->id }}"></td>
                <td >{{$permission->name  }}</td>
            </tr>
                @endforeach
            </table>


        </div>


        <button class="btn btn-success px-5">Add</button>
    </form>
@stop
