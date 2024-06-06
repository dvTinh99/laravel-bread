<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function add(Request $request, $id) {

        $product = Product::findOrFail($id);

        $cart = $request->session()->get('cart',[]);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "unit_price" => $product->unit_price,
                "promotion_price" => $product->promotion_price,
                "image" => $product->image
            ];
        }

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    function remove(Request $request, $id) {

        $cart = $request->session()->get('cart');
        if (isset($cart[$id])) {

            unset($cart[$id]);
        }
        $request->session()->put('cart',$cart);

        return redirect()->back();
    }
    function removeAll(Request $request) {

        $request->session()->forget('cart');
        return redirect()->back();
    }

    function checkout(Request $request) {
        dd($request->all());
    }
}
