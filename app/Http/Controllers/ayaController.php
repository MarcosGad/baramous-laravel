<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use baramous\aya;

class ayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */  
    public function index()
    {
        return view('admin.aya')->with('ayas',aya::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createaya')->with('ayas',aya::all());

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

        $aya = aya::create([
            "name" => $request->name,    
        ]);
        return redirect()->route('admin.aya');

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
        $aya=aya::find($id);
        return view('admin.editaya')->with('aya',$aya);
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
        $aya=aya::find($id);
        $this->validate($request,[
            "name"=>"required",
        ],
        [
            'state.required' => 'برجاء كتابة الاية',
        ]);
        $aya->name=$request->name;
        $aya->save();
        return redirect()->route('admin.aya');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aya=aya::find($id);
        $aya->destroy($id);
        return redirect()->route('admin.aya');
    }
}
