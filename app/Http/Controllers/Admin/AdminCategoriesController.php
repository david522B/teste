<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categoryIndex', ['categories' => Categories::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryCreate');
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
        ]);
        if($validator->fails()) {
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        if(Categories::where('category', 'like' ,$request->category)->count() > 0) {
            return back()
            ->withErrors('Ja existe uma categoria com esse nome.')
            ->withInput();
        }
        $category = Categories::create([
            'category' => $request->category,
        ]);

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        return view('admin.categoryEdit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
        ]);
        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        Categories::where('id', $id)
            ->update([
                'category' => $request->category,
            ]);

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::where('category_id', $id)->count();
        if($products > 0) {
            return redirect()->back()->withErrors('Esta categoria possui produtos cadastrados, não é permitido excluir.');
        }else {
            Categories::destroy($id);
        }
        return redirect('admin/categories');
    }
}
