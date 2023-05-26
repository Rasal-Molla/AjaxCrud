<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'      => 'required|unique:products',
                'color'     => 'required',
                'weight'    => 'required|numeric',
                'price'     => 'required|numeric'
            ],
            [
                'name.required'     => 'Name is required',
                'name.unique'       => 'Name is exists',
                'color'             => 'Color is required',
                'weight.required'   => 'Weight is required',
                'name.numeric'      => 'Weight value numeric',
                'name.required'     => 'Price is required',
                'name.numeric'      => 'Price value numeric',
            ]
        );

        $product        = new Product();
        $product->name  = $request->name;
        $product->color = $request->color;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'    => 'success',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'up_name'      => 'required|unique:products,name,' . $request->up_id,
                'up_color'     => 'required',
                'up_weight'    => 'required|numeric',
                'up_price'     => 'required|numeric'
            ],
            [
                'up_name.required'     => 'Name is required',
                'up_price.unique'       => 'Name is exists',
                'up_color'             => 'Color is required',
                'up_weight.required'   => 'Weight is required',
                'up_name.numeric'      => 'Weight value numeric',
                'up_name.required'     => 'Price is required',
                'up_name.numeric'      => 'Price value numeric',
            ]
        );

        Product::where('id', $request->up_id)->update([
            'name'      => $request->up_name,
            'color'     => $request->up_color,
            'weight'    => $request->up_weight,
            'price'     => $request->up_price,
        ]);

        return response()->json([
            'status'    => 'success',
        ]);
    }
}
