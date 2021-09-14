<?php


namespace baramous\Http\Controllers\API;


use Illuminate\Http\Request;
use baramous\Http\Controllers\API\BaseController as BaseController;
use baramous\hagz;
use Validator;
use Auth;


class HagzApiController extends BaseController
{
    
    public function index()
    {
        $hagz =  hagz::all()->where('user_id','=',Auth::id())->where('show_user','=',0);
        return $this->sendResponse($hagz->toArray(), 'Hagz retrieved successfully.');
    }

    public function store(Request $request)
    {
        $validator = $this->validate($request,[
            "date_of_hagz"=>'required|date_format:Y-m-d',
            "per_number"=>"numeric|min:0|max:3",
            'note' => 'nullable|string'
        ]);

        $hagz = hagz::create([
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
            "date_of_hagz"  => $request->date_of_hagz,
            "per_number"    => $request->per_number,
            "note"          => $request->note,
            "state"         => 'تم الحجز من فضلك انتظر الرد سواء بالموافقة أو الرفض',
            "user_id" => Auth::id()        
                
        ]);


        return $this->sendResponse($hagz->toArray(), 'Hagz created successfully.');
    }

    public function destroy(hagz $hagz)
    {
        $hagz->delete();

        return $this->sendResponse($hagz->toArray(), 'Product deleted successfully.');
    }

}


