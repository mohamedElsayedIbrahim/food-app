<?php

namespace App\Http\Controllers;

use App\Models\order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):object
    {
        
        $validation = Validator::make($request->all(),[
            'products'=>'required',
            'products:*'=>'exists:prdoucts,id',
            'quentity'=>'required',
            'quentity:*'=>'integer'
        ]);

        if ($validation->fails()) {
            # code...
            return $this->sendError($validation->errors(),'error');
        }

        $user = $request->user();
        
        dd($user->customer);
        $order = Order::create([
            'customer_id'=>$user->customer->id,
            'payment_status'=>0,
            'order_date'=>Carbon::now()
            ]);

            $data = [];

            for ($i=0; $i < count($request->products); $i++) { 
                array_push($data,[$request->products[$i]=>['quantity'=>$request->quentity[$i]]]);
            }
            dd($data);
            $order->products()->sync($data);
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError(['message'=>$th->getMessage()],'error');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
