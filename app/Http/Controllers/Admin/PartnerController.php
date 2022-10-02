<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('all_partner');

        $partners=Partner::paginate(10);
        return view('admin.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('add_partner');

        return view('admin.partner.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('add_partner');

        $request->validate([
            'image'=>'required'
        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/partners'),$img_name);

        Partner::create([
            'image'=>$img_name
        ]);
        return redirect()->route('admin.partners.index')->
        with('msg', 'Partner added successfully')->with('type', 'success');
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
        Gate::authorize('edit_partner');

        $partner=Partner::find($id);

        return view('admin.partner.edit',compact('partner'));
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
        Gate::authorize('edit_partner');

        $partner=Partner::find($id);
        $img_name=$partner->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/partners'),$img_name);
        File::delete(public_path('image/partners/'.$partner->image));

        }
        $partner->update([
            'image'=>$img_name

        ]);

        return redirect()->route('admin.partners.index')->
        with('msg', 'Partner update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('delete_partner');

        $partner=Partner::find($id);
        File::delete(public_path('image/partners/'.$partner->image));
        $partner->delete();
        return redirect()->route('admin.partners.index')->
        with('msg', 'Partner delete successfully')->with('type', 'success');
    }

}
