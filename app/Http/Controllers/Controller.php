<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function sendError(array|object $data ,string $message = 'error', Int $code= 404 ) : object {
        return response()->json(['data'=>$data,'status'=>$message],$code);
    }

    function sendsuccess(array|object $data ,string $message = 'success') : object {
        return response()->json(['data'=>$data,'status'=>$message],200);
    }
}
