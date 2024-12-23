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
                // $user = [
                //     'first_name'=>Auth::user()->name,
                //     'email'=>Auth::user()->email,
                //     'token'=>Auth::user()->createToken('FOODAPPIGSR')->accessToken
                // ];
    
                return $this->sendsuccess($user);
            }
    
            return $this->sendError(['message'=>'can\'t find user']);
        } catch (\Throwable $th) {
            return $this->sendError(["message"=>$th->getMessage()]);
        }

    }

    function signup(Request $request) : object {
        $validation = Validator::make($request->all(),[
            'first_name'=>'required',
            'last_name'=>'required',
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
                'last_name'=>$request->last_name,
                'first_name'=>$request->first_name,
                'role'=>'customer',
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            
            Customer::create([
                'user_id'=>$user->id,
                'customer_address'=>$request->address,
                'customer_phone'=>$request->phone,
                'customer_prefrences'=>$request->customer_prefrences
            ]);
            return $this->sendsuccess(['message'=>'User has been registered'],'success');

        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(['message'=>$th->getMessage()],'error');
        }
    }

    function logout(Request $request) : object {
        try {
            //code...
            $token = Auth::guard('api')->user()->token();
            $token->revoke();
            return $this->sendsuccess(['message'=>'logged out successfully'],'success');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(['message'=>$th->getMessage()],'error');
        }
    }
}
