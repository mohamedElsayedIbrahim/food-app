<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    function sendError(array|object $data ,string $message = 'error', Int $code= 404 ) : object {
        return response()->json(['data'=>$data,'status'=>$message],$code);
    }

    function sendsuccess(array|object $data ,string $message = 'success') : object {
        return response()->json(['data'=>$data,'status'=>$message],200);
    }
}
