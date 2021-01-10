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
        $images;
        foreach($products as $product) {
            $product->image = NULL;
            $image = ProductImages::where('product_id', $product->id)->first();
            if($image != NULL) {
                $images[] = $image->path;
                $product->image = $image->path;
            }
            $image = NULL;
        }
        return view('web.products', ['products' => $products]);
    }
}
