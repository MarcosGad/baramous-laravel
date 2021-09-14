<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\pagestart;
class pagestartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagestart')->with('pagestarts',pagestart::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createpagestart');
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
            "description"=>"required",
        ],
        [
            'title.required' => 'برجاء كتابة العنوان',
            'description.required' => 'برجاء كتابة النص',
        ]);

        $pagestart = pagestart::create([
            "title" => $request->title,
            "description" => $request->description,     
        ]);
        return redirect()->route('admin.pagestart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.pagestart')->with('pagestarts',pagestart::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagestart=pagestart::find($id);
        return view('admin.editpagestart')->with('pagestart',$pagestart);
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
        $pagestart=pagestart::find($id);
        $this->validate($request,[
            "title"=>"required",
            "description"=>"required",
        ],[
            'title.required' => 'برجاء كتابة العنوان',
            'description.required' => 'برجاء كتابة النص',
        ]);
        $pagestart->title=$request->title;
        $pagestart->description=$request->description;
        $pagestart->save();
        return redirect()->route('admin.pagestart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pagestart=pagestart::find($id);
        $pagestart->destroy($id);
        return redirect()->route('admin.pagestart');
    }
}
