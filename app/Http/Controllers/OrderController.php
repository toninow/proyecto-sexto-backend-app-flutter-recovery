<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$orders = Order::all();
		foreach($orders as $order){
			$order->product;
			$order->user;
		}
		
		return view('order.index' , compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
	
	public function orderDetail($orderDetailId)
    {
        //
		$orderDetail = OrderDetail::find($orderDetailId);
		$orderDetail->status = 'approved';
		
		$orderDetailList = OrderDetail::where('order_id' , $orderDetail->order_id)->get();
		
		$orderDetailListCounter = count($orderDetailList);
		
		if($orderDetail->save()){
			
			$approvedOrderDetailList = OrderDetail::where('order_id' , $orderDetail->order_id)->where('status','approved')->get();
		
			$approvedOrderDetailListCounter = count($approvedOrderDetailList);
			
			if($orderDetailListCounter == $approvedOrderDetailListCounter){
				$order = Order::find($orderDetail->order_id);
				$order->status = 'approved';
				$order->save();
			}
			
			return redirect()->back()->with('success' , 'Approved successfully');
			
		}
		//$orderDetail->save();
    }
	
	public function approveOrder($orderId){
		$order = Order::find($orderId);
		$order->status = 'approved';
		if($order->save()){
				
				OrderDetail::where('order_id',$orderId)->update(['status' =>'approved']);
				return redirect()->back()->with('success' , 'Order approved successfully!');
			
		}
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        //
		$orderDetails = OrderDetail::where('order_id' , $orderId)->get();
		return view('order.order-detail' , compact('orderDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
