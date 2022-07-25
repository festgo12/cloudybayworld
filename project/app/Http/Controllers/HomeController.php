<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (!auth()->user()) {
            
            return view('landing');
        }

        
        $products = Product::where('status', 1)->take(6)->get();
        $newProducts = Product::where('status', 1)->orWhere('latest', 1)->latest()->take(9)->get();
        $cats = Category::where('is_featured', 1)->get();

        return view('home', compact('products','cats', 'newProducts'));
    }
}
