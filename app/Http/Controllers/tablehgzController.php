<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\tablehgz;
class tablehgzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tablehgz')->with('tablehgzs',tablehgz::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createtablehgz');
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
            "title"=>"required",
            "table"=>"required",
        ],
        [
            'title.required' => 'برجاء كتابة العنوان',
            'table.required' => 'برجاء كتابة النص',
        ]);

        $tablehgz = tablehgz::create([
            "title" => $request->title,
            "table" => $request->table,     
        ]);
        return redirect()->route('admin.tablehgz');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.tablehgz')->with('tablehgzs',tablehgz::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tablehgz=tablehgz::find($id);
        return view('admin.edittablehgz')->with('tablehgz',$tablehgz);
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
        $tablehgz=tablehgz::find($id);
        $this->validate($request,[
            "title"=>"required",
            "table"=>"required",
        ],[
            'title.required' => 'برجاء كتابة العنوان',
            'table.required' => 'برجاء كتابة النص',
        ]);
        $tablehgz->title=$request->title;
        $tablehgz->table=$request->table;
        $tablehgz->save();
        return redirect()->route('admin.tablehgz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tablehgz=tablehgz::find($id);
        $tablehgz->destroy($id);
        return redirect()->route('admin.tablehgz');
    }
}
