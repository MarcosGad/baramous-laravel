<?php


namespace baramous\Http\Controllers\API;


use Illuminate\Http\Request;
use baramous\Http\Controllers\API\BaseController as BaseController;
use baramous\User;
use Illuminate\Support\Facades\Auth;
use Validator;


class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
            'password' => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;


        return $this->sendResponse($success, 'User register successfully.');
    }
}