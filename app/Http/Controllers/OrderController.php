<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    function create(Request $request) {
        $carts = $request->cart ?? '[]';
        $carts = json_decode($carts, true);
        $order = Order::create($request->all());

        if (count ($carts) > 0) {
            $data = [];
            foreach ($carts as $cart) {
                array_push($data, [
                    'order_id' => $order->id,
                    'product_id' => $cart['id'],
                    'quantity' => $cart['quantity'],
                ]);
            };
            $cartDetail = OrderDetail::insert($data);
        }
        $request->session()->forget('cart');
        return redirect()->route('home');
    }

    function detail($id) {
        $orderDetails = OrderDetail::where('order_id', $id)->with('product')->get();
        return response()->json($orderDetails, 200);
    }

    function delete($id) {
        $order = Order::find($id);
        $order->order_detail()->delete();
        $order->delete();

        return response()->json('delete success', 200);
    }
}
