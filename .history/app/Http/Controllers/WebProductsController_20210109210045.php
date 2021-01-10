<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class WebProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $categor
        foreach($products as $product) {
            $image = ProductImages::where('product_id', $product->id)->first();
            if($image != NULL) {
                $product->image = $image->path;
            }
        }
        return view('web.productIndex', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::find($id);
        $images = ProductImages::where('product_id', $product->id)->get();
        $productCategoryName =  Categories::where('id', $product->category_id)->value('category');

        return view('admin.productShow', [
            'product' => $product,
            'category' => $productCategoryName,
            'images' => $images
        ]);
    }

}
