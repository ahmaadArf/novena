<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.user.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|same:confirm-password',
        ]);
        $pass=Hash::make($request->password);
        $type='user';
        if($request->type){
            $type=$request->type;
        }
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$pass,
            'type'=>$type
        ]);

        if($request->type=='admin' && $request->roles){
            $user->assignRole($request->roles);
        }
        return redirect()->route('admin.users.index')->with('msg', 'Users added successfully')->with('type', 'success');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::all();
        $userRole = $user->roles->pluck('id')->all();

        return view('admin.user.edit',compact('user','userRole','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'same:confirm-password',
        ]);

        $user=User::find($id);
        $pass=$user->password;

        if($request->password){
            $pass=Hash::make($request->password);
        }
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$pass,
            'type'=>$request->type
        ]);
        if($request->type=='admin' && $request->role){
            $user->syncRoles($request->role);
        }

        return redirect()->route('admin.users.index')->with('msg', 'User Updated successfully')->with('type', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('msg', 'User Deleted successfully')->with('type', 'danger');

    }
}
