<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        foreach($products as )

        return view('web.products', ['products' => $products]);
    }
}
