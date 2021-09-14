<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\homepage;
use baramous\downloood;

class homepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('downlooods')->with('downs',downloood::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createhomepage');
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

        $homepage = homepage::create([
            "title" => $request->title,
            "description" => $request->description,     
        ]);
        return redirect()->route('admin.homepage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.homepage')->with('homepages',homepage::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homepage=homepage::find($id);
        return view('admin.edithomepage')->with('homepage',$homepage);
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
        $homepage=homepage::find($id);
        $this->validate($request,[
            "title"=>"required",
            "description"=>"required",
        ],[
            'title.required' => 'برجاء كتابة العنوان',
            'description.required' => 'برجاء كتابة النص',
        ]);
        $homepage->title=$request->title;
        $homepage->description=$request->description;
        $homepage->save();
        return redirect()->route('admin.homepage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homepage=homepage::find($id);
        $homepage->destroy($id);
        return redirect()->route('admin.homepage');
    }
}
