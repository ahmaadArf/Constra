<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','store']]);
         $this->middleware('permission:service-create', ['only' => ['create','store']]);
         $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::paginate(10);
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');

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
            'content'=>'required',
            'description'=>'required',
            'smallDescription'=>'required',
            'image'=>'required',


        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/services'),$img_name);

        Service::create([
            'title'=>$request->title,
            'icon'=>$request->icon,
            'content'=>$request->content,
            'description'=>$request->description,
            'smallDescription'=>$request->smallDescription,
            'image'=>$img_name,

        ]);
        return redirect()->route('admin.services.index')->
        with('msg', 'Service added successfully')->with('type', 'success');
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
        $service=Service::find($id);

        return view('admin.service.edit',compact('service'));
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
        $service=Service::find($id);
        $request->validate([
            'title'=>'required',
            'icon'=>'required',
            'content'=>'required',
            'description'=>'required',
            'smallDescription'=>'required',

        ]);
        $img_name=$service->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/services'),$img_name);
        File::delete(public_path('image/services/'.$service->image));
        }

        $service->update([
            'title'=>$request->title,
            'icon'=>$request->icon,
            'content'=>$request->content,
            'description'=>$request->description,
            'smallDescription'=>$request->smallDescription,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.services.index')->
        with('msg', 'Service update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        File::delete(public_path('image/services/'.$service->image));
        $service->delete();
        return redirect()->route('admin.services.index')->
        with('msg', 'Service delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $services = Service::onlyTrashed()->paginate(10);

        return view('admin.service.trash', compact('services'));
    }

    public function restore($id)
    {
        Service::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.services.index')->with('msg', 'Service restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Service::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.services.index')->with('msg', 'Service deleted permanintly successfully')->with('type', 'danger');
    }
}
