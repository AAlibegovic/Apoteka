<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $selectedCategory = $request->input('category');

        $productsQuery = Product::with('brand');

        if ($selectedCategory) {
            $productsQuery->where('category_id', $selectedCategory);
        }

        $products = $productsQuery->get();
        $brands = Brand::all();

        return view('products.index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();

        return view('products.add', ['brands' => $brands, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|between:0,99.99',
        ]);

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'year_of_production' => $request->year_of_production,
            'year_of_expiration' => $request->year_of_expiration,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
        ]);

        return redirect()->route('products');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Request $request)
    {
        $id = $request->id;
        $products = DB::table('products')->where('id', $id)->get();
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();
    
        return view('products.edit', ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|between:0,99.99',
        ]);

        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'year_of_production' => $request->year_of_production,
            'year_of_expiration' => $request->year_of_expiration,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
        ]);

        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Request $request)
    { 
        $id=$request->id;
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('products');
    }
}

