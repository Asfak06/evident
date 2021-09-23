<?php

namespace App\Http\Controllers\Api;
use \stdClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Value;

class UserValues extends Controller
{
    public function __construct()
    {
        auth()->setDefaultDriver('api');
       $this->middleware('auth:api');        
    }    
    public function userValue(){
        $values=Value::where('user_id',Auth::id())->select('created_at','values')->get();
        
        $payload=[];
        
        foreach($values as $tmp){
            $obj=new stdClass();
            $obj->timestamp=$tmp->created_at;
            $obj->input_values=$tmp->values;
            array_push($payload, $obj);
        }

        return response()->json([
            "status"=>'success',
            "user_id"=>Auth::id(),
            "payload"=>$payload
        ]);        
    }
}
