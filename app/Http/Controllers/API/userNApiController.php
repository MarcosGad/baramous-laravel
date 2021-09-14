<?php


namespace baramous\Http\Controllers\API;


use Illuminate\Http\Request;
use baramous\Http\Controllers\API\BaseController as BaseController;
use Validator;
use Auth;
use baramous\Profile;
use baramous\user;
use Illuminate\Support\Facades\Hash;


class userNApiController extends BaseController
{
    
    public function index()
    {
        $user = Auth::user();
        return $this->sendResponse($user->toArray(), 'userN retrieved successfully.');
    }
    
      public function update(Request $request, user $user)
    {
 
        
        $user = Auth::user();
        if($user) {
            $user->token_notification = $request->token_notification;
            $user->save();
        }

        return $this->sendResponse($user->toArray(), 'userN updated successfully.');
    }

}


