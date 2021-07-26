<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug, $categoryId)
    {
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::where('category_id', $categoryId)->paginate(12);
        return view('products.category.list', compact('categories', 'products'));
    }
}
