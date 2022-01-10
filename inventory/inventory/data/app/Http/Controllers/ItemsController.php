<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Items;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



class ItemsController extends Controller
{
      public function index()
    {
    	$items = Items::get();
        return view('items.index',compact('items'));
    }
    public function create()
    {
    	$categories = Categories::get();
        return view('items.create',compact('categories'));
    }
    public function store(Request $request)
    {
    	$this->validate($request,[
            'category'=>['required', 'string', 'max:255'],
            'title'=>['required', 'string'],
            'description'=>['required', 'string'],
            'price'=>['required', 'string'],
            'quantity'=>['required', 'integer'],
            'sku'=>['required', 'string'],
            'picture'=>'required|image|mimes:png,jpeg,gif,jpg',
        ]);

        $filenameWithExt = $request->file('picture')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('picture')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload image
        $path = $request->file('picture')->storeAs('public/image', $fileNameToStore);

        $new = new Items;
        $new->category = $request->category;
        $new->title = $request->title;
        $new->description = $request->description;
        $new->price = $request->price;
        $new->quantity = $request->quantity;
        $new->sku = $request->sku;
        $new->picture = $fileNameToStore;
        $new->save();

    	return redirect()->route('items.index');

    }
    public function edit($items)
    {
    	$find = Items::where('id','=',$items)->first();
    	$categories = Categories::get();
        return view('items.edit',compact('find','categories'));
    }
    public function destroy($items)
    {
    	$find = Items::where('id','=',$items)->first();
    	unlink(public_path().'/storage/image/'. $find->picture);
		$find->picture = '';
		$find->save();
		
        $find->delete();

        return redirect()->route('items.index');
    }
    public function update(Request $request, $items)
    {
    	$this->validate($request,[
            'category'=>['required', 'string', 'max:255'],
            'title'=>['required', 'string'],
            'description'=>['required', 'string'],
            'price'=>['required', 'string'],
            'quantity'=>['required', 'integer'],
            'sku'=>['required', 'string'],
            'picture'=>'nullable|image|mimes:png,jpeg,gif,jpg',
        ]);

        $find = Items::where('id','=',$items)->first();

        if($request->hasFile('picture'))
        {
        	if($find->picture != null)
        	{
        		unlink(public_path().'/storage/image/'. $find->picture);
        	}
            // Get filename with the extension
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('picture')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('picture')->storeAs('public/image', $fileNameToStore);
        }
        else
        {
        	$fileNameToStore = '';
        }

    
	    $find->category = $request->category;
        $find->title = $request->title;
        $find->description = $request->description;
        $find->price = $request->price;
        $find->quantity = $request->quantity;
        $find->sku = $request->sku;
        $find->picture = $fileNameToStore;
        $find->update();

        return redirect()->route('items.index');
    }
}
