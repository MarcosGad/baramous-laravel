<?php


namespace baramous\Http\Controllers\API;


use Illuminate\Http\Request;
use baramous\Http\Controllers\API\BaseController as BaseController;
use baramous\note;
use Validator;
use Auth;


class NoteApiController extends BaseController
{
    
    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            'massage' => 'required|string'
        ]);

        $note = note::create([
            "name"          => Auth::user()->name,
            "email"         => Auth::user()->email,
            "church"        => Auth::user()->church,
            "phone_number"  => Auth::user()->phone_number,
            "father"        => Auth::user()->father,
            "birth_day"     => Auth::user()->birth_day,
            "birth_month"   => Auth::user()->birth_month,
            "birth_year"    => Auth::user()->birth_year,
            "city"          => Auth::user()->city,
            "work"          => Auth::user()->work,
            "massage"          => $request->massage,     
        ]);
        return $this->sendResponse($note->toArray(), 'Massage created successfully.');
    }

}


