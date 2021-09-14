<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\massage;
use Auth;
use DB;

class massageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $massages = DB::table('massages')->where('user_id', Auth::id())->orWhere('user_id',null)->get();
        return view('massages', compact('massages')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createmassage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $massage=massage::find($id);
        $massage->massage_state = 1; 
        $massage->save(); 
        return view('showmassages')->with('massage',$massage);
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $massage=massage::find($id);
        $massage->destroy($id);
        return redirect()->route('massages');
    }

}
