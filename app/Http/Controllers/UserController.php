<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    function login(Request $request) : object {
        $validation = Validator::make($request->all(),[
            'email'=>'required|exists:users,email',
            'password'=>'required',
        ]);

        if ($validation->fails()) {
            # code...
            return $this->sendError($validation->errors(),'error');
        }

        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // The user is being remembered...
                $user = [
                    'name'=>Auth::user()->name,
                    'email'=>Auth::user()->email,
                    'token'=>Auth::user()->createToken('APPFOODIGSR')->accessToken
                ];
    
                return $this->sendsuccess($user);
            }
    
            return $this->sendError(['message'=>'can\'t find user']);
        } catch (\Throwable $th) {
            return $this->sendError(["message"=>$th->getMessage()]);
        }

    }

    function signup(Request $request) : object {
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ]);

        if ($validation->fails()) {
            # code...
            return $this->sendError($validation->errors(),'error');
        }

        try {
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            
            Customer::create([
                'user_id'=>$user->id,
                'customer_address'=>$request->address,
                'customer_phone'=>$request->phone,
                'customer_prefrences'=>$request->customer_prefrences
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(['message'=>$th->getMessage()],'error');
        }
    }
}
