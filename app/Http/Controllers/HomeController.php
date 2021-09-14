<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use baramous\homepage;
use baramous\hagz;



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
        if(auth()->user()->admin) {
            $hagzs = hagz::where('hagz_state','=',NULL)->paginate(10);
            return view('admin.mangehagz', compact('hagzs'));  
        } else {
            return view('index'); 
        }
    }
}
