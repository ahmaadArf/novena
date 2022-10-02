<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_testimonial');

        $testimonials=Testimonial::paginate(10);
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_testimonial');

        return view('admin.testimonial.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('add_testimonial');

        $request->validate([
            'name'=>'required',
            'comment'=>'required',
            'type'=>'required',
            'smallDec'=>'required',
        ]);
        $img_name='';
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/testimonials'),$img_name);
        }
        Testimonial::create([
            'name'=>$request->name,
            'comment'=>$request->comment,
            'smallDec'=>$request->smallDec,
            'type'=>$request->type,
            'image'=>$img_name,

        ]);
        return redirect()->route('admin.testimonials.index')->
        with('msg', 'Testimonial added successfully')->with('type', 'success');
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
        Gate::authorize('edit_testimonial');

        $testimonial=Testimonial::find($id);

        return view('admin.testimonial.edit',compact('testimonial'));
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
        Gate::authorize('edit_testimonial');

        $testimonial=Testimonial::find($id);
        $request->validate([
            'name'=>'required',
            'comment'=>'required',
            'type'=>'required',
            'smallDec'=>'required',
        ]);
        $img_name=$testimonial->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/testimonials'),$img_name);
        File::delete(public_path('image/testimonials/'.$testimonial->image));

        }
        $testimonial->update([
            'name'=>$request->name,
            'comment'=>$request->comment,
            'smallDec'=>$request->smallDec,
            'type'=>$request->type,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.testimonials.index')->
        with('msg', 'Testimonial update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_testimonial');

        $testimonial=Testimonial::find($id);
        File::delete(public_path('image/testimonials/'.$testimonial->image));
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->
        with('msg', 'Testimonial delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        Gate::authorize('delete_testimonial');

        $testimonials = Testimonial::onlyTrashed()->paginate(10);

        return view('admin.testimonial.trash', compact('testimonials'));
    }

    public function restore($id)
    {
        Gate::authorize('delete_testimonial');

        Testimonial::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Gate::authorize('delete_testimonial');

        Testimonial::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.testimonials.index')->with('msg', 'Testimonial deleted permanintly successfully')->with('type', 'danger');
    }
}
