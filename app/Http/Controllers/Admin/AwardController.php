<?php

namespace App\Http\Controllers\Admin;

use App\Models\Award;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AwardController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:award-list|award-create|award-edit|award-delete', ['only' => ['index','store']]);
         $this->middleware('permission:award-create', ['only' => ['create','store']]);
         $this->middleware('permission:award-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:award-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $awards=Award::paginate(10);
        return view('admin.award.index',compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.award.create');

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
            'description'=>'required',
            'icon'=>'required'
        ]);

        Award::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'icon'=>$request->icon,

        ]);
        return redirect()->route('admin.awards.index')->
        with('msg', 'Award added successfully')->with('type', 'success');
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

        $award=Award::find($id);

        return view('admin.award.edit',compact('award'));
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

        $award=Award::find($id);
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'icon'=>'required'
        ]);
        $award->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'icon'=>$request->icon,
        ]);

        return redirect()->route('admin.awards.index')->
        with('msg', 'Award update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $award=Award::find($id);
        $award->delete();
        return redirect()->route('admin.awards.index')->
        with('msg', 'Award delete successfully')->with('type', 'success');
    }
    public function trash()
    {

        $awards = Award::onlyTrashed()->paginate(10);

        return view('admin.award.trash', compact('awards'));
    }

    public function restore($id)
    {

        Award::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.awards.index')->with('msg', 'Award restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {

        Award::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.awards.index')->with('msg', 'Award deleted permanintly successfully')->with('type', 'danger');
    }
}
