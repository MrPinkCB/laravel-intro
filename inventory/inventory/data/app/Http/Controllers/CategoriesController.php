<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Categories;

class CategoriesController extends Controller
{

    public function index()
    {
    	$categories = Categories::get();
        return view('category.index',compact('categories'));
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
            'category'=>['required', 'string', 'max:255'],
        ]);

    	$find = Categories::where('name','=',$request->category)->first();

    	if($find == null)
    	{
    		$save = new Categories;
	        $save->name = $request->category;
	        $save->save();
	        return redirect()->route('categories.index');
    	}
    	else
    	{
    		return back()->with('status','Duplicate Found!!')->withInput();
    	}
    }
    public function edit($category)
    {
    	$find = Categories::where('id','=',$category)->first();
        return view('category.edit',compact('find'));
    }
    public function update(Request $request, $category)
    {
    	$this->validate($request,[
            'category'=>['required', 'string', 'max:255'],
        ]);

    	$dubpicate = Categories::where('name','=',$request->category)->first();
    	if($dubpicate == null)
    	{
    		$find = Categories::where('id','=',$category)->first();

	    	$find->name = $request->category;
		    $find->update();
		    return redirect()->route('categories.index');
    	}
    	else
    	{
    		return back()->with('status','Duplicate Found!!');
    	}
    }
}
