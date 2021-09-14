<?php

namespace baramous\Http\Controllers\Auth;

use baramous\User;
use baramous\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            "birth_day"=>"numeric|required",
            "birth_month"=>"numeric|required",
            "birth_year"=>"numeric|required",
            "city"=>"required",
            'phone_number' => 'required|string|max:11',
            "church"=>"required",
            "father"=>"required",
            "work"=>"required",
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'برجاء كتابة اسمك',
            'email.required' => 'برجاء كتابة البريد الألكترونى',
            'email.email' => 'برجاء كتابة البريد الألكترونى بشكل صحيح',
            'phone_number.required' => 'برجاء كتابة رقم المحمول',
            'birth_day.numeric' => 'برجاء كتابة اليوم',
            'birth_month.numeric' => 'برجاء كتابة الشهر',
            'birth_year.numeric' => 'برجاء كتابة السنة',
            'city.required' => 'برجاء كتابة اسم المحافظة',
            'phone_number.max' => 'برجاء كتابة رقم المحمول بشكل صحيح',
            'church.required' => 'برجاء كتابة اسم الكنيسة التابع له',
            'father.required' => 'برجاء كتابة اسم اب الأعتراف',
            'work.required' => 'برجاء كتابة الدراسة او العمل',
            'password.required' => 'برجاء كتابة كلمة السر',
            'password.min' => 'برجاء كتابة كلمة السر ليست اقل من 6 أحرف',
            'password.confirmed' => 'برجاء التأكد من كتابة كلمة المرور بطريقة صحيحة',
       ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \baramous\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'], 
            'birth_day' => $data['birth_day'], 
            'birth_month' => $data['birth_month'], 
            'birth_year' => $data['birth_year'],
            'city'  => $data['city'],             
            'phone_number'  => $data['phone_number'],
            "church"        => $data['church'],
            "father"        => $data['father'],
            "work"          => $data['work'],
            'password' => Hash::make($data['password']),
            
        ]);
    }
}
