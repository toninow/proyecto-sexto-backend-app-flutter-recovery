<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
	
	public function index(){
		
		$restaurants = Restaurant::all();
		$countRestaurants = count($restaurants);
		
		return view('dashboard' , compact('countRestaurants'));
	}
}
