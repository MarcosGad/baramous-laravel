<?php

namespace baramous\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Validator;
use baramous\User;
use yajra\Datatables\Datatables;
use baramous\massage;

class DateRangeController extends Controller
{

  public function __construct(){
    $this->middleware('admin');
  }

    function index()
    {
     return view('admin.date_range');
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
         
      if($request->birth_day != '' && $request->birth_month != '' && $request->birth_year != '')
      {
       $data = DB::table('users')
       ->Where(DB::raw("CONCAT(`birth_day`,'0','0',' ')"), $request->birth_day . $request->birth_month . $request->birth_year . $request->user_name)
       ->orWhere(DB::raw("CONCAT('0',`birth_month`,'0',' ')"), $request->birth_day . $request->birth_month . $request->birth_year . $request->user_name)
       ->orWhere(DB::raw("CONCAT('0','0',`birth_year`,' ')"), $request->birth_day . $request->birth_month . $request->birth_year . $request->user_name)
       ->orWhere(DB::raw("CONCAT('0',`birth_month`,`birth_year`,' ')"), $request->birth_day . $request->birth_month . $request->birth_year . $request->user_name)
       ->orWhere(DB::raw("CONCAT(`birth_day`,`birth_month`,'0',' ')"), $request->birth_day . $request->birth_month . $request->birth_year . $request->user_name)
       ->orWhere(DB::raw("CONCAT(`birth_day`,`birth_month`,`birth_year`,' ')"), $request->birth_day . $request->birth_month . $request->birth_year . $request->user_name)
       ->orWhere(DB::raw("CONCAT('0','0','0',`name`)"), 'LIKE',$request->birth_day . $request->birth_month . $request->birth_year .  "%{$request->user_name}%") 
       ->orWhere(DB::raw("CONCAT(`birth_day`,'0','0',`name`)"), 'LIKE',$request->birth_day . $request->birth_month . $request->birth_year .  "%{$request->user_name}%")
       ->orWhere(DB::raw("CONCAT('0',`birth_month`,'0',`name`)"), 'LIKE',$request->birth_day . $request->birth_month . $request->birth_year .  "%{$request->user_name}%")
       ->orWhere(DB::raw("CONCAT('0','0',`birth_year`,`name`)"), 'LIKE',$request->birth_day . $request->birth_month . $request->birth_year .  "%{$request->user_name}%")
       ->orWhere(DB::raw("CONCAT(`birth_day`,`birth_month`,'0',`name`)"), 'LIKE',$request->birth_day . $request->birth_month . $request->birth_year .  "%{$request->user_name}%")
       ->orWhere(DB::raw("CONCAT('0',`birth_month`,`birth_year`,`name`)"), 'LIKE',$request->birth_day . $request->birth_month . $request->birth_year .  "%{$request->user_name}%")
       ->orWhere(DB::raw("CONCAT(`birth_day`,`birth_month`,`birth_year`,`name`)"), 'LIKE',$request->birth_day . $request->birth_month . $request->birth_year .  "%{$request->user_name}%")
       ->get();
      }
      else
      {
      $data = DB::table('users')->get();
      }
      echo json_encode($data);
     }
    }


    
    function postdata(Request $request)
    {
        $validation = Validator::make($request->all(), [
           'title'  => 'required', 
           'message'  => 'required', 
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails())
        {
            foreach($validation->messages()->getMessages() as $field_name => $messages)
            {
                $error_array[] = $messages;
            }
        }
        else
        {
            $models = request("models");
            if($request->get('button_action') == "insert")
            {  
                    foreach($models as $model){
                        $model = User::find($model);

                        $token_notification = $model->token_notification;       
                        $url = "https://fcm.googleapis.com/fcm/send";
                        $api_key = "AAAAUqc6rcw:APA91bEbKXsMbgkQWJQhMnwBXQbMmN2uTO7hxR-rze_gen0gP_vPK4955XjkCyCDZ6yFhGRZwIdx3GMaBZNoFJ8xDp66Z3ooyA8NndukuK5VttSTLolYrQKvgEJyMzEY_EGbWQCVTlA4";

                            $headers = array
                            (
                                'Authorization: key='.$api_key,
                                'Content-Type: application/json;charset=UTF-8'
                            );
                        
                            $data = array
                            (
                            'notification' =>
                            array (
                                "title" =>  request("title"),
                                "body" =>  strip_tags(preg_replace('/\s+/', ' ', str_replace('&nbsp;',"", request("message")))),
                                "sound" => "default",
                                "click_action" => "FCM_PLUGIN_ACTIVITY",
                                "icon" => "fcm_push_icon"
                            ),
                            "to" => $token_notification,
                            "priority" => "high"
                            );
                    
                            $content = json_encode($data);
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_HEADER, false);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($curl, CURLOPT_POST, true);
                            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
                            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false );
                            $result = curl_exec($curl);
                            curl_close($curl);
                            $arr = array();
                            $arr = json_decode($result,true);
                        
                        $massage = massage::create([
                            'user_id'=> $model->id,
                            "title" =>  request("title"),    
                            "massage" =>  request("message"),    
                        ]);                                              
                    }
                    
            }

        }
        $output = array(
            'error'     =>  $error_array,
            'success'   =>  $success_output
        );
        echo json_encode($output);
    }
}
