<?php

namespace baramous\Http\Controllers;
use baramous\hagz;
use baramous\note;
use baramous\massage;
use baramous\User;

use Illuminate\Http\Request;

class managehagzController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hagzs = hagz::where('hagz_state','=',NULL)->paginate(10);
      return view('admin.mangehagz', compact('hagzs'));   
    }

    public function note()
    {
        return view('admin.note')->with('notes',note::all());        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hagz=hagz::find($id);
        return view('admin.editstate')->with('states',$hagz);
    }

    public function editTwo($id)
    {
        $hagz=hagz::find($id);
        return view('admin.editstatetwo')->with('states',$hagz);
    }


       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hagz=hagz::find($id);
        $this->validate($request,[
            "state"=>"required",
        ],
        [
            'state.required' => 'برجاء كتابة الرسالة',
        ]);

        $token_notification = User::where('id',$hagz->user_id)->first()->token_notification;    
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
                "title" => 'الحجز',
                "body" =>  strip_tags(preg_replace('/\s+/', ' ', str_replace('&nbsp;',"", $request->state))),
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

        $hagz->state=$request->state;
        $hagz->hagz_state = 1;
        $hagz->save();
        return redirect()->route('admin.showhagz');        
    }

    public function updateTwo(Request $request, $id)
    {
        $hagz=hagz::find($id);
        $this->validate($request,[
            "state"=>"required",
        ],
        [
            'state.required' => 'برجاء كتابة الرسالة',
        ]);

        $token_notification = User::where('id',$hagz->user_id)->first()->token_notification;    
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
                "title" => 'الحجز',
                "body" =>  strip_tags(preg_replace('/\s+/', ' ', str_replace('&nbsp;',"", $request->state))),
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
            
        $hagz->state=$request->state;
        $hagz->hagz_state = 0;
        $hagz->save();
        return redirect()->route('admin.showhagztwo');
    }


    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
 
 
        $hagzs = hagz::where('hagz_state','=','1')->where('show_admin','=','0')->paginate(10);
        
        $per_number = hagz::all()->where('hagz_state','=','1')->where('show_admin','=','0')->sum('per_number');
        
        return view('admin.showhagz', compact('hagzs','per_number'));  
        
         
    }

    public function showTwo()
    {
        $hagzs = hagz::where('hagz_state','=','0')->where('show_admin','=','0')->paginate(10);
        
        $per_number = hagz::all()->where('hagz_state','=','0')->where('show_admin','=','0')->sum('per_number');
        
        return view('admin.showhagztwo', compact('hagzs','per_number'));  
    }

    public function notshowadmin($id)
    {
        $hagz = hagz::find($id); 
        $hagz->show_admin = 1; 
        $hagz->save(); 
        return redirect()->route('admin.showhagz');
    }

    public function notshowadmintwo($id)
    {
        $hagz = hagz::find($id); 
        $hagz->show_admin = 1; 
        $hagz->save(); 
        return redirect()->route('admin.showhagztwo');
    }

    public function destroy($id)
    {
        $note=note::find($id);
        $note->destroy($id);
        return redirect()->route('admin.note');
    }

    public function createmassage($email)
    {
        $id = User::where('email',$email)->first()->id;
        return view('admin.createmassage')->with('id',$id);
    }

    public function postmassage(Request $request, $id)
    {
        $this->validate($request,[
            "title"=>"required",
            "massage"=>"required",
        ],
        [
            'title.required' => 'برجاء كتابة العنوان',
            'massage.required' => 'برجاء كتابة الرسالة',
        ]);

        $token_notification = User::where('id',$id)->first()->token_notification;       
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
                "title" => $request->title,
                "body" =>  strip_tags(preg_replace('/\s+/', ' ', str_replace('&nbsp;',"", $request->massage))),
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
           
         /*
            if ($arr === FALSE) {
                echo "Json invalido!"."<br>";
            } else if (empty($arr)) {
                echo "Json invalido!"."<br>";
            }else{
                if (array_key_exists ('message_id', $arr)){
                    echo "Mensagem enviada! <br>Mensagem id: ".$arr['message_id']."<br>";
                }else{
                    echo "Not Good";
                }
            }
          */

        $massage = massage::create([
            'user_id'=> $id,
            "title" => $request->title,
            "massage" => $request->massage,     
        ]);
        return redirect()->route('admin.note');        
    }
    
    //all user massage
    public function allUserMas()
    {
        return view('admin.allUserMas');
    }
    
    public function postAllUserMas(Request $request)
    {
        $this->validate($request,[
            "title"=>"required",
            "massage"=>"required",
        ],
        [
            'title.required' => 'برجاء كتابة العنوان',
            'massage.required' => 'برجاء كتابة الرسالة',
        ]);
        
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
                "title" => $request->title,
                "body" =>  strip_tags(preg_replace('/\s+/', ' ', str_replace('&nbsp;',"", $request->massage))),
                "sound" => "default",
                "click_action" => "FCM_PLUGIN_ACTIVITY",
                "icon" => "fcm_push_icon"
              ),
              "to" => '/topics/all',
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
                'user_id'=> null,
                "title" => $request->title,
                "massage" => $request->massage,     
            ]);
        
            return redirect()->route('admin.allUserMas')->with('message', 'تم الأرسال بنجاح');        
    }

}
