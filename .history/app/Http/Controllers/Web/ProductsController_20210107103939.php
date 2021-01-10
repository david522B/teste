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
            $produ
            $image = ProductImages::where('product_id', $product->id)->first();
            if($image != NULL) {
                $product->image = $image->value('path');
            }
            $image = NULL;
        }
        dd($products);

        return view('web.products', ['products' => $products]);
    }
}
