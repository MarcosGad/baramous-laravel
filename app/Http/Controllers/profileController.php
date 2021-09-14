<?php

namespace baramous\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use baramous\Profile;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('profile')->with('user',Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {

        $this->validate($request, [
            
            "name"    => 'required|string|max:255',
            "email"  => 'required|string|email|max:255',
            "birth_day"  => 'required',
            "birth_month"  => 'required',
            "birth_year"  => 'required',
            "phone_number"  => 'required|string|max:11',
            "city"=>"required",
            "church"=>"required",
            "father"=>"required",
            "work"=>"required",

        ],
        [
            'name.required' => 'برجاء كتابة اسمك',
            'email.required' => 'برجاء كتابة البريد الألكترونى',
            'email.email' => 'برجاء كتابة البريد الألكترونى بشكل صحيح',
            'phone_number.required' => 'برجاء كتابة رقم المحمول',
            'phone_number.max' => 'برجاء كتابة رقم المحمول بشكل صحيح',
            'password.min' => 'برجاء كتابة كلمة السر ليست اقل من 6 أحرف',
            'city.required' => 'برجاء كتابة اسم المحافظة',
            'church.required' => 'برجاء كتابة اسم الكنيسة التابع له',
            'father.required' => 'برجاء كتابة اسم اب الأعتراف',
            'work.required' => 'برجاء كتابة الدراسة او العمل',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->birth_day = $request->birth_day;
        $user->birth_month = $request->birth_month;
        $user->birth_year = $request->birth_year;
        $user->phone_number = $request->phone_number;
        $user->city = $request->city;
        $user->church = $request->church;
        $user->father = $request->father;
        $user->work = $request->work;

        $user->save();
       
    if ($request->has('password')) {
        
        if (Hash::check($request->password , $user->password)) { 
            
           $user->fill([
            'password' => bcrypt($request->new_password)
            ])->save();
        
        } else {
            //return redirect()->back()->with('message', 'تأكد من كلمة السر القديمة');      
        }

    }
    return redirect()->back()->with('message', 'تم تعديل البيانات بنجاح');          
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



