@extends('admin.master')
@section('title','Home')
@section('content')
<h1>Add new User</h1>
    @include('admin.errors')
    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" value="{{ old('password') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirm-password" placeholder="Confirm Password" value="{{ old('confirm-password') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value="">Select</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Roles</label>
            <table class="table" width="200">
                @foreach ($roles  as $role )
                <tr>
                <td width="100px" ><input type="checkbox" name="roles[]" value="{{ $role->id }}"></td>
                <td >{{$role->name  }}</td>
                </tr>
                @endforeach
            </table>


        </div>


        <button class="btn btn-success px-5">Add</button>
    </form>
@stop
