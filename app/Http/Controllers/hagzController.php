<?php

namespace baramous\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use baramous\hagz;
use baramous\dayof;



class hagzController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hagz')->with('name',Auth::user()->name)
                            ->with('email',Auth::user()->email)
                            ->with('phone_number',Auth::user()->phone_number)
                            ->with('birth_day',Auth::user()->birth_day)
                            ->with('birth_month',Auth::user()->birth_month)
                            ->with('birth_year',Auth::user()->birth_year)
                            ->with('city',Auth::user()->city)
                            ->with('church',Auth::user()->church)
                            ->with('father',Auth::user()->father)
                            ->with('work',Auth::user()->work)
                            ->with('day_ofs',DB::select('select * from dayofs order by id DESC limit 1'));
                           
                            
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
            "email"=>'required|string|email|max:255',
            "church"=>"required",
            "phone_number"=>'required|string|max:11',
            "father"=>"required",
            "birth_day"=>"required",
            "birth_month"=>"required",
            "birth_year"=>"required",
            "city"=>"required",
            "work"=>"required",
            "date_of_hagz"=>'required|date_format:Y-m-d',
            "per_number"=>"numeric|min:0|max:3",
            'note' => 'nullable|string',

            
        ],
        [
            'church.required' => 'برجاء كتابة اسم الكنيسة التابع له',
            'father.required' => 'برجاء كتابة اسم اب الأعتراف',
            'work.required' => 'برجاء كتابة الدراسة او العمل',
            'work.required' => 'برجاء كتابة اسم المحافظة',
            'date_of_hagz.required' => 'برجاء كتابة تاريخ الخلوة',
            'per_number.required' => 'برجاء كتابة عدد الأفراد',
            'per_number.min' => 'برجاء كتابة عدد الأفراد بشكل صحيح',
            'per_number.max' => 'اقصى عدد للقادمين معك اثنان من الأفراد',
        ]);

        $hagz = hagz::create([
            "name"          => $request->name,
            "email"         => $request->email,
            "church"        => $request->church,
            "phone_number"  => $request->phone_number,
            "father"        => $request->father,
            "birth_day"     => $request->birth_day,
            "birth_month"   => $request->birth_month,
            "birth_year"    => $request->birth_year,
            "city"          => $request->city,
            "work"          => $request->work,
            "date_of_hagz"  => $request->date_of_hagz,
            "per_number"    => $request->per_number,
            "note"          => $request->note,
            "state"          => $request->state,
            "user_id" => Auth::id()

            
        ]);
        return redirect()->back()->with('message', 'تم الحجز بنجاح');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
