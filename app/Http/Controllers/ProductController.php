<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function index2() {
        dd("index2");
    }
    function index() {
        dd("index");
    }

    public function create(Request $request) {
        // dd($request->all());
        Product::create([
            "name" => $request->name,
            "price" => $request->price,
        ]);
    }
    public function create1() {
        return view('product.create');
    }


}
