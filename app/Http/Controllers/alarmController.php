<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\alarm;
class alarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alarm')->with('alarms',alarm::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createalarm')->with('alarms',alarm::all());
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

        $alarm = alarm::create([
            "name" => $request->name,    
        ],
        [
            'name.required' => 'برجاء كتابة التنبيه',
        ]);
        return redirect()->route('admin.alarm');
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
        $alarm=alarm::find($id);
        return view('admin.editalarm')->with('alarm',$alarm);
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
        $alarm=alarm::find($id);
        $this->validate($request,[
            "name"=>"required",
        ],
        [
            'name.required' => 'برجاء كتابة التنبيه',
        ]);
        $alarm->name=$request->name;
        $alarm->save();
        return redirect()->route('admin.alarm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alarm=alarm::find($id);
        $alarm->destroy($id);
        return redirect()->route('admin.alarm');
    }
}
