<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_about');

        $abouts=About::paginate(10);
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_about');

        return view('admin.about.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('add_about');

        $request->validate([
            'name'=>'required',
            'content'=>'required',
            'type'=>'required',
            'image'=>'required'
        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/abouts'),$img_name);

        About::create([
            'name'=>$request->name,
            'content'=>$request->content,
            'type'=>$request->type,
            'image'=>$img_name
        ]);
        return redirect()->route('admin.about.index')->
        with('msg', 'About added successfully')->with('type', 'success');
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
        Gate::authorize('edit_about');

        $about=About::find($id);

        return view('admin.about.edit',compact('about'));
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
        Gate::authorize('edit_about');

        $about=About::find($id);
        $request->validate([
            'name'=>'required',
            'content'=>'required',
            'type'=>'required',
        ]);

        $img_name=$about->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/abouts'),$img_name);
        File::delete(public_path('image/abouts/'.$about->image));

        }

        $about->update([
            'name'=>$request->name,
            'content'=>$request->content,
            'type'=>$request->type,
            'image'=>$img_name

        ]);

        return redirect()->route('admin.about.index')->
        with('msg', 'About update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_about');

        $about=About::find($id);
        File::delete(public_path('image/abouts/'.$about->image));
        $about->delete();
        return redirect()->route('admin.about.index')->
        with('msg', 'About delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        Gate::authorize('delete_about');

        $abouts = About::onlyTrashed()->paginate(10);

        return view('admin.about.trash', compact('abouts'));
    }

    public function restore($id)
    {
        Gate::authorize('delete_about');

        About::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.about.index')->with('msg', 'About restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Gate::authorize('delete_about');

        About::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.about.index')->with('msg', 'About deleted permanintly successfully')->with('type', 'danger');
    }
}
