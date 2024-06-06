<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $slides = Slide::all();
        $products=Product::limit(4)->get();
        return view('bread.pages.index', compact('slides','products'));

    }

    
    function contact() {
        return view('bread.pages.contacts');
    }

    function about() {
        return view('bread.pages.about');
    }

    function detail($id) {
        $product = Product::find($id);
        return view('bread.pages.product', compact('product'));
    }

    function checkout() {
        return view('bread.pages.checkout');
    }
}
