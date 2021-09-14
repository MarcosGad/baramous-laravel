<?php

namespace baramous\Http\Controllers\Auth;

use baramous\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Carbon\Carbon;
use baramous\User;
use Illuminate\Support\Facades\Password;


class ResetPasswordApiController extends Controller
{
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'We cant find a user with that e-mail address.'
            ], 404);
        $token = Password::getRepository()->create($user);
        $user->sendPasswordResetNotification($token);    
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
            
    }
}
