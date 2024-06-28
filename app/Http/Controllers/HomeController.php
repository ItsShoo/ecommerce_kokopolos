<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured products (assuming you have a 'featured' column in your products table)
        $featuredProducts = Product::where('featured', true)
                                   ->with('category')
                                   ->take(4)
                                   ->get();

        // Get latest products
        $latestProducts = Product::with('category')
                                 ->latest()
                                 ->take(8)
                                 ->get();

        // Get all categories
        $categories = Category::all();

        return view('home', compact('featuredProducts', 'latestProducts', 'categories'));
    }
}