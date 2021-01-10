<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        $products->each(function($product) )
        return view('web.products');
    }
}
