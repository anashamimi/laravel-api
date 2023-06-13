<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.products.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $slug = Str::slug($request->name, '-');
        $data['slug'] = $slug;

        $newProduct = Product::create($data);

        if ($request->has('technologies')) {
            $newProduct->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.products.show', [$newProduct->id, $newProduct->name])
            ->with('message', "The Book {$newProduct->name} has been added successfully");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.products.edit', compact('product', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $slug = Str::slug($request->title, '-');
        $data['slug'] = $slug;
        $product->update($data);

        if ($request->has('technologies')) {
            $product->technologies()->sync($request->technologies);
        } else {
            $product->technologies()->sync([]);
        }

        return redirect()->route('admin.products.show', $product->id)
            ->with('message', "$product->title has been successfully modified.");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('message', "$product->title deleted successfully.");
    }
}
