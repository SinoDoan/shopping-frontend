<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $product = Product::find($id);
        $recommendProducts = Product::latest('view_count', 'desc')->take(6)->get();
        return view('products.product-detail', compact('categories', 'product', 'recommendProducts'));
    }
}
