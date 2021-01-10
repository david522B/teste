<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App

class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();

        return view('web.products', ['products' => $products]);
    }
}
