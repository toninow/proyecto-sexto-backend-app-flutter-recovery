<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$restaurants = Restaurant::all();
		return view('restaurant.index' , compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('restaurant/create');
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
		
		$restaurant = new Restaurant();
		$restaurant->name = $request->input('restaurantName');
		$restaurant->image = "";
		$restaurant->telephone = $request->input('restaurantTelephone');
		$restaurant->address = $request->input('restaurantAddress');
		
		
		if($restaurant->save()){
			
			
							Cloudder::upload($request->file('restaurantImage'));
							$cloundary_upload = Cloudder::getResult();
							
							$restaurant->image = $cloundary_upload['url'];
							$restaurant->save();
	
			
			
			return redirect()->back()->with('success', 'Restaurant Saved successfully!');
		}
		return redirect()->back()->with('failed', 'Could not save!');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($restaurantId)
    {
        //
		$restaurant = Restaurant::find($restaurantId);
		return view('restaurant.edit' , compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		
		$restaurant = Restaurant::find($id);
		
		$restaurant->name = $request->input('restaurantName');
		$restaurant->telephone = $request->input('restaurantTelephone');
		$restaurant->address = $request->input('restaurantAddress');
        
        
        
        if($restaurant->save()){
            $photo = $request->file('restaurantImage');
            if($photo != null){
				Cloudder::upload($request->file('restaurantImage'));
				$cloundary_upload = Cloudder::getResult();
								
				$restaurant->image = $cloundary_upload['url'];
				$restaurant->save();
				
			}
			
			
			
            
            return redirect()->back()->with('success', 'Restaurant Updated successfully!');
        }
        return redirect()->back()->with('failed', 'Could not update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($restaurantId)
    {
        //
		
		if(Restaurant::destroy($restaurantId)){
			
			return redirect()->back()->with('deleted', 'Deleted successfully');
		}
		
		return redirect()->back()->with('delete-failed' , 'Could not delete');
    }
}
