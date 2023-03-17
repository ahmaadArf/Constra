<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mnue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Service;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus=Mnue::paginate(10);
        return view('admin.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        $prices=Price::all();
        return view('admin.menu.create',compact('services','prices'));

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
            'item'=>'required',
            'type'=>'required',

        ]);


        Mnue::create([
            'type'=>$request->type,
            'item'=>$request->item,
            'price_id'=>$request->price_id,
            'service_id'=>$request->service_id,

        ]);
        return redirect()->route('admin.menus.index')->
        with('msg', 'Mnue added successfully')->with('type', 'success');
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
        $menu=Mnue::find($id);
        $services=Service::all();
        $prices=Price::all();
        return view('admin.menu.edit',compact('menu','services','prices'));
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
        $menu=Mnue::find($id);
        $request->validate([
            'item'=>'required',
            'type'=>'required',

        ]);
        $menu->update([
            'type'=>$request->type,
            'item'=>$request->item,
            'price_id'=>$request->price_id,
            'service_id'=>$request->service_id,


        ]);

        return redirect()->route('admin.menus.index')->
        with('msg', 'Mnue update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu=Mnue::find($id);
        $menu->delete();
        return redirect()->route('admin.menus.index')->
        with('msg', 'Mnue delete successfully')->with('type', 'success');
    }
     public function trash()
    {
        $menus = Mnue::onlyTrashed()->paginate(10);

        return view('admin.menu.trash', compact('menus'));
    }

    public function restore($id)
    {
        Mnue::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.menus.index')->with('msg', 'Mnue restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Mnue::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.menus.index')->with('msg', 'Mnue deleted permanintly successfully')->with('type', 'danger');
    }

}
