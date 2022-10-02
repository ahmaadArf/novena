<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_doctor');

        $doctors=Doctor::with('department')->paginate(10);
        return view('admin.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_doctor');

        $departments=Department::all();
        $schedules=Schedule::all();
        return view('admin.doctor.create',compact('departments','schedules'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('add_doctor');

        $request->validate([
            'name'=>'required',
            'skills'=>'required',
            'description'=>'required',
            'image'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'skype'=>'required',
            'department_id'=>'required',
            'schedule_id'=>'required'
        ]);

        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/doctors'),$img_name);
        Doctor::create([
            'name'=>$request->name,
            'skills'=>$request->skills,
            'description'=>$request->description,
            'image'=>$img_name,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'skype'=>$request->skype,
            'department_id'=>$request->department_id,
        ]);

        $doctor=Doctor::orderbydesc('id')->first();
        $doctor->schedules()->sync($request->schedule_id);


        return redirect()->route('admin.doctors.index')->
        with('msg', 'Doctor added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Gate::authorize('all_doctor');

       $doctor=Doctor::find($id);
       $schedules=$doctor->schedules;
       return view('admin.doctor.show',compact('schedules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('edit_doctor');

        $doctor=Doctor::find($id);
        $departments=Department::all();
        $schedules=Schedule::all();

        return view('admin.doctor.edit',compact('doctor','departments','schedules'));
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
        Gate::authorize('edit_doctor');

        $doctor=Doctor::find($id);
        $request->validate([
            'name'=>'required',
            'skills'=>'required',
            'description'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'skype'=>'required',
            'department_id'=>'required',
            'schedule_id'=>'required'
        ]);
        $img_name=$doctor->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/doctors'),$img_name);
        File::delete(public_path('image/doctors/'.$doctor->image));

        }
        $doctor->update([
            'name'=>$request->name,
            'skills'=>$request->skills,
            'description'=>$request->description,
            'image'=>$img_name,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'skype'=>$request->skype,
            'department_id'=>$request->department_id,
        ]);

        $doctor->schedules()->sync($request->schedule_id);
        return redirect()->route('admin.doctors.index')->
        with('msg', 'Doctor update successfully')->with('type', 'success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_doctor');

        $doctor=Doctor::find($id);
        File::delete(public_path('image/doctors/'.$doctor->image));
        $doctor->delete();
        return redirect()->route('admin.doctors.index')->
        with('msg', 'Doctor delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        Gate::authorize('delete_doctor');

        $doctors = Doctor::onlyTrashed()->paginate(10);

        return view('admin.doctor.trash', compact('doctors'));
    }

    public function restore($id)
    {
        Gate::authorize('delete_doctor');

        Doctor::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.doctors.index')->with('msg', 'Doctor restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Gate::authorize('delete_doctor');

        Doctor::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.doctors.index')->with('msg', 'Doctor deleted permanintly successfully')->with('type', 'danger');
    }
}
