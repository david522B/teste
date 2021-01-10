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
            $images[] = $image
            if($image != NULL) {
                $product->image = $image->value('path');
            }
            $image = NULL;
        }

        return view('web.products', ['products' => $products]);
    }
}
