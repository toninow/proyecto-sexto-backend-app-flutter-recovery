<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makePayment(Request $request)
    {
		
		//return $cartItems = $request->input('cartItems');
		/**
		
		    $data = $request->input('cartItems');
            $cartItems = json_decode($data, true);
			
			//return $cartItems;
			
			//return response(['result' => $cartItems]);
            //$totalAmount = 0.0;
            foreach ($cartItems as $cartItem){
                $order = new Order();
                $order->order_date = Carbon::now()->toDateString();
                $order->product_id = $cartItem['productId'];
                $order->user_id = $request->input('userId');
                $order->quantity = $cartItem['productQuantity'];
                $order->amount = ($cartItem['productPrice'] - $cartItem['productDiscount']);
                $totalAmount+= $order->amount * $order->quantity;
                $order->save();
				
				
            }
			
			**/
			//return 0;
		/**
		
        \Stripe\Stripe::setApiKey('sk_test_mirrQ5hTnI8Ggpr6nsHiAY93');

        $token = \Stripe\Token::create([
            'card' => [
                'number' => $request->input('cardNumber'),
                'exp_month' => $request->input('expiryMonth'),
                'exp_year' => $request->input('expiryYear'),
                'cvc' => $request->input('cvcNumber')
            ]
        ]);

        $charge = \Stripe\Charge::create([
            'amount' => 1000,
            'currency' => 'usd',
            'source' => $token,
            'receipt_email' => $request->input('email'),
        ]);

        return $charge;
		
		**/
		
		
        try{
            $data = $request->input('cartItems');
            $cartItems = json_decode($data, true);
			$orderData = $request->input('order');
			$selectedPaymentOption = json_decode($orderData,true);
			
            $totalAmount = 0.0;
			
			
				foreach ($cartItems as $cartItem){
					
					//$order->quantity = $cartItem['productQuantity'];
					//$order->amount = ($cartItem['productPrice'] - $cartItem['productDiscount']);
					//$totalAmount+= $order->amount * $order->quantity;
					$totalAmount += ($cartItem['productPrice'] - $cartItem['productDiscount']) * $cartItem['productQuantity'];
					
				}
				
				
					$order = new Order();
					$order->order_date = Carbon::now()->toDateString();
					$order->user_id = $request->input('userId');
					$order->payment_type = $selectedPaymentOption['paymentType'];
					$order->total_amount = $totalAmount;
					$order->order_id = Carbon::now()->year . Carbon::now()->month . Carbon::now()->day . $request->input('userId');
					
					if($order->save()){
						
						foreach($cartItems as $cartItem){
							
							
							$orderDetail = new OrderDetail();
							$orderDetail->order_id = $order->id;
							$orderDetail->order_product_name = $cartItem['productName'];
							$orderDetail->product_order_price = $cartItem['productPrice'];
							$orderDetail->product_photo = $cartItem['productPhoto'];
							$orderDetail->product_order_discount = $cartItem['productDiscount'];
							$orderDetail->save();
						}
					}
					//$order->save();
				
				if($selectedPaymentOption['paymentType'] == 'Card'){
					
					\Stripe\Stripe::setApiKey('sk_test_mirrQ5hTnI8Ggpr6nsHiAY93');

					$token = \Stripe\Token::create([
						'card' => [
							'number' => $request->input('cardNumber'),
							'exp_month' => $request->input('expiryMonth'),
							'exp_year' => $request->input('expiryYear'),
							'cvc' => $request->input('cvcNumber')
						]
					]);

					$charge = \Stripe\Charge::create([
						'amount' => $totalAmount * 100,
						'currency' => 'usd',
						'source' => $token,
						'receipt_email' => $request->input('email'),
					]);
					
				}
				
				

				return response(['result' => true]);
			
			
			
            
            
        } catch (Exception $exception){
            return response(['result' => $exception->getMessage()]);
        }
		
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
