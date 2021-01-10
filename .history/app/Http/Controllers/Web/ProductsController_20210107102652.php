<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImages;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        foreach($products as $product) {
            $image = ProductImages::where('product_id', $product->id)-->first();
            dd($image->id);
            $product->image = $a;
        }

        return view('web.products', ['products' => $products]);
    }
}
