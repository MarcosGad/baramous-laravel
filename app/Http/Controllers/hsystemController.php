<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\hsystem;

class hsystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hsystem')->with('hsystems',hsystem::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createhsystem')->with('hsystems',hsystem::all());
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
            'state.required' => 'برجاء كتابة النص',
        ]);

        $hsystem = hsystem::create([
            "name" => $request->name,    
        ]);
        return redirect()->route('admin.hsystem');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.hsystem')->with('hsystems',hsystem::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hsystem=hsystem::find($id);
        return view('admin.edithsystem')->with('hsystem',$hsystem);
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
        $hsystem=hsystem::find($id);
        $this->validate($request,[
            "name"=>"required",
        ],
        [
            'state.required' => 'برجاء كتابة النص',
        ]);
        $hsystem->name=$request->name;
        $hsystem->save();
        return redirect()->route('admin.hsystem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hsystem=hsystem::find($id);
        $hsystem->destroy($id);
        return redirect()->route('admin.hsystem');
    }
}
