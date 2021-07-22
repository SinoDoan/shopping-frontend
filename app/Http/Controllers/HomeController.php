<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        $recommendProducts = Product::latest('view_count', 'desc')->take(6)->get();
        return view('pages.home', compact('sliders', 'categories', 'products', 'recommendProducts'));
    }
}
