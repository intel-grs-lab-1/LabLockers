<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\laptop;


class laptopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	$laptops = laptop::all();

    	return view('Laptops.index', compact('laptops'));
    }

    public function create(){
    	return view('Laptops.addLaptop');
    }

    public function store(Request $request){

		$request->validate([
            'Brand' => 'required',
            'Model' => 'required',
            'Screen_Size' => 'required',
            'CPU' => 'required',
            'GPU' => 'required',
            'RAM' => 'required',
            'HDD' => 'required',
            'SSD' => 'required',
            'OS' => 'required',
            'Power_Supply' => 'required',
            'Serial_Number' => 'required',
            'Comments' => 'required',
            'Location' => 'required'
        ]);

        $laptop = new laptop([
            'Brand' => $request->get('Brand'),
            'Model'=> $request->get('Model'),
            'Screen_Size'=> $request->get('Screen_Size'),
            'CPU'=> $request->get('CPU'),
            'GPU'=> $request->get('GPU'),
            'RAM'=> $request->get('RAM'),
            'HDD'=> $request->get('HDD'),
            'SSD'=> $request->get('SSD'),
            'OS'=> $request->get('OS'),
            'Power_Supply'=> $request->get('Power_Supply'),
            'Serial_Number'=> $request->get('Serial_Number'),
            'Comments'=> $request->get('Comments'),
            'Location'=> $request->get('Location')

        ]);
        $laptop->save();
        return redirect('/laptops')->with('success', 'Laptop has been added');

    }

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
    public function edit(laptop $laptop)
    {
        return view('Laptops.editLaptop', compact('laptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laptop $laptop)
    {
        $request->validate([
            'Brand' => 'required',
            'Model' => 'required',
            'Screen_Size' => 'required',
            'CPU' => 'required',
            'GPU' => 'required',
            'RAM' => 'required',
            'HDD' => 'required',
            'SSD' => 'required',
            'OS' => 'required',
            'Power_Supply' => 'required',
            'Serial_Number' => 'required',
            'Comments' => 'required',
            'Location' => 'required'
        ]);

        $laptop->update($request->all());

        return redirect()->route('laptops.index')->with('success','Laptop updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laptop = laptop::find($id);
        $laptop->delete();

        return redirect('/laptops')->with('success', 'Stock has been deleted Successfully');
    }
}
