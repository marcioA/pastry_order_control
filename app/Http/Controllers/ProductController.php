<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $product = new Product();
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $allowedfileExtension = ['png', 'jpg'];
            $extension = $file->getClientOriginalExtension();

            if(in_array($extension, $allowedfileExtension)){
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('images', $name);
                $product->photo_path = $name;
            }
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $result = $product->save();

        return response()->json($product);
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $result = $product->delete();
        return response()->json($product, $result ? 204 : 404);
    }
}
