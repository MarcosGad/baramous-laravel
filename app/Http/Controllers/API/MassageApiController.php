<?php


namespace baramous\Http\Controllers\API;


use Illuminate\Http\Request;
use baramous\Http\Controllers\API\BaseController as BaseController;
use baramous\massage;
use Validator;
use Auth;


class MassageApiController extends BaseController
{
    
    public function index()
    {
        $massage =  massage::all()->where('user_id','=',Auth::id());
        return $this->sendResponse($massage->toArray(), 'Massage retrieved successfully.');
    }

    public function destroy(massage $massage)
    {
        $massage->delete();

        return $this->sendResponse($massage->toArray(), 'Massage deleted successfully.');
    }

}












