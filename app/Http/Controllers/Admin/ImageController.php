<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProjectDetait;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:image-list|image-create|image-edit|image-delete', ['only' => ['index','store']]);
         $this->middleware('permission:image-create', ['only' => ['create','store']]);
         $this->middleware('permission:image-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:image-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=Image::paginate(10);
        return view('admin.image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        $details=ProjectDetait::all();
        return view('admin.image.create',compact('services','details'));

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
            'path'=>'required',
            'type'=>'required'
        ]);
        $img_name=rand().time().$request->file('path')->getClientOriginalName();
        $request->file('path')->move(public_path('image/images'),$img_name);

        Image::create([
            'type'=>$request->type,
            'path'=>$img_name,
            'service_id'=>$request->service_id,
            'project_detait_id'=>$request->project_detait_id

        ]);
        return redirect()->route('admin.images.index')->
        with('msg', 'Image added successfully')->with('type', 'success');
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
        $image=Image::find($id);
        $services=Service::all();
        $details=ProjectDetait::all();
        return view('admin.image.edit',compact('image','services','details'));
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
        $image=Image::find($id);
        $request->validate([
            'type'=>'required',

        ]);
        $img_name=$image->path;
        if($request->path){
        $img_name=rand().time().$request->file('path')->getClientOriginalName();
        $request->file('path')->move(public_path('image/images'),$img_name);
        File::delete(public_path('image/images/'.$image->path));

        }

        $image->update([
            'type'=>$request->type,
            'path'=>$img_name,
            'service_id'=>$request->service_id,
            'project_detait_id'=>$request->project_detait_id

        ]);

        return redirect()->route('admin.images.index')->
        with('msg', 'Image update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image=Image::find($id);
        File::delete(public_path('image/images/'.$image->image));
        $image->delete();
        return redirect()->route('admin.images.index')->
        with('msg', 'Image delete successfully')->with('type', 'success');
    }

}
