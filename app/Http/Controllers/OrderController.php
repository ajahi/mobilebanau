<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $user = Auth::user();
        
        if ($user->role(['admin'])){
            return view('cms.orderindex',[
                'posts'=>Order::orderBy('id','DESC')->get()
                
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
        return view('layouts.frontend');
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
         
            'address'=>['required']

        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors() , 422);
        }

        $order=Order::create($request->all());
        return redirect()->back()->with('success','You have successfully requested a order.');
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
            return view('cms.ordershow',[
                'order'=>Order::findOrFail($id),
                'rider'=>User::role('rider')->get()
            ]);
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
        $order=Order::findOrFail($id);
        if ($user->role('admin') && $order->status!=='canceled'){
            $validation = Validator::make($request->all(), [
                'problem'=>['required'],
                'price'=>['required','numeric'],
                'rider'=>['required','numeric']
            ]);
            if ($validation->fails()) {
                return response()->json($validation->errors(),422);
            }
            
            $order->status='confirmed';
            $order->problem=$request->problem;
            $order->cost=$request->price;
            $order->assigned_to=$request->rider;
            $order->save();
            return redirect('/orderindex')->with('success','You have successfully updated a order');
        }else{
            $return = ["status" => "error",
                "error" => [
                    "code" => 403,
                    "errors" => 'Forbidden'
                ]];
            return redirect('/orderindex')->with('warning','If Order is already canceled you cannot update it');
        }
        
    }
    public function cancelorder($id){
        $user=Auth::user();
        if ($user->role(['admin','customer_care'])){
            $order=Order::findOrFail($id);
            $order->status='canceled';
            $order->save();
            return redirect('/orderindex')->with('warning','You have successfully cancelled a order');
        }$return = ["status" => "error",
                "error" => [
                    "code" => 403,
                    "errors" => 'Forbidden'
                ]];
            return response()->json($return, 403);
    }
    public function pickorder($id){
        $user=Auth::user();
        if ($user->role(['admin','rider'])){
            
            $order=Order::findOrFail($id);
            if($order->status=='confirmed'){
                $order->status='picked';
                $order->save();
            }else{
                return redirect()->back()->with('alert','Order cannot be picked');
            }
        }return redirect('mechanic')->with('success','You have picked a order successfully');
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
