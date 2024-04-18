<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class Productcontroller extends Controller
{
    public function index()
    {
        
        return view('products.index', ['products' => Products::get()]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:204800',
            
        ]);


        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        // dd($imageName);

        $product = new Products();  
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->save();
        return back()->withSuccess('Product Create');
    }

    public function edit($id)
    {
        // dd($id);
        $product = Products::where('id', $id)->first();
        return view('products.edit',['product' => $product]);
        
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:204800',
            
        ]);

        $product = Products::where('id', $id)->first();
        if(isset($request->image)){

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        // dd($imageName);

        $product->image = $imageName;
       
        
    }
    $product->description = $request->description;
    $product->name = $request->name;
    $product->save();
    return back()->withSuccess('Product updatedddddd');

    }

    public function delete($id)
    {
        $product = Products::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted');          

    }

    public function show($id){
        $product = Products::where('id', $id)->first();
        return view('products.show', ['product' => $product]);

    }
    
}
