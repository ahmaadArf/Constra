<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:team-list|team-create|team-edit|team-delete', ['only' => ['index','store']]);
         $this->middleware('permission:team-create', ['only' => ['create','store']]);
         $this->middleware('permission:team-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:team-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::paginate(10);
        return view('admin.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');

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
            'image'=>'required',
            'content'=>'required',
            'job'=>'required',

        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/teams'),$img_name);

        Team::create([
            'name'=>$request->name,
            'content'=>$request->content,
            'job'=>$request->job,
            'image'=>$img_name

        ]);
        return redirect()->route('admin.teams.index')->
        with('msg', 'Team added successfully')->with('type', 'success');
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
        $team=Team::find($id);

        return view('admin.team.edit',compact('team'));
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
        $team=Team::find($id);
        $request->validate([
            'name'=>'required',
            'content'=>'required',
            'job'=>'required',
        ]);
        $img_name=$team->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/teams'),$img_name);
        File::delete(public_path('image/teams/'.$team->image));

        }
        $team->update([
            'name'=>$request->name,
            'content'=>$request->content,
            'job'=>$request->job,
            'image'=>$img_name
        ]);

        return redirect()->route('admin.teams.index')->
        with('msg', 'Team update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team=Team::find($id);
        File::delete(public_path('image/teams/'.$team->image));

        $team->delete();
        return redirect()->route('admin.teams.index')->
        with('msg', 'Team delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $teams = Team::onlyTrashed()->paginate(10);

        return view('admin.team.trash', compact('teams'));
    }

    public function restore($id)
    {
        Team::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.teams.index')->with('msg', 'Team restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Team::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.teams.index')->with('msg', 'Team deleted permanintly successfully')->with('type', 'danger');
    }
}
