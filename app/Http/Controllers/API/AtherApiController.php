<?php


namespace baramous\Http\Controllers\API;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use baramous\Http\Controllers\API\BaseController as BaseController;
use baramous\homepage;
use baramous\hsystem;
use baramous\tablehgz;
use baramous\post;
use baramous\dayof;
use baramous\alarm;
use baramous\aya;
use baramous\downloood;
use Validator;
use Auth;


class AtherApiController extends BaseController
{
    
    public function homepage()
    {
        $homepage =  homepage::all();
        return $this->sendResponse($homepage->toArray(), 'Hagz retrieved successfully.');
    }

    public function hsystem()
    {
        $hsystem =  hsystem::all();
        return $this->sendResponse($hsystem->toArray(), 'hsystem retrieved successfully.');
    }

    public function tablehgz()
    {
        $tablehgz =  tablehgz::all();
        return $this->sendResponse($tablehgz->toArray(), 'tablehgz retrieved successfully.');
    }

    public function post()
    {
        $post =  post::all();
        return $this->sendResponse($post->toArray(), 'post retrieved successfully.');
    }
    
      public function dayof()
    {
        $dayof =  DB::select('select * from dayofs order by id DESC limit 1');
        return $this->sendResponse($dayof, 'dayof retrieved successfully.');
    }
    
      public function alarm()
    {
        $alarm =  DB::select('select name from alarms ORDER BY id DESC limit 1');
        return $this->sendResponse($alarm, 'alarm retrieved successfully.');
    }
    
      public function aya()
    {
        $aya =  DB::select('select name from ayas ORDER BY id DESC limit 1');
        return $this->sendResponse($aya, 'aya retrieved successfully.');
    }

    public function downloood()
    {
        $downloood =  downloood::all();
        return $this->sendResponse($downloood->toArray(), 'Downlooods retrieved successfully.');
    }

   
}
