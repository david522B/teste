<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        foreach($products as $product) {
            $image = ProductImages::where('product_id', $product->id)->first();
            if($image != NULL) {
                $product->image = $image->path;
            }
        }
        return view('admin.productIndex', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productCreate', ['categories' => Categories::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images.*' => 'required|image|max:2000'
        ]);
        if($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $product = Products::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        foreach($request->images as $image) {
            $filename  = md5(Str::random(12).time()). '.' . $image->getClientOriginalExtension();

            $path = public_path('images/products/' . $filename);
            $dbPath = '/images/products/' . $filename;
            Image::make($image->getRealPath())->resize(500, 500)->save($path);
            ProductImages::create([
                'product_id' => $product->id,
                'path' => $dbPath
            ]);
        }

        return redirect('/admin/products/'.$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);

        $productCategoryName = Categories::where('id', $product->category_id)->value('category');

        $images = ProductImages::where('product_id', $id)->get();

        return view('admin.productEdit', [
            'product' => $product,
            'images' => $images,
            'currentCategoryName' => $productCategoryName,
            'categories' => categories::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        va($request->images[0]);
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'images.*' => 'image|max:2000'
        ]);
        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        Products::where('id', $id)
            ->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);
        foreach($request->images as $image) {
            $filename  = md5(Str::random(12).time()). '.' . $image->getClientOriginalExtension();

            $path = public_path('images/products/' . $filename);
            $dbPath = '/images/products/' . $filename;
            Image::make($image->getRealPath())->resize(500, 500)->save($path);
            ProductImages::create([
                'product_id' => $product->id,
                'path' => $dbPath
            ]);
        }

        return redirect('/admin/products/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::destroy($id);
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroyImage(Request $request)
    {
        ProductImages::destroy($request->id);
        return response()->json('Imagem deletada!', 200);
    }
}
