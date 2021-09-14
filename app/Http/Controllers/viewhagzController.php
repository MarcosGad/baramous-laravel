<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use baramous\hagz;

class viewhagzController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewhagz')->with('viewhagz',hagz::all()->where('user_id','=',Auth::id())->where('show_user','=',0));
        
    }

    public function notshow($id)
    {
        $hagz = hagz::find($id); 
        $hagz->show_user = 1; 
        $hagz->save(); 
        return redirect()->route('viewhagz');
    }
}



