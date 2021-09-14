<?php

namespace baramous\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use baramous\dayof;

class dayofController extends Controller
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
        return view('admin.dayof')->with('dayofs',DB::select('select * from dayofs order by id DESC limit 1'));
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
            "day_of_one"=>"",
            "day_of_two"=>"",
            "day_of_three"=>"",
            "day_of_four"=>"",
            "day_of_five"=>"",

            "day_of_six"=>"",
            "day_of_seven"=>"",

            "day_of_from_one"=>"",
            "day_of_to_one"=>"",
            "day_of_from_two"=>"",
            "day_of_to_two"=>"",
            "day_of_from_three"=>"",
            "day_of_to_three"=>"",
            "day_of_from_four"=>"",
            "day_of_to_four"=>"",
            "day_of_from_five"=>"",
            "day_of_to_five"=>"",

            "day_of_from_six"=>"",
            "day_of_to_six"=>"",
            "day_of_from_seven"=>"",
            "day_of_to_seven"=>"",
            
        ]);

        $dayof = dayof::create([
            "day_of_one" => $request->day_of_one,
            "day_of_two" => $request->day_of_two,
            "day_of_three" => $request->day_of_three,
            "day_of_four" => $request->day_of_four,
            "day_of_five" => $request->day_of_five,

            "day_of_six" => $request->day_of_six,
            "day_of_seven" => $request->day_of_seven,

            "day_of_from_one" => $request->day_of_from_one,
            "day_of_to_one" => $request->day_of_to_one,
            "day_of_from_two" => $request->day_of_from_two,
            "day_of_to_two" => $request->day_of_to_two,
            "day_of_from_three" => $request->day_of_from_three,
            "day_of_to_three" => $request->day_of_to_three,
            "day_of_from_four" => $request->day_of_from_four,
            "day_of_to_four" => $request->day_of_to_four,
            "day_of_from_five" => $request->day_of_from_five,
            "day_of_to_five" => $request->day_of_to_five,

            "day_of_from_six" => $request->day_of_from_six,
            "day_of_to_six" => $request->day_of_to_six,
            "day_of_from_seven" => $request->day_of_from_seven,
            "day_of_to_seven" => $request->day_of_to_seven,
        ]);
        return redirect()->back()->with('message', 'تم غلق اليوم بنجاح');
    }

}
