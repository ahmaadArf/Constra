<?php

namespace App\Http\Controllers\Admin;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prices=Price::with('service')->paginate(10);
        return view('admin.price.index',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        return view('admin.price.create',compact('services'));

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
            'per'=>'required',
            'price'=>'required',
            'service_id'=>'required',

        ]);
        Price::create([
            'per'=>$request->per,
            'price'=>$request->price,
            'service_id'=>$request->service_id,

        ]);
        return redirect()->route('admin.prices.index')->
        with('msg', 'Price added successfully')->with('type', 'success');
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
        $price=Price::find($id);
        $services=Service::all();
        return view('admin.price.edit',compact('price','services'));
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
        $price=Price::find($id);
        $request->validate([
            'per'=>'required',
            'price'=>'required',
            'service_id'=>'required',

        ]);
        $price->update([
            'per'=>$request->per,
            'price'=>$request->price,
            'service_id'=>$request->service_id,
        ]);

        return redirect()->route('admin.prices.index')->
        with('msg', 'Price update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price=Price::find($id);
        $price->delete();
        return redirect()->route('admin.prices.index')->
        with('msg', 'Price delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $prices = Price::onlyTrashed()->paginate(10);

        return view('admin.price.trash', compact('prices'));
    }

    public function restore($id)
    {
        Price::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.prices.index')->with('msg', 'Price restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Price::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.prices.index')->with('msg', 'Price deleted permanintly successfully')->with('type', 'danger');
    }
}

