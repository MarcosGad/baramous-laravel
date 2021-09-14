<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\post;
class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post')->with('posts',post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createpost');
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

        $post = post::create([
            "title" => $request->title,
            "description" => $request->description,     
        ]);
        return redirect()->route('admin.post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.post')->with('posts',post::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=post::find($id);
        return view('admin.editpost')->with('post',$post);
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
        $post=post::find($id);
        $this->validate($request,[
            "title"=>"required",
            "description"=>"required",
        ],[
            'title.required' => 'برجاء كتابة العنوان',
            'description.required' => 'برجاء كتابة النص',
        ]);
        $post->title=$request->title;
        $post->description=$request->description;
        $post->save();
        return redirect()->route('admin.post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=post::find($id);
        $post->destroy($id);
        return redirect()->route('admin.post');
    }
}
