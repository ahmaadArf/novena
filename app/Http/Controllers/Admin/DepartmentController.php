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

    function __construct()
    {
         $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','store']]);
         $this->middleware('permission:department-create', ['only' => ['create','store']]);
         $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $department=Department::find($id);
        File::delete(public_path('image/departments/'.$department->image));
        $department->delete();
        return redirect()->route('admin.departments.index')->
        with('msg', 'Department delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $departments = Department::onlyTrashed()->paginate(10);
        return view('admin.department.trash', compact('departments'));
    }

    public function restore($id)
    {
        Department::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.departments.index')->with('msg', 'Department restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Department::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('admin.departments.index')->with('msg', 'Department deleted permanintly successfully')->with('type', 'danger');
    }
}
