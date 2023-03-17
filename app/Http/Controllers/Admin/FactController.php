<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facts=Fact::paginate(10);
        return view('admin.fact.index',compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fact.create');

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
            'title'=>'required',
            'icon'=>'required',
            'count'=>'required',

        ]);

        $img_name=rand().time().$request->file('icon')->getClientOriginalName();
        $request->file('icon')->move(public_path('image/facts'),$img_name);
        Fact::create([
            'title'=>$request->title,
            'icon'=> $img_name,
            'count'=>$request->count,

        ]);
        return redirect()->route('admin.facts.index')->
        with('msg', 'Fact added successfully')->with('type', 'success');
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
        $fact=Fact::find($id);

        return view('admin.fact.edit',compact('fact'));
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
        $fact=Fact::find($id);
        $request->validate([
            'title'=>'required',
            'icon'=>'required',
            'count'=>'required',
        ]);
        $fact->update([
            'title'=>$request->title,
            'icon'=>$request->icon,
            'count'=>$request->count,
        ]);

        return redirect()->route('admin.facts.index')->
        with('msg', 'Fact update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fact=Fact::find($id);
        $fact->delete();
        return redirect()->route('admin.facts.index')->
        with('msg', 'Fact delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $facts = Fact::onlyTrashed()->paginate(10);

        return view('admin.fact.trash', compact('facts'));
    }

    public function restore($id)
    {
        Fact::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.facts.index')->with('msg', 'Fact restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Fact::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.facts.index')->with('msg', 'Fact deleted permanintly successfully')->with('type', 'danger');
    }
}
