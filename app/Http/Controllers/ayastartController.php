<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use baramous\ayastart;

class ayastartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ayastart')->with('ayastarts',ayastart::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createayastart')->with('ayastarts',ayastart::all());
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
            "name"=>"required",
        ],
        [
            'name.required' => 'برجاء كتابة الاية',
        ]);

        $ayastart = ayastart::create([
            "name" => $request->name,    
        ]);
        return redirect()->route('admin.ayastart');
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
        $ayastart=ayastart::find($id);
        return view('admin.editayastart')->with('ayastart',$ayastart);
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
        $ayastart=ayastart::find($id);
        $this->validate($request,[
            "name"=>"required",
        ],
        [
            'state.required' => 'برجاء كتابة الاية',
        ]);
        $ayastart->name=$request->name;
        $ayastart->save();
        return redirect()->route('admin.ayastart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ayastart=ayastart::find($id);
        $ayastart->destroy($id);
        return redirect()->route('admin.ayastart');
    }
}
