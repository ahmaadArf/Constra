<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','store']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::paginate(10);
        return view('admin.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');

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

        ]);
        Project::create([
            'name'=>$request->name,

        ]);
        return redirect()->route('admin.projects.index')->
        with('msg', 'Project added successfully')->with('type', 'success');
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
        $project=Project::find($id);

        return view('admin.project.edit',compact('project'));
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
        $project=Project::find($id);
        $request->validate([
            'name'=>'required',

        ]);
        $project->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.projects.index')->
        with('msg', 'Project update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::find($id);
        $project->delete();
        return redirect()->route('admin.projects.index')->
        with('msg', 'Project delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $projects = Project::onlyTrashed()->paginate(10);

        return view('admin.project.trash', compact('projects'));
    }

    public function restore($id)
    {
        Project::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.projects.index')->with('msg', 'Project restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Project::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.projects.index')->with('msg', 'Project deleted permanintly successfully')->with('type', 'danger');
    }
}
