<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accs;
use App\Color;
use App\Type;
use App\PowerSupply;
use App\ScreenSize;
use App\ThunderboltPorts;
use App\Touchscreen;
use App\Brand;
use App\cpuMan;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


     public function addColor(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-color";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postColor(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Color::create($acc);
        session()->flash('message', 'Color Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function addAccessories(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-accessories";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postAccessories(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Accs::create($acc);
        session()->flash('message', 'Accessories Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function addType(){
        $data['title'] = "Add Admin User";
        $data['route'] = "post-type";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postType(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Type::create($acc);
        session()->flash('message', 'Type Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function addPowerSupply(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-powerSupply";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postPowerSupply(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        PowerSupply::create($acc);
        session()->flash('message', 'Power Supply spec Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function addScreenSize(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-screenSize";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postScreenSize(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        ScreenSize::create($acc);
        session()->flash('message', 'Screen Size spec Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function addThunderboltPorts(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-ThunderboltPorts";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postThunderboltPorts(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        ThunderboltPorts::create($acc);
        session()->flash('message', 'Quantity of Thunderbolt Ports Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function addTouchscreen(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-Touchscreen";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postTouchscreen(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Touchscreen::create($acc);
        session()->flash('message', 'Touchscreen types Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    // Brand
    public function addBrand(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-Brand";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postBrand(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Brand::create($acc);
        session()->flash('message', 'Brand Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    // CPU OEM
    public function addCPUMan(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-CPUMan";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postCPUMan(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        cpuMan::create($acc);
        session()->flash('message', 'CPU Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }
}
