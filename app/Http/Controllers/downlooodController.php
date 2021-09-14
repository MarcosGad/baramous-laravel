<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use baramous\downloood;
class downlooodController extends Controller

{
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createdownlooods');
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
            "titlebtn"=>"required",
            "filename"=>"required|mimes:pdf",
        ],[
            'title.required' => 'برجاء كتابة العنوان',
            'titlebtn.required' => 'برجاء كتابة عنوان المفتاح',
            'filename.required' => 'برجاء ادراج الملف',
            'filename.mimes' => 'نوع الملف PDF',
       ]);

        $filename = $request->filename; 
        $filename_new_name = time().$filename->getClientOriginalName(); 
        $filename->move('uploads/',$filename_new_name); 
         

        $downloood = downloood::create([
            "title"      => $request->title,
            "titlebtn"    => $request->titlebtn,
            "filename"   => 'uploads/'.$filename_new_name,
        ]);
        return redirect()->route('admin.downlooods');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.downlooods')->with('downs',downloood::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $downloood=downloood::find($id);
        return view('admin.editdownlooods')->with('down',$downloood);
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
        $downloood=downloood::find($id);
        $this->validate($request,[
            "title"=>"required",
            "titlebtn"=>"required",
            "filename"=>"required|mimes:pdf",
        ],[
            'title.required' => 'برجاء كتابة العنوان',
            'titlebtn.required' => 'برجاء كتابة عنوان المفتاح',
            'filename.required' => 'برجاء ادراج الملف',
            'filename.mimes' => 'نوع الملف PDF',
       ]);
        if($request->hasFile('filename')){
         
            $filename = $request->filename; 
            $filename_new_name = time().$filename->getClientOriginalName(); 
            $filename->move('uploads/',$filename_new_name);

            $downloood->filename = 'uploads/'.$filename_new_name;   
        }
        $downloood->title=$request->title;
        $downloood->titlebtn=$request->titlebtn;
        $downloood->save();
        return redirect()->route('admin.downlooods');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $downloood=downloood::find($id);
        $downloood->destroy($id);
        return redirect()->route('admin.downlooods');
    }
}
