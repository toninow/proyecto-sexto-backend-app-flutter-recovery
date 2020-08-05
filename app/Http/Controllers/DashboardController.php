<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
	
	public function index(){
		
		$restaurants = Restaurant::all();
		$countRestaurants = count($restaurants);
		
		$categories = Category::all();
		$countCategories = count($categories);
		
		$products = Product::all();
		$countProducts = count($products);
		
		$orders = Order::all();
		$countOrders = count($orders);
		
		$latestOrders = Order::orderBy('created_at','desc')->take(10)->get();
		
		return view('dashboard' , compact('countRestaurants','countCategories','countProducts','countOrders', 'latestOrders'));
	}
}
