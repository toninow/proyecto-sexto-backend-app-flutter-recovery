<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

	
	public function makePayment(Request $request){
		
		try{
			
					$data = $request->input('cartItems');
					$cartItems = json_decode($data , true);
					$totalAmount = 0.0;
					
					foreach($cartItems as $cartItem){
						
						$order = new Order();
						$order->order_date = Carbon::now()->toDateString();
						$order->product_id = $cartItem['productId'];
						$order->user_id = $request->input('userId');
						$order->quantity = $cartItem['productQuantity'];
						$order->amount = ($cartItem['productPrice'] - $cartItem['productDiscount']);
						$totalAmount += $order->amount * $order->quantity;
						$order->save();
					}
					
					\Stripe\Stripe::setApiKey('sk_test_mirrQ5hTnI8Ggpr6nsHiAY93');
					
					$token = \Stripe\Token::create([
						'card' => [
							'number' => $request->input('cardNumber'),
							'exp_month' => $request->input('expiryMonth'),
							'exp_year' => $request->input('expiryYear'),
							'cvc' => $request->input('cvcNumber')
						]
					]);
					


					$charge = \Stripe\PaymentIntent::create([
					  'amount' => $totalAmount * 100,
					  'currency' => 'usd',
					  'payment_method_types' => $token,
					  'receipt_email' => $request->input('email'),
					]);
					
					//return $charge;
					
					return response(['result' => true]);
			
			
			
		} catch(\Exception $exception){
			
			return response(['result' => $exception]);
		} 
		
		
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
    public function store(Request $request)
    {
        //
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
