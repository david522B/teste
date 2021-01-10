<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductImage;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        foreach($products as $product) {

        }

        return view('web.products', ['products' => $products]);
    }
}
