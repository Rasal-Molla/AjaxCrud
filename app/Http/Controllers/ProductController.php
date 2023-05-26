<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products');
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
        $product->weight= $request->weight;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'    => 'success',
        ]);
    }
}
