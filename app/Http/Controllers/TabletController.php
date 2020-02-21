<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tablet;
use App\PowerSupply;
use App\Color;
use App\ScreenSize;
use App\Brand;
use App\cpuMan;
use App\Accs;

class TabletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tablets = Tablet::latest()->paginate(5);
  
        return view('Tablets.index',compact('tablets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $powerSupplys = PowerSupply::all();
        $colors = Color::all();
        $screenSizes = screenSize::all();
        $brands = Brand::all();
        $CPUMans = cpuMan::all();
        $accessories = Accs::all();
        return view('Tablets.create', compact('powerSupplys', 'colors', 'screenSizes', 'brands', 'CPUMans', 'accessories'));
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
            'brand' => 'required',
            'model' => 'required',
            'cpu_vendor' => 'required',
            'cpu_model' => 'required',
            'color' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'screen_size' => 'required',
            'power_supply' => 'required',
            'power_supply_details' => 'required',
            'accessories' => 'required',
            'sn' => 'required',
            'owner' => 'required',
            'location' => 'required',
            'comments' => 'required',
        ]);
  
        Tablet::create($request->all());
   
        return redirect()->route('tablets.index')
                        ->with('success','Tablet Stored successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablet $tablet)
    {
        return view('tablets.edit', compact('tablet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablet $Tablet)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'color' => 'required',
            'cpu_vendor' => 'required',
            'cpu_model' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'screen_size' => 'required',
            'power_supply' => 'required',
            'power_supply_deatils' => 'required',
            'accessories' => 'required',
            'sn' => 'required',
            'owner' => 'required',
            'location' => 'required',
            'comments' => 'required',
        ]);

        $tablet->update($request->all());
  
        return redirect()->route('tablets.index')
                        ->with('success','Tablet updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablet $Tablet)
    {
        $Tablet->delete();
  
        return redirect()->route('tablets.index')
                        ->with('success','Tablet deleted successfully');
    }
}
