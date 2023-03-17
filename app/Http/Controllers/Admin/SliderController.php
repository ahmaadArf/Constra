<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::paginate(10);
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');

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
            'subTitle'=>'required',
            'description'=>'required',
            'btn'=>'required',
            'btnUrl'=>'required',
            'image'=>'required',
        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/sliders'),$img_name);

        Slider::create([
            'title'=>$request->title,
            'subTitle'=>$request->subTitle,
            'description'=>$request->description,
            'btn'=>$request->btn,
            'btnUrl'=>$request->btnUrl,
            'image'=>$img_name,
        ]);
        return redirect()->route('admin.sliders.index')->
        with('msg', 'Slider added successfully')->with('type', 'success');
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
        $slider=Slider::find($id);

        return view('admin.slider.edit',compact('slider'));
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
        $slider=Slider::find($id);
        $request->validate([
            'title'=>'required',
            'subTitle'=>'required',
            'description'=>'required',
            'btn'=>'required',
            'btnUrl'=>'required',

        ]);
        $img_name=$slider->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/sliders'),$img_name);
        File::delete(public_path('image/sliders/'.$slider->image));

        }

        $slider->update([
            'title'=>$request->title,
            'subTitle'=>$request->subTitle,
            'description'=>$request->description,
            'btn'=>$request->btn,
            'btnUrl'=>$request->btnUrl,
            'image'=>$img_name,
        ]);

        return redirect()->route('admin.sliders.index')->
        with('msg', 'Slider update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider=Slider::find($id);
        File::delete(public_path('image/sliders/'.$slider->image));
        $slider->delete();
        return redirect()->route('admin.sliders.index')->
        with('msg', 'Slider delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $sliders = Slider::onlyTrashed()->paginate(10);

        return view('admin.slider.trash', compact('sliders'));
    }

    public function restore($id)
    {
        Slider::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.sliders.index')->with('msg', 'Slider restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Slider::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.sliders.index')->with('msg', 'Slider deleted permanintly successfully')->with('type', 'danger');
    }
}
