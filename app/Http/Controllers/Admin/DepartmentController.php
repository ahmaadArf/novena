<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_department');
        $departments=Department::paginate(10);
        return view('admin.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_department');
        $schedules=Schedule::all();

        return view('admin.department.create',compact('schedules'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('add_department');
        $request->validate([
            'name'=>'required',
            'content'=>'required',
            'description'=>'required',
            'image'=>'required',
            'schedule_id'=>'required'
        ]);

        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/departments'),$img_name);
        Department::create([
            'name'=>$request->name,
            'content'=>$request->content,
            'description'=>$request->description,
            'image'=>$img_name,

        ]);

        $department=Department::orderbydesc('id')->first();
        $department->schedules()->sync($request->schedule_id);
        return redirect()->route('admin.departments.index')->
        with('msg', 'Department added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('all_department');
       $department=Department::find($id);
       $schedules=$department->schedules;
       return view('admin.department.show',compact('schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit_department');

        $department=Department::find($id);
        $schedules=Schedule::all();

        return view('admin.department.edit',compact('department','schedules'));
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
        Gate::authorize('edit_department');

        $department=Department::find($id);
        $request->validate([
            'name'=>'required',
            'content'=>'required',
            'description'=>'required',
            'schedule_id'=>'required'
        ]);
        $img_name=$department->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/departments'),$img_name);
        File::delete(public_path('image/departments/'.$department->image));

        }
        $department->update([
            'name'=>$request->name,
            'content'=>$request->content,
            'description'=>$request->description,
            'image'=>$img_name,
        ]);
        $department->schedules()->sync($request->schedule_id);

        return redirect()->route('admin.departments.index')->
        with('msg', 'Department update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_department');

        $department=Department::find($id);
        File::delete(public_path('image/departments/'.$department->image));
        $department->delete();
        return redirect()->route('admin.departments.index')->
        with('msg', 'Department delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        Gate::authorize('delete_department');

        $departments = Department::onlyTrashed()->paginate(10);

        return view('admin.department.trash', compact('departments'));
    }

    public function restore($id)
    {
        Gate::authorize('delete_department');

        Department::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.departments.index')->with('msg', 'Department restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Gate::authorize('delete_department');

        Department::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.departments.index')->with('msg', 'Department deleted permanintly successfully')->with('type', 'danger');
    }
}
