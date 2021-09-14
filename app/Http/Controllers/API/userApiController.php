<?php


namespace baramous\Http\Controllers\API;


use Illuminate\Http\Request;
use baramous\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Auth;
use baramous\Profile;
use baramous\user;
use Illuminate\Support\Facades\Hash;


class userApiController extends BaseController
{
    
    public function index()
    {
        $user = Auth::user();
        return $this->sendResponse($user->toArray(), 'user retrieved successfully.');
    }
    
      public function update(Request $request, user $user)
    {
        $user = Auth::user();

        $validator = $this->validate($request,[
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
        ]);

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
        $user->password = bcrypt($request->password);
        
        $user->save();

        return $this->sendResponse($user->toArray(), '$user updated successfully.');
    }

}


