<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use baramous\note;

class noteController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('note');                 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'massage' => 'required|string',
        ],
        [
            'massage.required' => 'برجاء كتابة رسالتك',
        ]);

        $note = note::create([
            "name"          => Auth::user()->name,
            "email"         => Auth::user()->email,
            "church"        => Auth::user()->church,
            "phone_number"  => Auth::user()->phone_number,
            "father"        => Auth::user()->father,
            "birth_day"     => Auth::user()->birth_day,
            "birth_month"   => Auth::user()->birth_month,
            "birth_year"    => Auth::user()->birth_year,
            "city"          => Auth::user()->city,
            "work"          => Auth::user()->work,
            "massage"       => $request->massage,
        ]);
        return redirect()->back()->with('message', 'تم ارسال رسالتك بنجاح');
    
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
