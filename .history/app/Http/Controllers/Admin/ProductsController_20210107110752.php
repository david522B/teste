<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImages;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        foreach($products as $product) {
            $product->image = NULL;
            $image = ProductImages::where('product_id', $product->id)->first();
            if($image != NULL) {
                $product->image = $image->path;
            }
        }
        return view('admin.products', ['products' => $products]);
    }
}
