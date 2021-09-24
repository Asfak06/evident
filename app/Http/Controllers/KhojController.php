<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Value;
class KhojController extends Controller
{
    public function process(Request $request){

        $arr=explode(',',$request->inputstring);
        foreach($arr as $a){
            if(!is_numeric($a)){
                return response()->json(['invalid'=>'type comma seperated numbers , no spaces',
                                       ]);                
            }
        }    

        $value=new Value();
        $input=strip_tags($request->inputstring);
        $value->user_id=Auth::id();
        $value->values=$input;
        $value->save();

        $status= in_array($request->search,$arr);
        return response()->json(['success'=>'Data is successfully added',
                                'request'=>$status,
                               ]);
    }
}
