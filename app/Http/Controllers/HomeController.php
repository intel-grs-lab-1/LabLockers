<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accs;
use App\Color;

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


     public function addColor()
    {
        $data['title'] = "Add Admin user";
        $data['route'] = "post-color";

         // $data['accs'] = Accs::orderBy('id', 'desc');
        return view('Laptops.insertCsvdata', $data);
    }

    public function postColor(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Color::create($acc);
        session()->flash('message', 'Color Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }







    public function addAccessories()
    {
        $data['title'] = "Add Admin user";
        $data['route'] = "post-accessories";

         // $data['accs'] = Accs::orderBy('id', 'desc');
        return view('Laptops.insertCsvdata', $data);
    }

    public function postAccessories(Request $request)
    {
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Accs::create($acc);
        session()->flash('message', 'Accessories Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

}
