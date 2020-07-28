<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$categories = Category::all();
		return view('category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$restaurants = Restaurant::all();
		
		return view('category/create' , compact('restaurants'));
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
		$category = new Category();
		$category->name = $request->input('categoryName');
		$category->icon = "";
		$category->user_id = 0;
		$category->restaurant_id = $request->input('restaurant');
		
		if($category->save()){
			
			
							Cloudder::upload($request->file('categoryIcon'));
							$cloundary_upload = Cloudder::getResult();
							
							$category->icon = $cloundary_upload['url'];
							$category->save();
	
			
			
			return redirect()->back()->with('success', 'Saved successfully!');
		}
		return redirect()->back()->with('failed', 'Could not save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$category = Category::find($id);
		$restaurants = Restaurant::all();
		
		return view('category.edit' , compact('category','restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$category = Category::find($id);
        $category->name = $request->input('categoryName');
        //$category->icon = "";
        $category->user_id = 0;
		$category->restaurant_id = $request->input('restaurant');
        if($category->save()){
							
							Cloudder::upload($request->file('categoryIcon'));
							$cloundary_upload = Cloudder::getResult();
							
							$category->icon = $cloundary_upload['url'];
							$category->save();
           
            return redirect()->back()->with('success', 'Updated successfully!');
        }
        return redirect()->back()->with('failed', 'Could not update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		if(category::destroy($id)){
			
			return redirect()->back()->with('deleted', 'Deleted successfully');
		}
		
		return redirect()->back()->with('delete-failed' , 'Could not delete');
    }
}
