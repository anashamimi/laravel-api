<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('type', 'technologies')->paginate(5);
        return response()->json([
            'success'=> true,
            'results'=> $products
        ]);
    }

    public function show($id){
        $product = Product::where('id', $id)->first();
        if($product){
            return response()->json([
            'success'=> true,
            'results'=> $product
        ]);
        } else{
            return response()->json([
                'success'=> false,
                'results'=> 'prodotto non trovato'
            ]);
        }

    }
}
