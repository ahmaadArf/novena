@extends('admin.master')
@section('title','Home')
@section('content')
<h1>Edit User</h1>
    @include('admin.errors')
    <form action="{{ route('admin.users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $user->name }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email" value="{{ $user->email }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="confirm-password" placeholder="Confirm Password"  class="form-control">
        </div>
        <div class="mb-3">
            <label>Type</label>
            <select name="type"  class="form-control" >
                <option value="user" {{ $user->type=='user'?'selected':'' }}>User</option>
                <option value="admin" {{ $user->type=='admin'?'selected':'' }}>Admin</option>
            </select>
        </div>
        <div class="mb-6">
            <label>Roles</label>
            <table class="table" width="200">
                @foreach ($roles  as $role )
                <tr>
                <td width="100px" ><input type="checkbox"  name="role[]" value="{{ $role->id }}" {{ in_array($role->id ,$userRole) ?'checked':'' }}></td>
                <td >{{$role->name }}</td>
            </tr>
                @endforeach
            </table>


        </div>


        <button class="btn btn-success px-5">Update</button>
    </form>
@stop
