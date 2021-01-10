<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        foreach($products as $product) {
            $image = ProductImages::where('product_id', $product->id)->first();
            if($image != NULL) {
                $product->image = $image->path;
            }
        }
        return view('admin.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createProducts', ['categories' => Categories::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        if($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $product = Products::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect('/admin/products/'.$product->id);;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $product = Products::find($id);
        $image = ProductImages::where('product_id', $product->id)->first();
        if($image != NULL) {
            $product->image = $image->path;
        }
        $categoryId = $product->category_id;
        $productCategoryName =  Categories::find($categoryId)->value('category');

        return view('admin.showProduct', ['product' => $product, 'category' => $productCategoryName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);

        $productCategoryName = Categories::find($product->category_id)->value('category');

        return view('admin.editProduct', [
            'product' => $product,
            'currentCategoryName' => $productCategoryName,
            'categories' => categories::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        Products::where('id', $id)
            ->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

        return redirect('/admin/products/'.$id);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
