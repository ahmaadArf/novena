<?php

namespace App\Http\Controllers\site;

use App\Mail\Contact;
use App\Models\About;
use App\Models\Award;
use App\Models\Doctor;
use App\Models\Partner;
use App\Models\Department;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
public function index()
    {
        $awards=Award::paginate(10);
        $testimonials=Testimonial::where('type','home')->paginate(10);
        $partners=Partner::all();
        $departments=Department::all();
        return view('site.index',compact('awards','testimonials','partners','departments'));
    }

    public function about()
    {
        $abouts=About::where('type','about')->paginate(10);
        $qualifications=Qualification::where('image','!=','')->select('image')->paginate(10);
        $doctors=Doctor::select('id','name','image')->get();
        $testimonials=Testimonial::where('type','about')->paginate(10);

        return view('site.about',compact('abouts','qualifications','doctors','testimonials'));
    }
    public function service()
    {
        $services=About::where('type','service')->paginate(10);

        return view('site.service',compact('services'));
    }
    public function department()
    {
        $departments=Department::paginate(10);

        return view('site.department',compact('departments'));
    }
    public function department_single($id)
    {
        $department=Department::with('features')->find($id);
        $schedules= $department->schedules;
        return view('site.department-single',compact('department','schedules'));
    }
    public function doctor()
    {
        $departments=Department::all();
        return view('site.doctor',compact('departments'));
    }
    public function doctor_single($id)
    {
        $doctor=Doctor::find($id);
        $schedules= $doctor->schedules;
        return view('site.doctor-single',compact('doctor','schedules'));
    }
    public function contact()
    {
        return view('site.contact');
    }
    public function contact_data(Request $request)
    {
      $data=$request->except('_token','submit');
      Mail::to('admin@gmaaail.com')->send(new Contact($data) );

    }
    public function appoinment()
    {
        $departments=Department::all();
        return view('site.appoinment',compact('departments'));
    }
    public function appoinment_data(Request $request)
    {
        return Department::find($request->id)->doctors;
    }
    public function appoinment_data_form(Request $request)
    {
        $request->validate([
            'department_id'=>'required',
            'doctor_id'=>'required',
            'date'=>'required',
            'time'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        Appoinment::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'date'=>$request->date,
            'time'=>$request->time,
            'message'=>$request->message,
            'department_id'=>$request->department_id,
            'doctor_id'=>$request->doctor_id

        ]);

        return  redirect()->route('site.confirmation');
    }
    public function confirmation()
    {
        return view('site.confirmation');
    }
}

