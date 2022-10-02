<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ScheduleController extends Controller
{
    public function index()
    {
        Gate::authorize('all_schedule');

        $schedules=Schedule::paginate(10);
        return view('admin.schedule.index',compact('schedules'));
    }
    public function create()
    {
        Gate::authorize('add_schedule');


        return view('admin.schedule.create');

    }
    public function store(Request $request)
    {
        Gate::authorize('add_schedule');

        $request->validate([
            'day'=>'required',
            'Start'=>'required',
            'End'=>'required',
        ]);
        $dayEnd=null;
        if($request->dayEnd){
            $dayEnd=$request->dayEnd;
        }
        Schedule::create([
            'day'=>$request->day,
            'dayEnd'=>$dayEnd,
            'Start'=>$request->Start,
            'End'=>$request->End,
        ]);
            return redirect()->route('admin.schedules.index')->
            with('msg', 'Schedule added successfully')->with('type', 'success');

    }
    public function edit($id)
    {
        Gate::authorize('edit_schedule');

        $schedule=Schedule::find($id);

        return view('admin.schedule.edit',compact('schedule'));
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
        Gate::authorize('edit_schedule');

        $schedule=Schedule::find($id);
        $request->validate([
            'day'=>'required',
            'Start'=>'required',
            'End'=>'required',

        ]);
        $dayEnd=$schedule->dayEnd;
        if($request->dayEnd){
            $dayEnd=$request->dayEnd;
        }
        $schedule->update([
            'day'=>$request->day,
            'Start'=>$request->Start,
            'End'=>$request->End,
            'dayEnd'=>$dayEnd,
        ]);

        return redirect()->route('admin.schedules.index')->
        with('msg', 'Schedule update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_schedule');

        $schedule=Schedule::find($id);
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->
        with('msg', 'Schedule delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        Gate::authorize('delete_schedule');

        $schedules = Schedule::onlyTrashed()->paginate(10);

        return view('admin.schedule.trash', compact('schedules'));
    }

    public function restore($id)
    {
        Gate::authorize('delete_schedule');

        Schedule::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.schedules.index')->with('msg', 'Schedule restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Gate::authorize('delete_schedule');

        Schedule::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.schedules.index')->with('msg', 'Schedule deleted permanintly successfully')->with('type', 'danger');
    }
}
