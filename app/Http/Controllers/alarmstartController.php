<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\alarmstart;
class alarmstartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alarmstart')->with('alarmstarts',alarmstart::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createalarmstart')->with('alarmstarts',alarmstart::all());
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
        ]);

        $alarmstart = alarmstart::create([
            "name" => $request->name,    
        ],
        [
            'name.required' => 'برجاء كتابة التنبيه',
        ]);
        return redirect()->route('admin.alarmstart');
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
        $alarmstart=alarmstart::find($id);
        return view('admin.editalarmstart')->with('alarmstart',$alarmstart);
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
        $alarmstart=alarmstart::find($id);
        $this->validate($request,[
            "name"=>"required",
        ],
        [
            'name.required' => 'برجاء كتابة التنبيه',
        ]);
        $alarmstart->name=$request->name;
        $alarmstart->save();
        return redirect()->route('admin.alarmstart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alarmstart=alarmstart::find($id);
        $alarmstart->destroy($id);
        return redirect()->route('admin.alarmstart');
    }
}
