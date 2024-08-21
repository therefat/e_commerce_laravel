<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function responseWithSuccess($data,$message){
        return response()->json([
            'success'=> true,
            'data'=>$data,
            'message'=>$message
        ]);
    }
    public function responseWithError($message){
        return response()->json([
            'success'=>false,
            'data'=>[],
            'message'=> $message
        ]);
    }
}
