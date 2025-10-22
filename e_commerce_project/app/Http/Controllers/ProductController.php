<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource (Products Page).
     */
    public function index()
    {
        // Kumuha ng products at categories na may product count
        $products = Product::with('category')->latest()->get();
        $categories = ProductCategory::withCount('products')->orderBy('name')->get();
        
        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'active' => 'products', 
        ]);
    }

    /**
     * Store a newly created product category in storage.
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:product_categories,name'],
            'description' => ['nullable', 'string'],
        ]);

        ProductCategory::create($request->only(['name', 'description']));

        return redirect()->route('products.index')->with('status', 'Category added successfully!');
    }

    /**
     * Store a newly created product in storage.
     */
    public function storeProduct(Request $request)
    {
        $request->validate([
            'product_name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'category_id' => ['required', 'exists:product_categories,id'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'stock' => ['required', 'integer', 'min:0'],
            'long_description' => ['nullable', 'string'],
        ]);

        Product::create([
            'name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'stock_quantity' => $request->stock,
            'long_description' => $request->long_description,
        ]);

        return redirect()->route('products.index')->with('status', 'New Product added successfully!');
    }
}