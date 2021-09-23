<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Value;
class KhojController extends Controller
{
    public function process(Request $request){
        $value=new Value();
        $input=strip_tags($request->inputstring);
        $value->user_id=Auth::id();
        $value->values=$input;
        $value->save();
        $arr=explode(',',$input);
        $status= in_array($request->search,$arr);
        return response()->json(['success'=>'Data is successfully added',
                                'request'=>$status,
                               ]);
    }
}
