<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProjectDetait;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Support\Facades\File;

class ProjectDetailController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:projectDetail-list|projectDetail-create|projectDetail-edit|projectDetail-delete', ['only' => ['index','store']]);
         $this->middleware('permission:projectDetail-create', ['only' => ['create','store']]);
         $this->middleware('permission:projectDetail-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:projectDetail-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details=ProjectDetait::paginate(10);
        return view('admin.detail.index',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects=Project::all();
        $clients=Client::all();
        return view('admin.detail.create',compact('projects','clients'));

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
            'architect'=>'required',
            'location'=>'required',
            'size'=>'required',
            'year'=>'required',
            'project_id'=>'required',
            'client_id'=>'required',
            'image'=>'required'
        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/details'),$img_name);

        ProjectDetait::create([
            'name'=>$request->name,
            'content'=>$request->content,
            'architect'=>$request->architect,
            'location'=>$request->location,
            'size'=>$request->size,
            'year'=>$request->year,
            'project_id'=>$request->project_id,
            'client_id'=>$request->client_id,
            'image'=>$img_name,
        ]);
        return redirect()->route('admin.Project_details.index')->
        with('msg', 'ProjectDetait added successfully')->with('type', 'success');
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
        $detail=ProjectDetait::find($id);
        $projects=Project::all();
        $clients=Client::all();
        return view('admin.detail.edit',compact('detail','projects','clients'));
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
        $detail=ProjectDetait::find($id);
        $request->validate([
            'name'=>'required',
            'content'=>'required',
            'architect'=>'required',
            'location'=>'required',
            'size'=>'required',
            'year'=>'required',
            'project_id'=>'required',
            'client_id'=>'required',

        ]);
        $img_name=$detail->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/details'),$img_name);
        File::delete(public_path('image/details/'.$detail->image));

        }

        $detail->update([
            'name'=>$request->name,
            'content'=>$request->content,
            'architect'=>$request->architect,
            'location'=>$request->location,
            'size'=>$request->size,
            'year'=>$request->year,
            'project_id'=>$request->project_id,
            'client_id'=>$request->client_id,
            'image'=>$img_name,

        ]);

        return redirect()->route('admin.details.index')->
        with('msg', 'ProjectDetait update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail=ProjectDetait::find($id);
        File::delete(public_path('image/details/'.$detail->image));
        $detail->delete();
        return redirect()->route('admin.Project_details.index')->
        with('msg', 'ProjectDetait delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $details = ProjectDetait::onlyTrashed()->paginate(10);

        return view('admin.detail.trash', compact('details'));
    }

    public function restore($id)
    {
        ProjectDetait::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.Project_details.index')->with('msg', 'ProjectDetait restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        ProjectDetait::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.Project_details.index')->with('msg', 'ProjectDetait deleted permanintly successfully')->with('type', 'danger');
    }
}
