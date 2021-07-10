<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user = Auth::user();
        if ($user->role(['admin'])){
            return view('orderindex',[
                'order'=>Order::orderBy('id','DESC')->get()
            ]);
        }else{
            $return = ["status" => "error",
                "error" => [
                    "code" => 403,
                    "errors" => 'Forbidden'
                ]];
            return response()->json($return, 403);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'=>['required'],
            'contact_number'=>'required|numeric|min:10',
            'problem'=>['required'],
            'address'=>['required']

        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors() , 422);
        }

        $order=Order::create($request->all());
        return redirect('/order');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if ($user->role(['admin'])){
            return view('order1st',['order'=>Order::findOrFail($id)]);
        }
        $return = ["status" => "error",
                "error" => [
                    "code" => 403,
                    "errors" => 'Forbidden'
                ]];
            return response()->json($return, 403);
    }
    public function updateorder(Request $request,$id){
        $user=Auth::user();
        if ($user->role('admin')){
            $validation = Validator::make($request->all(), [
                'status'=>['required','in:canceled,confirmed']
            ]);
            if ($validation->fails()) {
                return response()->json($validation->errors(),422);
            }
            $order=Order::findOrFail($id);
            $order->status=$request->status;
            $order->save();
            return redirect('/order')->with('success','You have successfully updated a order');
        }else{
            $return = ["status" => "error",
                "error" => [
                    "code" => 403,
                    "errors" => 'Forbidden'
                ]];
            return response()->json($return, 403);
        }
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
